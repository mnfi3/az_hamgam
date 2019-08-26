<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workshop extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'master_id', 'time', 'capacity', 'price', 'deadline'];
}