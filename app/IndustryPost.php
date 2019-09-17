<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndustryPost extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'description', 'image', 'file'];
}
