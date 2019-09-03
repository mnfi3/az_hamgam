<?php

namespace App\Http\Controllers\Master;

use App\Course;
use App\Message;
use App\Workshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasterController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('master');
  }

  public function master(){
    $user = Auth::user();
    $courses = $user->masterCourses;
    return view('master.master', compact('courses'));
  }

  public function courseDetail($id){
    $course = Course::find($id);
    if(Auth::user()->id == $course->master_id){
      return view('master.course-detalis', compact('course'));
    }
  }

  public function workshops(){
    $workshops = Auth::user()->masterWorkshops;
    return view('master.workshop', compact('workshops'));
  }

  public function workshopDetail($id){
    $workshop = Workshop::find($id);
    if (Auth::user()->id == $workshop->master_id) {
      return view('master.workshop-detalis', compact('workshop'));
    }
  }

  public function profile(){
    return view('master.profile');
  }

  public function changePass(Request $request){
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

  public function contact(){
    $messages = Auth::user()->messages;
    return view('master.contact', compact('messages'));
  }

  public function sendMessage(Request $request){
    Message::create([
      'user_id' => Auth::user()->id,
      'name' => Auth::user()->first_name.' '.Auth::user()->last_name,
      'email' => Auth::user()->email,
      'question' => $request->question,
      'is_seen' => 0,
    ]);
    return back();
  }
}
