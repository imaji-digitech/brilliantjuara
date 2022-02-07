<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $exam_user_id
 * @property integer $exam_quest_id
 * @property int $answer
 * @property string $created_at
 * @property string $updated_at
 * @property ExamQuest $examQuest
 * @property ExamUser $examUser
 */
class ExamAnswer extends Model
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
    protected $fillable = ['exam_user_id', 'exam_quest_id', 'answer', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examQuest()
    {
        return $this->belongsTo('App\Models\ExamQuest');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examUser()
    {
        return $this->belongsTo('App\Models\ExamUser');
    }
}
