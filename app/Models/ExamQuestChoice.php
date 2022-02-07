<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $exam_quest_id
 * @property string $answer
 * @property string $equation
 * @property int $score
 * @property string $created_at
 * @property string $updated_at
 * @property ExamQuest $examQuest
 */
class ExamQuestChoice extends Model
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
    protected $fillable = ['exam_quest_id', 'answer', 'equation', 'score', 'choice', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function examQuest()
    {
        return $this->belongsTo('App\Models\ExamQuest');
    }
}
