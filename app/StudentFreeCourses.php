<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentFreeCourses extends Model
{
  use SoftDeletes;

  protected $fillable = ['student_id', 'free_course_id', 'has_certificate'];
}
