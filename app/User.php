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


}
