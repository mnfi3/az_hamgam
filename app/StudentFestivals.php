<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentFestivals extends Model
{
  use SoftDeletes;

  protected $fillable = ['student_id', 'festival_id', 'file'];


  public function festival(){
    return $this->belongsTo('App\Festival');
  }
}
