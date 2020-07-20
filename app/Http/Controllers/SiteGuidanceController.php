<?php

namespace App\Http\Controllers;

use App\Advice;
use App\Field;
use App\Http\Controllers\Util\Uploader;
use App\Job;
use App\JobAd;
use App\User;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ipecompany\Smsirlaravel\Smsirlaravel;

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

    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_JOB_ADS);
    $job_ads = $util->description;
    $job_ads_image = $util->image;





    return view('site.academic-guidance',
      compact('description', 'file', 'jobs', 'jobs_image', 'consult', 'consult_image', 'purpose', 'purpose_image', 'change_field', 'change_field_image', 'job_ads', 'job_ads_image')
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
    $consultants = User::where('role', '=', 'consultant')->orderBy('id', 'desc')->get();
    return view('site.consult', compact('consultants'));
  }

  public function coronaConsult(){
    $consultants = User::where('role', '=', 'consultant')->orderBy('id', 'desc')->get();
    return view('site.corona-consultation', compact('consultants'));
  }

  public function consultInsert(Request $request){
    $file = '';
    if($request->hasFile('file')) {
      $file = Uploader::file($request->file('file'));
    }
    $advice = Advice::create([
      'user_id' => Auth::user()->id,
      'title' => $request->title,
      'question' => $request->question,
      'question_file' => $file,
      'adviser_id' => $request->consultant_id,
      'is_seen' => 0,
    ]);

    if ($advice->adviser_id != 0 && $advice->adviser_id != null) {
      $counselor = $advice->consultant;
      $message = " پرسشی با موضوع $advice->title برای شما ارسال شد. لطفا برای مشاهده به پنل خود مراجعه کنید.\n سیستم همگام دانشگاه شهید مدنی آذربایجان";
//      str_replace('title', $advice->title, $message);
//      str_replace('br', "\n", $message);
      Smsirlaravel::send([$message], [$counselor->mobile]);
    }



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



  public function jobAds(Request $request){
    $text = $request->text;
    if (strlen($text) > 2)
      $ads = JobAd::orderBy('id', 'desc')->where('title', 'like' , '%'.$text.'%')->where('is_accepted', '=', 1)->paginate(30);
    else
      $ads = JobAd::orderBy('id', 'desc')->where('is_accepted', '=', 1)->paginate(30);
    return view('site.job-adds', compact('ads'))->with('text', $text);
  }

  public function jobAdsDetails($id){
    $ad = JobAd::find($id);
    if($ad->is_accepted != 1) return back();
    return view('site.job-details', compact('ad'));
  }




}
