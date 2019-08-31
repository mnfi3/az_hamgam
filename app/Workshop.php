<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'master_id', 'time', 'capacity', 'price', 'deadline'];


  public function master(){
    return $this->belongsTo('App\User', 'master_id');
  }



  public function students(){
    return $this->belongsToMany('App\User', 'student_workshops', 'workshop_id', 'student_id');
  }
  

}
