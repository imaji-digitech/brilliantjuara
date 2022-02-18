<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bundle_id
 * @property integer $user_id
 * @property integer $referral_code_id
 * @property string $payment_id
 * @property int $amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Bundle $bundle
 * @property User $user
 * @property ReferralCode $referralCode
 */
class Payment extends Model
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
    protected $fillable = ['bundle_id', 'user_id', 'referral_code_id', 'payment_id', 'amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bundle()
    {
        return $this->belongsTo('App\Models\Bundle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referralCode()
    {
        return $this->belongsTo('App\Models\ReferralCode');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()->whereUserId(auth()->id())
            : static::whereUserId(auth()->id())->where(function ($q) use ($query) {
                $q->whereHas('referralCode',function ($q2) use ($query) {
                        $q2->where('code', 'like', '%' . $query . '%');
                    });
            });
    }
}
