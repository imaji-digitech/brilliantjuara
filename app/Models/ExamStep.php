<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $exam_id
 * @property string $title
 * @property string $slug
 * @property int $type_exam
 * @property int $score_right
 * @property int $score_wrong
 * @property string $created_at
 * @property string $updated_at
 * @property Exam $exam
 * @property ExamQuest[] $examQuests
 */
class ExamStep extends Model
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
    protected $fillable = ['exam_id', 'title', 'slug', 'type_exam', 'score_right', 'score_wrong', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examQuests()
    {
        return $this->hasMany('App\Models\ExamQuest');
    }
    public static function search($query,$dataId){
        return empty($query) ? static::query()->whereExamId($dataId)
            : static::whereExamId($dataId)->where('title', 'like', '%' . $query . '%');
    }
}
