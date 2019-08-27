<?php

namespace App\Http\Controllers;

use App\Util;
use Illuminate\Http\Request;

class SiteSkillController extends Controller
{
  public function skillLearning(){
    $description = '';
    $term = '';
    $suggest = '';
    $courses = '';
    $util = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_SKILL)->orderBy('id', 'desc')->first();
    if ($util != null) $description = $util->value;
    $util = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_SKILL_TERM)->orderBy('id', 'desc')->first();
    if ($util != null) $term = $util->value;
    $util = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_SKILL_SUGGEST)->orderBy('id', 'desc')->first();
    if ($util != null) $suggest = $util->value;
    $util = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_SKILL_COURSES)->orderBy('id', 'desc')->first();
    if ($util != null) $courses = $util->value;

    return view('site.skill-learning', compact('description', 'term', 'suggest', 'courses'));
  }


  public function term(){
    $description = '';
    $image = '';
    $file = '';
    $util = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_SKILL_TERM)->orderBy('id', 'desc')->first();
    if ($util != null) $description = $util->value;
    $util = Util::where('type', '=', Util::TYPE_IMAGE)->where('key', '=', Util::KEY_SKILL_TERM)->orderBy('id', 'desc')->first();
    if ($util != null) $image = $util->value;
    $util = Util::where('type', '=', Util::TYPE_FILE)->where('key', '=', Util::KEY_SKILL_TERM)->orderBy('id', 'desc')->first();
    if ($util != null) $file = $util->value;

    return view('site.content', compact('description', 'image', 'file'));
  }

  public function courses(){
    return view('site.skill-courses');
  }
}
