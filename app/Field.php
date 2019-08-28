<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
  use SoftDeletes;

  protected $fillable = ['name'];

  public function jobs(){
    return $this->belongsToMany('App\Job', 'field_jobs');
  }

  public function courses(){
    return $this->belongsToMany('App\Course', 'course_fields');
  }
}
