<?php

namespace App\Http\Controllers;

use App\Course;
use App\Field;
use App\FrequentlyQuestion;
use App\Idea;
use App\Slider;
use App\User;
use App\Util;
use Illuminate\Http\Request;

class SiteController extends Controller
{

  public function index(){
    $sliders = Slider::orderBy('id', 'desc')->get();
    $fields_count = Field::count();
    $masters_count = User::where('role', '=', 'master')->count();
    $ideas_count = Idea::count();
    $courses_count = Course::count();
    $questions = FrequentlyQuestion::all();
    $about = '';
    $ab = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_ABOUT)->orderBy('id', 'desc')->first();
    if(!is_null($ab)) $about = $ab->value;
    return view('index', compact('sliders', 'masters_count', 'fields_count', 'ideas_count', 'courses_count', 'questions', 'about'));
  }
}
