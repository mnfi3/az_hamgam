<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advice extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'title', 'question', 'answer', 'adviser_id', 'is_seen'];
}
