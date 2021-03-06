<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idea extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'title', 'file', 'answer'];
}
