<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $exam_step_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property ExamStep $examStep
 */
class ExportCache extends Model
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
    protected $fillable = ['exam_step_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examStep()
    {
        return $this->belongsTo('App\Models\ExamStep');
    }
    public static function getLastActive(){
        return static::orderBy('id','desc')->first();
    }
}
