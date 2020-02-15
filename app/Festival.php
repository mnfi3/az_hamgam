<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Festival extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'file', 'date', 'hour', 'price', 'is_cash_pay'];


  public function students(){
    return $this->belongsToMany('App\User', 'student_festivals', 'festival_id', 'student_id');
  }


}
