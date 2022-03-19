<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $exam_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 * @property Exam $exam
 * @property User $user
 * @property ExamAnswer[] $examAnswers
 * @property RankingSekdin[] $rankingSekdins
 */
class ExamUser extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'exam_id', 'created_at', 'updated_at', 'status'];

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereExamId($dataId)->whereUserId(auth()->id())
            : static::whereExamId($dataId)
                ->whereUserId(auth()->id())
                ->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
    }

    public static function searchLog($query)
    {
        return empty($query) ? static::query()
            : static::whereHas('user', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })->orWhereHas('exam', function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%');
            });
    }

    public static function setDone($id)
    {
        $examUser = static::find($id);
        $examUser->update(['status' => 2]);
        if (Carbon::now() > $examUser->created_at->addMinutes($examUser->exam->time)) {
            $examUser->update(['updated_at' => $examUser->created_at->addMinutes($examUser->exam->time)]);
        }

        $exam = ExamUser::whereUserId($examUser->user_id)->whereExamId($examUser->exam_id)->get();
        if ($examUser->exam->exam_type_id == 1) {
            $ranking = Ranking::whereUserId($examUser->user_id)->whereExamId($examUser->exam_id)->get();
            if ($exam->count() == 1 and $ranking->count() == 0) {
                $totalPoint = 0;
                foreach ($examUser->examAnswers as $i => $eu) {
                    $answer = $eu->examQuest->answer == $eu->answer;
                    if ($answer) {
                        $totalPoint += $eu->examQuest->examStep->score_right;
                    }
                }
                Ranking::create([
                    'user_id' => $examUser->user_id,
                    'exam_id' => $examUser->exam_id,
                    'point' => $totalPoint
                ]);
            }
        }
    }

    /**
     * @return BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return HasMany
     */
    public function examAnswers()
    {
        return $this->hasMany('App\Models\ExamAnswer');
    }

    /**
     * @return HasMany
     */
    public function rankingSekdins()
    {
        return $this->hasMany('App\Models\RankingSekdin');
    }
}
