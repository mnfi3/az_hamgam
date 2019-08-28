<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GraduatesEmployed extends Model
{
  use SoftDeletes;

  protected $fillable = ['name', 'image', 'description', 'job', 'field'];
}
