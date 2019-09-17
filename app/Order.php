<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id', 'orderable_id', 'orderable_type', 'amount'];
}
