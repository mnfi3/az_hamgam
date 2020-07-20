<?php

namespace App\Http\Controllers\Industry;

use App\Http\Controllers\Util\Uploader;
use App\JobAd;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndustryController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('industry');
  }


  public function industry(){
    $messages = Auth::user()->messages()->orderBy('id', 'desc')->get();
    return view('industry.industry',  compact('messages'));
  }

  public function sendMessage(Request $request){
    $user = Auth::user();
    $message = Message::create([
      'user_id' => $user->id,
      'name' => $user->first_name.' '.$user->last_name,
      'email' => $user->email,
      'question' => $request->question,
    ]);

    return back();
  }

  public function profile(){
    return view('industry.profile');
  }


  public function changePassword(Request $request){
    $user = Auth::user();
    $old_password = $request->old_password;
    $password = $request->password;
    $password2 = $request->password_confirmation;
    if (Hash::check($old_password, $user->password)){
      if ($password == $password2 && strlen($password) >= 6) {
        $user->password = Hash::make($request->password);
        $user->save();
        $msg = 'کلمه عبور با موفقیت ویرایش شد';
      }else{
        $msg = 'اطلاعات ارسال شده اشتباه میباشد';
      }
    }else{
      $msg = 'اطلاعات ارسال شده اشتباه میباشد';
    }

    return back()->with('password', $msg);
  }

  public function jobs(){
    $user = Auth::user();
    $ads = $user->industryJobAds;
    return view('industry.jobs', compact('ads'));
  }

  public function jobAdInsert(Request $request){
    $image = Uploader::image($request->file('image'));
    $ad = JobAd::create([
      'industry_id' => Auth::user()->id,
      'title' => $request->title,
      'image' => $image,
      'description' => $request->description,
      'salary' => $request->salary,
      'skills' => $request->skills,
      'is_accepted' => 0,
    ]);

    return back();
  }



  public function jobEdit($id){
    $ad = JobAd::find($id);
    if ($ad->industry_id != Auth::user()->id) return back();
    return view('industry.job-edit', compact('ad'));
  }


  public function jobAdUpdate(Request $request){
    $ad = JobAd::find($request->id);
    if ($ad->industry_id != Auth::user()->id) return back();
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


  public function jobRemove($id){
    $ad = JobAd::find($id);
    if ($ad->industry_id != Auth::user()->id) return back();
    $ad->delete();
    return back();
  }
}
