<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'master_id', 'time', 'price', 'capacity'];


  public function master(){
    return $this->belongsTo('App\User', 'master_id');
  }

  public function prerequisites(){
    return $this->belongsToMany('App\Course', 'prerequisites', 'course_id', 'requisite_id');
  }
}
