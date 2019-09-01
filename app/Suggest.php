<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggest extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'title'];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
