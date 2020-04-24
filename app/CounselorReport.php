<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CounselorReport extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'message'];



  public function user(){
    return $this->belongsTo('App\User');
  }
}
