<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Util extends Model
{
  use SoftDeletes;

  protected $fillable = ['type', 'key', 'value'];


  //types
  const TYPE_FILE = 'file';
  const TYPE_IMAGE = 'image';
  const TYPE_TEXT = 'text';

  //keys
  const KEY_ABOUT = 'about';

  const KEY_ACADEMIC_GUIDANCE = 'academic-guidance';
  const KEY_ACADEMIC_GUIDANCE_GOAL = 'academic-guidance-goal';
  const KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD = 'academic-guidance-change-field';

  const KEY_SKILL = 'skill';
  const KEY_SKILL_TERM = 'skill-term';
  const KEY_SKILL_COURSES = 'skill-courses';
  const KEY_SKILL_SUGGEST = 'skill-suggest';
}
