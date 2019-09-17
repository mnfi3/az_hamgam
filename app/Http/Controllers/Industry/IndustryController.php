<?php

namespace App\Http\Controllers\Industry;

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
}
