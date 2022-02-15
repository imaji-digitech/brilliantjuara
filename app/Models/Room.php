<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property Bundle[] $bundles
 * @property Course[] $courses
 * @property Exam[] $exams
 */
class Room extends Model
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
    protected $fillable = ['title', 'slug','room_category_id','order', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bundles()
    {
        return $this->hasMany('App\Models\Bundle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->hasMany('App\Models\Exam');
    }
    public static function getRoom($room){
        return static::whereSlug($room)->firstOrFail();
    }
    public static function search($query){
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%');
    }
}
