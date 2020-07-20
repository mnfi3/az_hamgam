<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobAd extends Model
{
  use SoftDeletes;

  protected $fillable = ['industry_id', 'title', 'image', 'description', 'salary', 'skills', 'is_accepted'];


  public function Industry(){
    return $this->belongsTo('App\User','industry_id');
  }
}
