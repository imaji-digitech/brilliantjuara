<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $course_highlight_id
 * @property integer $course_type_id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property CourseHighlight $courseHighlight
 * @property CourseType $courseType
 */
class CourseDetail extends Model
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
    protected $fillable = ['course_highlight_id', 'course_type_id', 'title', 'content', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseHighlight()
    {
        return $this->belongsTo('App\Models\CourseHighlight');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseType()
    {
        return $this->belongsTo('App\Models\CourseType');
    }
}
