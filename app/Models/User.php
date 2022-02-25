<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property integer $id
 * @property int $role
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $two_factor_secret
 * @property string $two_factor_recovery_codes
 * @property string $remember_token
 * @property integer $current_team_id
 * @property string $profile_photo_path
 * @property string $created_at
 * @property string $updated_at
 * @property ExamUser[] $examUsers
 * @property ReferralCodeus[] $referralCodeUses
 * @property ReferralCode[] $referralCodes
 * @property UserOwnCourse[] $userOwnCourses
 * @property UserOwnExam[] $userOwnExams
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'commission'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examUsers()
    {
        return $this->hasMany('App\Models\ExamUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referralCodeUses()
    {
        return $this->hasMany('App\Models\ReferralCodeus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referralCodes()
    {
        return $this->hasMany('App\Models\ReferralCode');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userOwnCourses()
    {
        return $this->hasMany('App\Models\UserOwnCourse');
    }
    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userOwnExams()
    {
        return $this->hasMany('App\Models\UserOwnExam');
    }
    public static function haveCourse($id){
//        dd($id);
        if (auth()->user()->userOwnCourses->where('course_id',$id)->count()!=0){
            return true;
        }else{
            return false;
        }
    }
    public static function haveExam($id){
        if (auth()->user()->userOwnExams->where('exam_id',$id)->count()!=0){
            return true;
        }else{
            return false;
        }
    }
    public static function haveProgram($id){
        $examKey=[];
        $myExam=auth()->user()->userOwnExams;
        foreach ($myExam as $me){
            array_push($examKey,$me->exam_id);
        }
        $exam = Bundle::find($id)->bundleDetails;
        $examProgram=[];
        foreach ($exam as $me){
            if ($me->exam_id!=null) {
                array_push($examProgram, $me->exam_id);
            }
        }
        foreach ($examProgram as $index=>$e){
            if (!in_array($e,$examKey)){
                return 0;
            }
        }
//        dd("asd");
        $courseKey=[];
        $myCourse=auth()->user()->userOwnCourses;
        foreach ($myCourse as $me){
            array_push($courseKey,$me->course_id);
        }
        $course = Bundle::find($id)->bundleDetails;
        $courseProgram=[];
        foreach ($course as $me){
            if ($me->course_id!=null) {
                array_push($courseProgram, $me->course_id);
            }
        }
        foreach ($courseProgram as $e){
            if (!in_array($e,$courseKey)){
                return 0;
            }
        }
        return 1;
    }
}
