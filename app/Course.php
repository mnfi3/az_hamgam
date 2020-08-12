<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
  use SoftDeletes;

  protected $fillable = ['code', 'title', 'description', 'image', 'master_id', 'time', 'price', 'capacity', 'deadline', 'duration', 'gender'];




  public function students(){
    return $this->belongsToMany('App\User', 'student_courses', 'course_id', 'student_id');
  }

  public function master(){
    return $this->belongsTo('App\User', 'master_id');
  }

  public function prerequisites(){
    return $this->belongsToMany('App\Course', 'prerequisites', 'course_id', 'requisite_id');
  }

  public function fields(){
    return $this->belongsToMany('App\Field', 'course_fields');
  }
}
