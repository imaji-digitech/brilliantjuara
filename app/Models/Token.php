<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bundle_id
 * @property integer $user_id
 * @property string $token
 * @property string $created_at
 * @property string $updated_at
 * @property Bundle $bundle
 * @property User $user
 */
class Token extends Model
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
    protected $fillable = ['bundle_id', 'user_id', 'token', 'created_at', 'updated_at'];

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
    public static function search($query,$dataId)
    {
        return empty($query) ? static::query()->whereBundleId($dataId)
            : static::whereBundleId($dataId)->whereHas('user', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            });
    }

}
