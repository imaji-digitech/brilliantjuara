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
 * @property ExamStep[] $examSteps
 * @property ExamUser[] $examUsers
 * @property SaleDetail[] $saleDetails
 * @property UserOwnExam[] $userOwnExams
 */
class Exam extends Model
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
    public function examSteps()
    {
        return $this->hasMany('App\Models\ExamStep');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examUsers()
    {
        return $this->hasMany('App\Models\ExamUser');
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
    public function userOwnExams()
    {
        return $this->hasMany('App\Models\UserOwnExam');
    }
    public static function search($query,$dataId){
        return empty($query) ? static::query()->whereRoomId($dataId)
            : static::whereRoomId($dataId)->where('title', 'like', '%' . $query . '%');
    }
    public static function getExam($exam){
        return static::whereSlug($exam)->firstOrFail();
    }
}
