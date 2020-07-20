<?php

namespace App\Http\Controllers\Admin;

use App\Advice;
use App\Field;
use App\FieldJob;
use App\Http\Controllers\Util\Uploader;
use App\Job;
use App\JobAd;
use App\User;
use App\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class AdminGuidanceController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function guidance(){
    $guidance = Util::get(Util::KEY_ACADEMIC_GUIDANCE);
    return view('admin.guidance', compact('guidance'));
  }

  public function guidanceAdd(Request $request){
    $guidance = Util::get(Util::KEY_ACADEMIC_GUIDANCE);
    $guidance->key = Util::KEY_ACADEMIC_GUIDANCE;
    $guidance->description = $request->description;
    $guidance->save();
    return back();
  }


  public function purpose(){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_PURPOSE);
    return view('admin.purpose', compact('util'));
  }

  public function purposeUpdate(Request $request){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_PURPOSE);
    $util->key = Util::KEY_ACADEMIC_GUIDANCE_PURPOSE;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    if($request->hasFile('file')) $util->file = Uploader::file($request->file('file'));

    $util->description = $request->description;
    $util->save();
    return back();
  }

  public function jobs(){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_JOBS);
    $fields = Field::all();
    $jobs = Job::all();
    return view('admin.jobs', compact('util', 'fields', 'jobs'));
  }

  public function jobsUpdate(Request $request){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_JOBS);
    $util->key = Util::KEY_ACADEMIC_GUIDANCE_JOBS;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->description = $request->description;
    $util->save();
    return back();
  }


  public function jobAdd(Request $request){
    $job = Job::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
    ]);

    return back();
  }

  public function fieldAdd(Request $request){
    $field = Field::create([
      'name' => $request->name
    ]);
    return back();
  }

  public function fieldJobAdd(Request $request){
    $field_job = FieldJob::create([
      'field_id' => $request->field_id,
      'job_id' => $request->job_id,
    ]);
    return back();
  }

  public function consult(){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_CONSULT);
    $consults = Advice::orderBy('id', 'desc')->paginate(20);
    $consultants = User::where('role', '=', 'consultant')->orderBy('id', 'desc')->get();
    return view('admin.consult', compact('util', 'consults', 'consultants'));
  }

  public function consultUpdate(Request $request){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_CONSULT);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function senToConsultant(Request $request){
    $advice = Advice::find($request->consult_id);
    $advice->adviser_id = $request->consultant_id;
    $advice->save();
    return back();
  }

  public function consultAnswer(Request $request){
    $advice = Advice::find($request->consult_id);
    $advice->answer = $request->answer;
    if($request->hasFile('file')) {
      $file = Uploader::file($request->file('file'));
      $advice->answer_file = $file;
    }
    $advice->save();


    $user = $advice->user;
    $message = "پاسخی به پرسش شما با موضوع $advice->title ارسال شد. لطفا برای مشاهده به پنل خود مراجعه کنید.\n سیستم همگام دانشگاه شهید مدنی آذربایجان";
    str_replace('title', $advice->title, $message);
    str_replace('br', "\n", $message);
    Smsirlaravel::send([$message], [$user->mobile]);

    return back();
  }

  public function changeField(){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD);
    return view('admin.change-field', compact('util'));
  }

  public function changeFieldUpdate(Request $request){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_CHANGE_FIELD);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    if($request->hasFile('file')) $util->file = Uploader::file($request->file('file'));
    $util->save();
    return back();
  }



  public function jobAdsUpdate(Request $request){
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_JOB_ADS);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function jobAds(){
    $ads = JobAd::orderBy('id', 'desc')->get();
    $util = Util::get(Util::KEY_ACADEMIC_GUIDANCE_JOB_ADS);
    return view('admin.job-adds', compact('ads', 'util'));
  }


  public function jobAdInsert(Request $request){
    $image = Uploader::image($request->file('image'));
    $ad = JobAd::create([
      'industry_id' => 0,
      'title' => $request->title,
      'image' => $image,
      'description' => $request->description,
      'salary' => $request->salary,
      'skills' => $request->skills,
      'is_accepted' => 1,
    ]);

    return back();
  }


  public function jobAdEdit($id){
    $ad = JobAd::find($id);
    return view('admin.edit-job_ad', compact('ad'));
  }

  public function jobAdUpdate(Request $request){
    $ad = JobAd::find($request->id);
    $ad->title = $request->title;
    if($request->hasFile('image')){
      $ad->image = Uploader::image($request->file('image'));
    }
    $ad->description = $request->description;
    $ad->skills = $request->skills;
    $ad->salary = $request->salary;
    $ad->save();
    return back();
  }



  public function jobAdRemove($id){
    $ad = JobAd::find($id);
    $ad->delete();
    return back();
  }


  public function jobAdAccept($id){
    $ad = JobAd::find($id);
    $ad->is_accepted = 1;
    $ad->save();
    return back();
  }

  public function jobAdReject($id){
    $ad = JobAd::find($id);
    $ad->is_accepted = -1;
    $ad->save();
    return back();
  }


}
