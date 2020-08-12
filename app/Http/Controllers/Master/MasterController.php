<?php

namespace App\Http\Controllers\Master;

use App\Course;
use App\FreeCourse;
use App\Message;
use App\StudentCourses;
use App\StudentFreeCourses;
use App\StudentWorkshops;
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

  public function courseDetailAddMark(Request $request){
    $course = Course::find($request->course_id);
    if($course->master_id != Auth::user()->id) return back();
    $student_course = StudentCourses::where('course_id', '=', $course->id)->where('student_id', '=', $request->student_id)->first();
    $student_course->mark = $request->mark;
    $student_course->save();
    return back();
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

  public function workshopDetailAddMark(Request $request){
    $workshop = Workshop::find($request->workshop_id);
    if($workshop->master_id != Auth::user()->id) return back();
    $student_workshop = StudentWorkshops::where('workshop_id', '=', $workshop->id)->where('student_id', '=', $request->student_id)->first();
    $student_workshop->mark = $request->mark;
    $student_workshop->save();
    return back();
  }

  public function freeCourse(){
    $courses = Auth::user()->masterFreeCourses;
    return view('master.free-course', compact('courses'));
  }

  public function freeCourseDetail($id){
    $free_course = FreeCourse::find($id);
    if (Auth::user()->id == $free_course->master_id) {
      return view('master.free_course-detalis', compact('free_course'));
    }
  }

  public function freeCourseDetailAddMark(Request $request){
    $free_course = FreeCourse::find($request->free_course_id);
    if($free_course->master_id != Auth::user()->id) return back();
    $student_free_course = StudentFreeCourses::where('free_course_id', '=', $free_course->id)->where('student_id', '=', $request->student_id)->first();
    $student_free_course->mark = $request->mark;
    $student_free_course->save();
    return back();
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
