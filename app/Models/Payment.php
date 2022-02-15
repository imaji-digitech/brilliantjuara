<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bundle_id
 * @property string $payment_id
 * @property int $amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property Bundle $bundle
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
    protected $fillable = ['bundle_id', 'payment_id', 'amount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bundle()
    {
        return $this->belongsTo('App\Models\Bundle');
    }
}
