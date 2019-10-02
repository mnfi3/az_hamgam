<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeCourse extends Model
{
  use SoftDeletes;


  protected $fillable = ['title', 'description', 'image', 'master_id', 'time', 'hour', 'capacity', 'price', 'deadline', 'duration'];


  public function master(){
    return $this->belongsTo('App\User', 'master_id');
  }

  public function students(){
    return $this->belongsToMany('App\User', 'student_free_courses', 'free_course_id', 'student_id');
  }
}
