<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $bundle_id
 * @property int $price
 * @property int $min
 * @property string $created_at
 * @property string $updated_at
 * @property Bundle $bundle
 */
class BundlePrice extends Model
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
    protected $fillable = ['bundle_id', 'price', 'price_cut', 'min', 'created_at', 'updated_at'];

    public static function search($query, $dataId)
    {
        return static::query()->whereBundleId($dataId);
    }

    /**
     * @return BelongsTo
     */
    public function bundle()
    {
        return $this->belongsTo('App\Models\Bundle');
    }
}
