<?php

namespace App\Http\Controllers\Consultant;

use App\Advice;
use App\CounselorReport;
use App\Http\Controllers\Util\Uploader;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class ConsultantController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('consultant');
  }

  public function consultant(){
    $consults = Auth::user()->consultantConsults()->orderBy('id', 'desc')->get();
    return view('counselor.counselor', compact('consults'));
  }

  public function sendAnswer(Request $request){
    $consult = Advice::find($request->id);
    if($consult->adviser_id != Auth::user()->id) return back();

    $consult->answer = $request->answer;
    if($request->hasFile('file')) {
      $file = Uploader::file($request->file('file'));
      $consult->answer_file = $file;
    }
    $consult->save();

    $user = $consult->user;
    $message = "پاسخی به پرسش شما با موضوع $consult->title ارسال شد. لطفا برای مشاهده به پنل خود مراجعه کنید.\n سیستم همگام دانشگاه شهید مدنی آذربایجان";
//    str_replace('title', $consult->title, $message);
//    str_replace('br', "\n", $message);
    Smsirlaravel::send([$message], [$user->mobile]);

    return back();
  }

  public function profile(){
    return view('counselor.profile');
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
    return view('counselor.contact', compact('messages'));
  }

  public function sendMessage(Request $request){
    $message = Message::create([
      'user_id' => Auth::user()->id,
      'name' => Auth::user()->first_name.' '.Auth::user()->last_name,
      'email' => Auth::user()->email,
      'question' => $request->question,
    ]);

    return back();
  }


  public function reports(){
    $user = Auth::user();
    $reports = $user->counselorReports()->orderBy('id', 'desc')->get();
    return view('counselor.performant-report', compact('reports'));
  }

  public function sendReport(Request $request){
    $report = CounselorReport::create([
      'user_id' => Auth::user()->id,
      'message' => $request->message
    ]);

    return back();
  }


}
