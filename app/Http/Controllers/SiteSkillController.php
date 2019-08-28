<?php

namespace App\Http\Controllers;

use App\Course;
use App\Field;
use App\Suggest;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteSkillController extends Controller
{

  public function __construct() {
    $this->middleware('student', ['only' => ['offerInsert']]);
  }


  public function skillLearning(){
    $description = '';
    $term = '';
    $term_image = '';
    $suggest = '';
    $suggest_image = '';
    $courses = '';
    $courses_image = '';

    $util = Util::get(Util::KEY_SKILL);
    if ($util != null) $description = $util->description;
    $util = Util::get(Util::KEY_SKILL_TERM);
    if ($util != null){
      $term = $util->description;
      $term_image = $util->image;
    }
    $util = Util::get(Util::KEY_SKILL_SUGGEST);
    if ($util != null) {
      $suggest = $util->description;
      $suggest_image = $util->image;
    }
    $util = Util::get(Util::KEY_SKILL_COURSES);
    if ($util != null) {
      $courses = $util->description;
      $courses_image = $util->image;
    }

    return view('site.skill-learning',
      compact('description', 'term', 'term_image', 'suggest', 'suggest_image', 'courses', 'courses_image'));
  }


  public function term(){
    $description = '';
    $image = '';
    $file = '';
    $util = Util::get(Util::KEY_SKILL_TERM);
    if ($util != null) {
      $description = $util->description;
      $image = $util->image;
      $file = $util->file;
    }

    return view('site.content', compact('description', 'image', 'file'));
  }



  public function courses(Request $request){
    if ($request->field_id == 0 && $request->term == 0){
      $courses = Course::orderBy('id', 'desc')->paginate(9);
    }
    else if($request->field_id != 0 && $request->term == 0){
      $field = Field::find($request->field_id);
      $courses = $field->courses()->paginate(9);
    }
    else if($request->field_id == 0 && $request->term != 0){
      $courses = Course::where('term', '=', $request->term)->orderBy('id', 'desc')->paginate(9);
    }
    else{
      $field = Field::find($request->field_id);
      $courses = $field->courses()->where('term', '=', $request->term)->paginate(9);
    }

    $fields = Field::all();
    $field_id = $request->field_id;
    $term = $request->term;

    return view('site.skill-courses', compact('courses', 'fields', 'field_id', 'term'));
  }


  public function offer(){
    return view('site.offer');
  }

  public function offerInsert(Request $request){
    $suggest = Suggest::create([
      'user_id' => Auth::user()->id,
      'title' => $request->title,
    ]);

    return back()->with('msg', 1);
  }

}
