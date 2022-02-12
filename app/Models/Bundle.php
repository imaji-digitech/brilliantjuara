<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $room_id
 * @property integer $bundle_status_id
 * @property string $title
 * @property string $content
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 * @property BundleStatus $bundleStatus
 * @property Room $room
 * @property BundleDetail[] $bundleDetails
 * @property BundlePrice[] $bundlePrices
 */
class Bundle extends Model
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
    protected $fillable = ['room_id', 'bundle_status_id', 'title', 'content', 'thumbnail', 'created_at', 'updated_at'];

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereRoomId($dataId)
            : static::whereRoomId($dataId)->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhereHas('bundleStatus',function ($q2) use ($query) {
                       $q2->where('title', 'like', '%' . $query . '%');
                    });
            });
    }

    /**
     * @return BelongsTo
     */
    public function bundleStatus()
    {
        return $this->belongsTo('App\Models\BundleStatus');
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
    public function bundleDetails()
    {
        return $this->hasMany('App\Models\BundleDetail');
    }

    /**
     * @return HasMany
     */
    public function bundlePrices()
    {
        return $this->hasMany('App\Models\BundlePrice');
    }
}
