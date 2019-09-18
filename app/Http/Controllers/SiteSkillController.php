<?php

namespace App\Http\Controllers;

use App\Course;
use App\Field;
use App\Http\Controllers\Util\Sadad;
use App\Order;
use App\Payment;
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


    if($course->price == 0) {
      $userCourse = StudentCourses::create([
        'student_id' => $user->id,
        'course_id' => $course->id,
        'has_certificate' => 0,
      ]);

      return back()->with('success', 'ثبت نام شما با موفقیت انجام شد');
    }

    //payment tasks
    $order = Order::create([
      'user_id' => $user->id,
      'orderable_id' => $course->id,
      'orderable_type' => 'App\Course',
      'amount' => (int)($course->price * 10),
    ]);

    $sadad = new Sadad(
      env('SADAD_MERCHANT_ID'),
      env('SADAD_TERMINAL_ID'),
      env('SADAD_TERMINAL_KEY'),
      env('SADAD_PAYMENT_IDENTITY')
    );

    $response = $sadad->request($order->amount, $order->id, url('/skill-learning/course/register/payment-verify'));
    if($response->ResCode != 0){
      $description = $response->Description;
      return view('site.paymentFailed', compact('description'));
    }else{
      return redirect($sadad->getRedirectUrl() . $response->Token);
    }

  }


  public function courseRegisterVerify(Request $request){
    $order_id = $request->OrderId;
    $token = $request->token;
    $pay_res_code = $request->ResCode;

    $order = Order::find($order_id);

    if ($pay_res_code != 0){
      $description = 'تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد';
      return view('user.paymentFailed', compact('description'));
    }


    $sadad = new Sadad(
      env('SADAD_MERCHANT_ID'),
      env('SADAD_TERMINAL_ID'),
      env('SADAD_TERMINAL_KEY'),
      env('SADAD_PAYMENT_IDENTITY')
    );

    $verify_response = $sadad->verify($token);
    $res_code = $verify_response->ResCode;

    if($pay_res_code == 0 && $res_code == 0){
      //success

      $amount = $verify_response->Amount;
      $description = $verify_response->Description;
      $retrival_ref_no = $verify_response->RetrivalRefNo;
      $system_trace_no = $verify_response->SystemTraceNo;
      $order_id = $verify_response->OrderId;

      $user_course = StudentCourses::create([
        'student_id' => $order->user_id,
        'course_id' => $order->orderable_id,
        'has_certificate' => 0,
      ]);

      $payment = Payment::create([
        'user_id' => $order->user_id,
        'paymentable_id' => $order->orderable_id,
        'paymentable_type' => 'App\Course',
        'amount' => (int)(($order->amount)/10),
        'retrival_ref_no' => $retrival_ref_no,
        'system_trace_no' => $system_trace_no,
      ]);

      return view('user.paymentSuccess', compact(['description', 'retrival_ref_no', 'system_trace_no', 'amount']));

    }else{
      //failed
      $description = 'تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد';
      return view('user.paymentFailed', compact('description'));
    }
  }

}
