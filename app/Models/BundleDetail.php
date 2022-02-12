<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bundle_id
 * @property integer $course_id
 * @property integer $exam_id
 * @property string $created_at
 * @property string $updated_at
 * @property Bundle $bundle
 * @property Course $course
 * @property Exam $exam
 */
class BundleDetail extends Model
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
    protected $fillable = ['bundle_id', 'course_id', 'exam_id', 'created_at', 'updated_at'];

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
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }
    public static function search($query, $dataId)
    {
        return static::query()->whereBundleId($dataId);
    }
}
