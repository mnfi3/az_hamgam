<?php

namespace App\Http\Controllers\Student;

use App\Field;
use App\Http\Controllers\Util\Uploader;
use App\Idea;
use App\Message;
use App\StudentFestivals;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('student');
  }


  public function student(){
    $courses = Auth::user()->studentCourses()->orderBy('id', 'desc')->paginate(9);
    return view('student.course', compact('courses'));
  }

  public function workshop(){
    $workshops = Auth::user()->studentWorkshops()->orderBy('id', 'desc')->paginate(9);
    return view('student.workshop', compact('workshops'));
  }

  public function freeCourse(){
    $courses = Auth::user()->studentFreeCourses()->orderBy('id', 'desc')->paginate(9);
    return view('student.free-course', compact('courses'));
  }

  public function consults(){
    $user = Auth::user();
    $consults = $user->studentConsults()->orderBy('id', 'desc')->paginate(9);
    $consultants = User::where('role', '=', 'consultant')->orderBy('id', 'desc')->get();

    DB::update("update advices set is_seen = 1 where user_id='$user->id'  and answer is not null");
    return view('student.consult', compact('consults', 'consultants'));
  }

  public function profile(){
    $user = Auth::user();
    $fields = Field::all();
    return view('student.profile', compact('user', 'fields'));
  }


  public function contact(){
    $user = Auth::user();
    $messages = $user->studentMessages()->orderBy('id', 'desc')->paginate(20);
    return view('student.contact', compact('messages'));
  }

  public function sentMessage(Request $request){
    $user = Auth::user();
    $message = Message::create([
      'user_id' => $user->id,
      'name' => $user->first_name . ' ' . $user->last_name,
      'email' => $user->email,
      'question' => $request->question,
      'answer' => '',
      'is_seen' => 0,
    ]);

    return back()->with('msg', 'پیام شما با موفقیت ارسال شد');
  }

  public function idea(){
    $ideas = Auth::user()->studentIdeas()->orderBy('id', 'desc')->get();
    return view('student.idea', compact('ideas'));
  }

  public function ideaInsert(Request $request){
    $path = '';
    if($request->hasFile('file')) {
      $path = Uploader::file($request->file('file'));
    }
    $idea = Idea::create([
      'user_id' => Auth::user()->id,
      'title' => $request->title,
      'file' => $path,
      'answer' => '',
    ]);
    return back()->with('msg', 'ایده شما با موفقیت ثبت شد');
  }

  public function festivals(){
    $festivals = Auth::user()->studentFestivals()->orderBy('id', 'desc')->paginate(9);
    return view('student.festivals', compact('festivals'));
  }

  public function festivalSendFile(Request $request){
    $student_festival = StudentFestivals::where('student_id', '=', Auth::user()->id)->where('festival_id', '=', $request->festival_id)->first();
    $file = Uploader::file($request->file('file'));
    $student_festival->file = $file;
    $student_festival->save();
    return back()->with('success', 'آپلود فایل با موفقیت انجام شد');
  }






  public function profileUpdate(Request $request){
    $user = Auth::user();
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->mobile = $request->mobile;
    $user->field_id = $request->field_id;
    $user->student_number = $request->student_number;
    $user->national_code = $request->national_code;
    $user->save();
    $msg = 'اطلاعات پروفایل با موفقیت بروز شد';
    return back()->with('update', $msg);
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
