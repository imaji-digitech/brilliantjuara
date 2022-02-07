<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $course_id
 * @property string $created_at
 * @property string $updated_at
 * @property Course $course
 * @property User $user
 */
class UserOwnCourse extends Model
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
    protected $fillable = ['user_id', 'course_id', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::whereHas('user', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })->orWhereHas('course', function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%');
            });
    }

    /**
     * @return BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
