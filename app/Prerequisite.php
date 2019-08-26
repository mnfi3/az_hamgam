<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prerequisite extends Model
{
  use SoftDeletes;

  protected $fillable = ['course_id', 'requisite_id'];
}
