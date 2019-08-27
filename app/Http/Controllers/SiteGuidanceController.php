<?php

namespace App\Http\Controllers;

use App\Advice;
use App\Course;
use App\Field;
use App\FrequentlyQuestion;
use App\Idea;
use App\Job;
use App\Slider;
use App\User;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteGuidanceController extends Controller
{

  public function __construct() {
    $this->middleware('student', ['only'=>['consultInsert']]);
  }



  //academic-guidance section

  public function academicGuidance(){
    $description = '';
    $file = '';
    $goal = '';
    $change_field = '';
    $guide = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $description = $guide->value;
    $guide = Util::where('type', '=', 'file')->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $file = $guide->value;
    $guide = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE_GOAL)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $goal = $guide->value;
    $guide = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=',Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $change_field = $guide->value;

    return view('site.academic-guidance', compact('description', 'file', 'goal', 'change_field'));
  }

  public function relativeJobs(Request $request){
    if($request->field_id != null && $request->field_id != 0){
      $jobs = Field::find($request->field_id)->jobs()->paginate(9);
    }else{
      $jobs = Job::paginate(9);
    }
    $fields = Field::all();
    return view('site.relative-jobs', compact('jobs', 'fields'));
  }

  public function consult(){
    return view('site.consult');
  }

  public function consultInsert(Request $request){

    $advice = Advice::create([
      'user_id' => Auth::user()->id,
      'title' => $request->title,
      'question' => $request->question,
      'is_seen' => 0,
    ]);

    $msg = 1;
    return back()->with('msg', $msg);;
  }


  public function goal(){
    $description = '';
    $file = '';
    $image = '';
    $guide = Util::where('type', '=', Util::TYPE_TEXT)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE_GOAL)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $description = $guide->value;
    $guide = Util::where('type', '=', Util::TYPE_FILE)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE_GOAL)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $file = $guide->value;
    $guide = Util::where('type', '=', Util::TYPE_IMAGE)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE_GOAL)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $image = $guide->value;
    return view('site.content', compact('description', 'file', 'image'));
  }


  public function changeField(){
    $description = '';
    $file = '';
    $image = '';
    $guide = Util::where('type', '=',  Util::TYPE_TEXT)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $description = $guide->value;
    $guide = Util::where('type', '=', Util::TYPE_FILE)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $file = $guide->value;
    $guide = Util::where('type', '=', Util::TYPE_IMAGE)->where('key', '=', Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD)->orderBy('id', 'desc')->first();
    if(!is_null($guide)) $image = $guide->value;
    return view('site.content', compact('description', 'file', 'image'));
  }


}
