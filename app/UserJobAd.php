<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserJobAd extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'job_ad_id', 'file', 'is_seen'];


  public function user(){
    return $this->belongsTo('App\User');
  }

  public function jobAd(){
    return $this->belongsTo('App\JobAd');
  }
}

