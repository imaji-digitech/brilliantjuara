<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $limit_date
 * @property int $limit_use
 * @property int $discount
 * @property string $created_at
 * @property string $updated_at
 * @property ReferralCanus[] $referralCanUses
 * @property ReferralCode[] $referralCodes
 */
class BaseReferral extends Model
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
    protected $fillable = ['title', 'limit_date', 'limit_use', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referralCanUses()
    {
        return $this->hasMany('App\Models\ReferralCanUse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referralCodes()
    {
        return $this->hasMany('App\Models\ReferralCode');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
                    ->orWhere('discount', 'like', '%' . $query . '%');
    }
}
