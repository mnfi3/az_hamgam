<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'name', 'email', 'question', 'answer', 'is_seen'];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
