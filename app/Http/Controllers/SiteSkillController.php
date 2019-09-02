<?php

namespace App\Http\Controllers;

use App\Course;
use App\Field;
use App\StudentCourses;
use App\Suggest;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteSkillController extends Controller
{

  public function __construct() {
    $this->middleware('auth', ['only' => ['offerInsert', 'courseRegister']]);
    $this->middleware('student', ['only' => ['offerInsert', 'courseRegister']]);
  }


  public function skillLearning(){
    $description = '';
    $term = '';
    $term_image = '';
    $suggest = '';
    $suggest_image = '';
    $courses = '';
    $courses_image = '';

    $util = Util::get(Util::KEY_SKILL);
    if ($util != null) $description = $util->description;
    $util = Util::get(Util::KEY_SKILL_TERM);
    if ($util != null){
      $term = $util->description;
      $term_image = $util->image;
    }
    $util = Util::get(Util::KEY_SKILL_SUGGEST);
    if ($util != null) {
      $suggest = $util->description;
      $suggest_image = $util->image;
    }
    $util = Util::get(Util::KEY_SKILL_COURSES);
    if ($util != null) {
      $courses = $util->description;
      $courses_image = $util->image;
    }

    return view('site.skill-learning',
      compact('description', 'term', 'term_image', 'suggest', 'suggest_image', 'courses', 'courses_image'));
  }


  public function term(){
    $description = '';
    $image = '';
    $file = '';
    $util = Util::get(Util::KEY_SKILL_TERM);
    if ($util != null) {
      $description = $util->description;
      $image = $util->image;
      $file = $util->file;
    }

    return view('site.content', compact('description', 'image', 'file'));
  }



  public function courses(Request $request){
    if ($request->field_id == 0 && $request->term == 0){
      $courses = Course::orderBy('id', 'desc')->paginate(9);
    }
    else if($request->field_id != 0 && $request->term == 0){
      $field = Field::find($request->field_id);
      $courses = $field->courses()->paginate(9);
    }
    else if($request->field_id == 0 && $request->term != 0){
      $courses = Course::where('term', '=', $request->term)->orderBy('id', 'desc')->paginate(9);
    }
    else{
      $field = Field::find($request->field_id);
      $courses = $field->courses()->where('term', '=', $request->term)->paginate(9);
    }

    $fields = Field::all();
    $field_id = $request->field_id;
    $term = $request->term;

    return view('site.skill-courses', compact('courses', 'fields', 'field_id', 'term'));
  }


  public function offer(){
    return view('site.offer');
  }

  public function offerInsert(Request $request){
    $suggest = Suggest::create([
      'user_id' => Auth::user()->id,
      'title' => $request->title,
    ]);

    return back()->with('msg', 1);
  }


  public function courseDetail($id){
    $course = Course::find($id);
    return view('site.skill-course-detailes', compact('course'));
  }

  public function courseRegister($id){
    $user = Auth::user();
    $courses = $user->studentCourses;
    $course = Course::find($id);

    //check re register
    foreach ($courses as $item) {
      if($item->id == $course->id){
        return back()->with('fail', 'شما قبلا در این دوره ثبت نام کرده اید');
      }
    }

    //check deadline
    if (date('Y-m-d') > $course->deadline){
      return back()->with('fail', 'مهلت ثبت نام تمام شده است');
    }
    //check course capacity
    if ($course->students()->count() >= $course->capacity){
      return back()->with('fail', 'ظرفیت دوره پر شده است');
    }


    //check user and course field
    $fields = $course->fields;
    $is_exist = false;
    foreach ($fields as $field){
      if ($user->studentField->id == $field->id){
        $is_exist = true;
        break;
      }
    }

    if ($is_exist == false){
      return back()->with('fail', 'این دوره برای رشته شما ارائه نشده است');
    }


    //check gender
    if($user->is_male == 1 && $course->gender == 'female'){
      return back()->with('fail', 'این دوره برای خانم ها ارائه شده است');
    }elseif ($user->is_male == 0 && $course->gender == 'male'){
      return back()->with('fail', 'این دوره برای آقایان ارائه شده است');
    }


    //check prerequisites
    foreach ($course->prerequisites as $prerequisite) {
      $is_exist = false;
      foreach ($courses as $item){
        if ($item->id == $prerequisite->id){
          $is_exist = true;
          break;
        }
      }

      if ($is_exist == false){
        return back()->with('fail', 'شما پیشنیازهای این دوره را نگذرانده اید');
      }
    }

    $userCourse = StudentCourses::create([
      'student_id' => $user->id,
      'course_id' => $course->id,
      'has_certificate' => 0,
    ]);

    return back()->with('success', 'ثبت نام شما با موفقیت انجام شد');

  }

}
