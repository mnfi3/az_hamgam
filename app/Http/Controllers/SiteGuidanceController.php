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
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE);
    $description = $util->description;
    $file = $util->file;

    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_JOBS);
    $jobs = $util->description;
    $jobs_image = $util->image;

    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_CONSULT);
    $consult = $util->description;
    $consult_image = $util->image;

    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_PURPOSE);
    $purpose = $util->description;
    $purpose_image = $util->image;
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD);
    $change_field = $util->description;
    $change_field_image = $util->image;





    return view('site.academic-guidance',
      compact('description', 'file', 'jobs', 'jobs_image', 'consult', 'consult_image', 'purpose', 'purpose_image', 'change_field', 'change_field_image')
    );
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
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_PURPOSE);
    if(!is_null($util)) {
      $description = $util->description;
      $image = $util->image;
      $file = $util->file;
    }

    return view('site.content', compact('description', 'file', 'image'));
  }


  public function changeField(){
    $description = '';
    $file = '';
    $image = '';
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD);
    if(!is_null($util)) {
      $description = $util->description;
      $image = $util->image;
      $file = $util->file;
    }

    return view('site.content', compact('description', 'file', 'image'));
  }


}
