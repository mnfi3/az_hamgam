<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advice extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'title', 'question', 'question_file', 'answer', 'answer_file', 'adviser_id', 'is_seen'];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function consultant(){
    return $this->belongsTo('App\User', 'adviser_id');
  }
}
