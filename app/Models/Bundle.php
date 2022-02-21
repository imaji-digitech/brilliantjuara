<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $room_id
 * @property integer $bundle_status_id
 * @property string $title
 * @property string $content
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 * @property int $referral_can_use
 * @property int $referral_discount
 * @property int $referral_money
 * @property BundleStatus $bundleStatus
 * @property Room $room
 * @property BundleDetail[] $bundleDetails
 * @property BundlePrice[] $bundlePrices
 * @property Payment[] $payments
 * @property Token[] $tokens
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
    protected $fillable = ['room_id', 'bundle_status_id', 'title', 'content', 'thumbnail', 'created_at', 'updated_at', 'referral_can_use', 'token_can_use','referral_discount', 'referral_money'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bundleStatus()
    {
        return $this->belongsTo('App\Models\BundleStatus');
    }

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
    public function bundleDetails()
    {
        return $this->hasMany('App\Models\BundleDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bundlePrices()
    {
        return $this->hasMany('App\Models\BundlePrice');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

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
}
