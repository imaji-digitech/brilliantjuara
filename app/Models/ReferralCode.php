<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $base_referral_id
 * @property integer $user_id
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 * @property BaseReferral $baseReferral
 * @property User $user
 * @property Payment[] $payments
 * @property ReferralCodeus[] $referralCodeUses
 */
class ReferralCode extends Model
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
    protected $fillable = ['base_referral_id', 'user_id', 'code', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baseReferral()
    {
        return $this->belongsTo('App\Models\BaseReferral');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
    public function referralCodeUses()
    {
        return $this->hasMany('App\Models\ReferralCodeus');
    }
    public static function searchMe($query)
    {
        return empty($query) ? static::query()->where('user_id', auth()->id())
            : static::where('user_id', auth()->id())
                ->where('code', 'like', '%' . $query . '%');
    }

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->where('base_referral_id', $dataId)
            : static::where('base_referral_id', $dataId)
                ->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
    }
}
