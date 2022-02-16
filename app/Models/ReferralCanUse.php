<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $base_referral_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property BaseReferral $baseReferral
 */
class ReferralCanUse extends Model
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
    protected $fillable = ['base_referral_id', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baseReferral()
    {
        return $this->belongsTo('App\Models\BaseReferral');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->where('base_referral_id',$dataId)
            : static::where('base_referral_id',$dataId)
                ->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
    }
}
