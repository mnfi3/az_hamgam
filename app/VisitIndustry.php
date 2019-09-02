<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitIndustry extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'time_place', 'deadline', 'capacity'];

  public function users(){
    return $this->belongsToMany('App\User', 'user_visits', 'visit_industry_id', 'user_id');
  }
}
