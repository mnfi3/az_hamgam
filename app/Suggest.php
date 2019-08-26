<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggest extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'name', 'email', 'title'];
}
