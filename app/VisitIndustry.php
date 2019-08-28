<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitIndustry extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'time_place'];
}
