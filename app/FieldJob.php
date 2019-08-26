<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldJob extends Model
{
  use SoftDeletes;

  protected $fillable = ['field_id', 'job_id'];
}
