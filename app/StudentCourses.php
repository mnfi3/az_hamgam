<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentCourses extends Model
{
  use SoftDeletes;

  protected $fillable = ['student_id', 'course_id', 'has_certificate'];
}
