<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'first_name', 'last_name', 'is_male', 'mobile', 'student_number', 'national_code', 'field_id', 'role', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];


  public function studentCourses(){
    return $this->belongsToMany('App\Course', 'student_courses', 'student_id', 'course_id');
  }

  public function studentWorkshops(){
    return $this->belongsToMany('App\Workshop', 'student_workshops', 'student_id', 'workshop_id');
  }

  public function studentFreeCourses(){
    return $this->belongsToMany('App\FreeCourse', 'student_free_courses', 'student_id', 'free_course_id');
  }

  public function studentFestivals(){
    return $this->belongsToMany('App\Festival', 'student_festivals', 'student_id', 'festival_id');
  }

  public function studentConsults(){
    return $this->hasMany('App\Advice');
  }

  public function studentField(){
    return $this->belongsTo('App\Field', 'field_id');
  }

  public function studentMessages(){
    return $this->hasMany('App\Message');
  }

  public function studentIdeas(){
    return $this->hasMany('App\Idea');
  }

  public function visits(){
    return $this->belongsToMany('App\VisitIndustry', 'user_visits', 'user_id', 'visit_industry_id');
  }


  public function masterCourses(){
    return $this->hasMany('App\Course', 'master_id');
  }

  public function masterWorkshops(){
    return $this->hasMany('App\Workshop', 'master_id');
  }

  public function masterFreeCourses(){
    return $this->hasMany('App\FreeCourse', 'master_id');
  }

  public function messages(){
    return $this->hasMany('App\Message');
  }

  public function consultantConsults(){
    return $this->hasMany('App\Advice', 'adviser_id');
  }

  public function counselorReports(){
    return $this->hasMany('App\CounselorReport');
  }

  public function hasWorkshopCert($id){
    $stWorkshop = StudentWorkshops::where('student_id' , '=', $this->id)->where('workshop_id', '=', $id)->first();
    if($stWorkshop != null){
      if($stWorkshop->has_certificate == 1){
        return true;
      }
    }

    return false;
  }

  public function hasCourseCert($id){
    $stCourse = StudentCourses::where('student_id' , '=', $this->id)->where('course_id', '=', $id)->first();
    if($stCourse != null){
      if($stCourse->has_certificate == 1){
        return true;
      }
    }
    return false;
  }

  public function hasFreeCourseCert($id){
    $stWorkshop = StudentFreeCourses::where('student_id' , '=', $this->id)->where('free_course_id', '=', $id)->first();
    if($stWorkshop != null){
      if($stWorkshop->has_certificate == 1){
        return true;
      }
    }

    return false;
  }





}
