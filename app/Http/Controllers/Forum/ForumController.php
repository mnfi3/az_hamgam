<?php

namespace App\Http\Controllers\Forum;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForumController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('forum');
  }


  public function forum(){
    $messages = Auth::user()->messages()->orderBy('id', 'desc')->get();
    return view('forum.forum', compact('messages'));
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
    return view('forum.profile');
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
