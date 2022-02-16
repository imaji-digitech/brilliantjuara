<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property string $title
 * @property string $thumbnail
 * @property string $link
 * @property string $created_at
 * @property string $updated_at
 */
class PublicBanner extends Model
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
    protected $fillable = ['title', 'thumbnail', 'link','room_id', 'created_at', 'updated_at'];
    public static function search($query,$dataId)
    {
        return empty($query) ? static::query()->whereRoomId($dataId)
            : static::whereRoomId($dataId)->where('title', 'like', '%' . $query . '%');
    }
    /**
     * @return BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
