<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $exam_step_id
 * @property string $equation
 * @property string $question
 * @property string $created_at
 * @property string $updated_at
 * @property ExamStep $examStep
 * @property ExamAnswer[] $examAnswers
 * @property ExamQuestChoice[] $examQuestChoices
 */
class ExamQuest extends Model
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
    protected $fillable = ['exam_step_id', 'equation', 'discussion_equation', 'question', 'answer', 'discussion', 'created_at', 'updated_at'];

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereExamStepId($dataId)
            : static::whereExamStepId($dataId)->where('title', 'like', '%' . $query . '%');
    }

    /**
     * @return BelongsTo
     */
    public function examStep()
    {
        return $this->belongsTo('App\Models\ExamStep');
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
    public function examQuestChoices()
    {
        return $this->hasMany('App\Models\ExamQuestChoice');
    }
}
