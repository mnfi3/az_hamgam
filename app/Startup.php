<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Startup extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'field', 'place', 'boss'];
}
