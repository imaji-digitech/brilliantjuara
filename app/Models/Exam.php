<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    protected $fillable = ['room_id', 'title', 'price', 'slug', 'time', 'created_at', 'updated_at', 'status_discussion', 'status_multiple_attempt', 'status_view_score','exam_type_id'];

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereRoomId($dataId)
            : static::whereRoomId($dataId)->where('title', 'like', '%' . $query . '%');
    }

    public static function getExam($exam)
    {
        return static::whereSlug($exam)->firstOrFail();
    }

    /**
     * @return BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    /**
     * @return HasMany
     */
    public function examSteps()
    {
        return $this->hasMany('App\Models\ExamStep');
    }

    /**
     * @return HasMany
     */
    public function examUsers()
    {
        return $this->hasMany('App\Models\ExamUser');
    }

    /**
     * @return HasMany
     */
    public function saleDetails()
    {
        return $this->hasMany('App\Models\SaleDetail');
    }

    /**
     * @return HasMany
     */
    public function userOwnExams()
    {
        return $this->hasMany('App\Models\UserOwnExam');
    }
}
