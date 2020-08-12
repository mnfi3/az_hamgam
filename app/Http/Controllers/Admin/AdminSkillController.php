<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\CourseField;
use App\Field;
use App\FreeCourse;
use App\Http\Controllers\Util\PDate;
use App\Http\Controllers\Util\PNum;
use App\Http\Controllers\Util\Uploader;
use App\Prerequisite;
use App\StudentFreeCourses;
use App\StudentCourses;
use App\Suggest;
use App\User;
use App\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSkillController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function skill(){
    $util = Util::get(Util::KEY_SKILL);
    return view('admin.skill-learning', compact('util'));
  }

  public function skillUpdate(Request $request){
    $util = Util::get(Util::KEY_SKILL);
    $util->description = $request->description;
    $util->save();
    return back();
  }

  public function courses(){
    $util = Util::get(Util::KEY_SKILL_COURSES);
    $fields = Field::orderBy('id', 'desc')->get();
    $masters = User::where('role', '=', 'master')->orderBy('id', 'desc')->get();
    $courses = Course::orderBy('id', 'desc')->get();
    return view('admin.skill-coures', compact('util', 'fields', 'masters', 'courses'));
  }

  public function coursesUpdate(Request $request){
    $util = Util::get(Util::KEY_SKILL_COURSES);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function courseAdd(Request $request){
    $d = new PDate();
    $course = Course::create([
      'code' => $request->code,
      'title' => $request->title,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
      'master_id' => $request->master_id,
      'time' => $request->time,
      'term' => $request->term,
      'price' => $request->price,
      'capacity' => $request->capacity,
      'gender' => $request->gender,
      'deadline' =>$d->toGregorian(PNum::toLatin($request->deadline)),
      'duration' => $request->duration,
    ]);


    if($request->fields != null) {
      $field_ids = $request->fields;
      foreach ($field_ids as $id) {
        $cf = CourseField::create([
          'course_id' => $course->id,
          'field_id' => $id
        ]);
      }
    }

    if($request->prerequisite != null) {
      $course_ids = $request->prerequisite;
      foreach ($course_ids as $id) {
        $p = Prerequisite::create([
          'course_id' => $course->id,
          'requisite_id' => $id,
        ]);
      }
    }

    return back();

  }

  public function courseEdit(Request $request){
    $d = new PDate();
    $course = Course::find($request->id);
    $course->code = $request->code;
    $course->title = $request->title;
    $course->description = $request->description;
    if($request->hasFile('image'))$course->image = Uploader::image($request->file('image'));
    $course->master_id = $request->master_id;
    $course->time = $request->time;
    $course->term = $request->term;
    $course->price = $request->price;
    $course->capacity = $request->capacity;
    $course->gender = $request->gender;
    $course->deadline = $d->toGregorian(PNum::toLatin($request->deadline));
    $course->duration = $request->duration;
    $course->save();
    return back();
  }

  public function courseRemove($id){
    $course = Course::find($id);
    $course->delete();
    return back();
  }

  public function courseDetail($id){
    $course = Course::find($id);
    $st_courses = StudentCourses::where('course_id', '=', $id)->get();
    $masters = User::where('role', '=', 'master')->orderBy('id', 'desc')->get();
    return view('admin.course-detailes', compact('course', 'masters', 'st_courses'));
  }

  public function sendCert(Request $request){
    $certs = $request->certs;
    if ($certs == null){
      $st_courses = StudentCourses::where('course_id', '=', $request->course_id)->get();
      foreach ($st_courses as $stc){
        $stc->has_certificate = 0;
        $stc->save();
      }
      return back();
    }


    $st_courses = StudentCourses::where('course_id', '=', $request->course_id)->get();

    foreach ($st_courses as $stc){
      $is_find = false;
      foreach ($certs as $id){
        if($stc->student_id == $id){
          $is_find = true;
          $stc->has_certificate = 1;
          $stc->save();
          break;
        }
      }

      if ($is_find == false)  {
        $stc->has_certificate = 0;
        $stc->save();
      }

    }

    return back();
  }


  public function courseOffer(){
    $suggests = Suggest::orderBy('id', 'desc')->paginate(40);
    $util = Util::get(Util::KEY_SKILL_SUGGEST);
    return view('admin.course-offer', compact('suggests', 'util'));
  }

  public function courseOfferUpdate(Request $request){
    $util = Util::get(Util::KEY_SKILL_SUGGEST);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function schedule(){
    $util = Util::get(Util::KEY_SKILL_TERM);
    return view('admin.schedule', compact('util'));
  }

  public function scheduleUpdate(Request $request){
    $util = Util::get(Util::KEY_SKILL_TERM);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    if($request->hasFile('file')) $util->file = Uploader::file($request->file('file'));
    $util->save();
    return back();
  }



  public function freeCourses(){
    $util = Util::get(Util::KEY_SKILL_FREE_COURSES);
    $fields = Field::orderBy('id', 'desc')->get();
    $masters = User::where('role', '=', 'master')->orderBy('id', 'desc')->get();
    $courses = FreeCourse::orderBy('id', 'desc')->get();
    return view('admin.free-courses', compact('util', 'fields', 'masters', 'courses'));
  }

  public function freeCourseDetail($id){
    $course = FreeCourse::find($id);
    $st_courses = StudentFreeCourses::where('free_course_id', '=', $id)->get();
    $masters = User::where('role', '=', 'master')->orderBy('id', 'desc')->get();
    return view('admin.free-course-details', compact('course', 'masters', 'st_courses'));
  }

  public function freeCourseUpdate(Request $request){
    $util = Util::get(Util::KEY_SKILL_FREE_COURSES);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function freeCourseRemove($id){
    $course = FreeCourse::find($id);
    $course->delete();
    return back();
  }

  public function freeCourseAdd(Request $request){
    $d = new PDate();
    $course = FreeCourse::create([
      'code' => $request->code,
      'title' => $request->title,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
      'master_id' => $request->master_id,
      'capacity' => $request->capacity,
      'price' => $request->price,
      'time' => $d->toGregorian(PNum::toLatin($request->time)),
      'hour' => $request->hour,
      'deadline' => $d->toGregorian(PNum::toLatin($request->time)),
      'duration' => $request->duration,
    ]);
    return back();
  }


  public function freeCourseEdit(Request $request){
    $course = FreeCourse::find($request->id);
    $d = new PDate();
    $course->code = $request->code;
    $course->title = $request->title;
    $course->description = $request->description;
    if($request->hasFile('image')) $course->image = Uploader::image($request->file('image'));
    $course->master_id = $request->master_id;
    $course->capacity = $request->capacity;
    $course->price = $request->price;
    $course->time = $d->toGregorian(PNum::toLatin($request->time));
    $course->hour = $request->hour;
    $course->deadline = $d->toGregorian(PNum::toLatin($request->time));
    $course->duration = $request->duration;
    $course->save();

    return back();
  }

  public function freeCourseSendCert(Request $request){
    $certs = $request->certs;
    if ($certs == null){
      $st_courses = StudentFreeCourses::where('free_course_id', '=', $request->free_course_id)->get();
      foreach ($st_courses as $stw){
        $stw->has_certificate = 0;
        $stw->save();
      }
      return back();
    }

    $st_courses = StudentFreeCourses::where('free_course_id', '=', $request->free_course_id)->get();
    foreach ($st_courses as $stw){
      $is_find = false;
      foreach ($certs as $id){
        if($stw->student_id == $id){
          $is_find = true;
          $stw->has_certificate = 1;
          $stw->save();
          break;
        }
      }

      if ($is_find == false)  {
        $stw->has_certificate = 0;
        $stw->save();
      }

    }

    return back();
  }
}
