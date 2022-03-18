<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $exam_user_id
 * @property int $point_twk
 * @property int $point_tiu
 * @property int $point_tkp
 * @property string $created_at
 * @property string $updated_at
 * @property ExamUser $examUser
 */
class RankingSekdin extends Model
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
    protected $fillable = ['exam_user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examUser()
    {
        return $this->belongsTo('App\Models\ExamUser');
    }
}
