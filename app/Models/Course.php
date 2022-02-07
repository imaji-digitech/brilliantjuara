<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $room_id
 * @property string $title
 * @property int $price
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property Room $room
 * @property CourseHighlight[] $courseHighlights
 * @property SaleDetail[] $saleDetails
 * @property UserOwnCourse[] $userOwnCourses
 */
class Course extends Model
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
    protected $fillable = ['room_id', 'title', 'price', 'slug', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseHighlights()
    {
        return $this->hasMany('App\Models\CourseHighlight');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saleDetails()
    {
        return $this->hasMany('App\Models\SaleDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userOwnCourses()
    {
        return $this->hasMany('App\Models\UserOwnCourse');
    }
    public static function search($query,$dataId){
        return empty($query) ? static::query()->whereRoomId($dataId)
            : static::whereRoomId($dataId)->where('title', 'like', '%' . $query . '%');
    }
    public static function getCourse($course){
        return static::whereSlug($course)->firstOrFail();
    }
}
