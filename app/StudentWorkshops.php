<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentWorkshops extends Model
{
  use SoftDeletes;

  protected $fillable = ['student_id', 'workshop_id', 'has_certificate', 'mark'];
}
