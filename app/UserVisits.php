<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVisits extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'visit_industry_id'];
}
