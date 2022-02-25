<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $exam_id
 * @property string $created_at
 * @property string $updated_at
 * @property Exam $exam
 * @property User $user
 */
class UserHasDownload extends Model
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
    protected $fillable = ['user_id', 'exam_id', 'created_at', 'updated_at'];

    public static function hasDownload($id)
    {
        $some = static::query()->whereUserId(auth()->id())->whereExamId($id);
        if ($some->count() == 0) {
            return true;
        } else {
            return false;
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
}
