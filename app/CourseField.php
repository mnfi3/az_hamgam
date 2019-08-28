<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseField extends Model
{
  use SoftDeletes;

  protected $fillable = ['course_id', 'field_id'];
}
