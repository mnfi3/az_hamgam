<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Util\Sadad;
use App\IndustryPost;
use App\Order;
use App\StudentWorkshops;
use App\UserVisits;
use App\Util;
use App\VisitIndustry;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteGatheringController extends Controller
{

  public function __construct() {
    $this->middleware('auth', ['only' => ['workshopRegister', 'industryRegister']]);
    $this->middleware('student', ['only' => ['workshopRegister']]);
  }

  public function gathering(){
    $gathering = '';
    $invite = '';
    $invite_image = '';
    $visit = '';
    $visit_image = '';
    $workshop = '';
    $workshop_image = '';
    $util = Util::get(Util::KEY_GATHERING);
    if($util != null){
      $gathering = $util->description;
    }
    $util = Util::get(Util::KEY_GATHERING_INDUSTRY_INVITE);
    if($util != null) {
      $invite = $util->description;
      $invite_image = $util->image;
    }
    $util = Util::get(Util::KEY_GATHERING_INDUSTRY_VISIT);
    if($util != null) {
      $visit = $util->description;
      $visit_image = $util->image;
    }
    $util = Util::get(Util::KEY_GATHERING_WORKSHOP);
    if($util != null) {
      $workshop = $util->description;
      $workshop_image = $util->image;
    }

    return view('site.gathering',
      compact('gathering', 'invite', 'invite_image', 'visit', 'visit_image', 'workshop', 'workshop_image'));
  }


  public function workshop(){
    $workshops = Workshop::orderBy('id', 'desc')->paginate(9);
    return view('site.workshop', compact('workshops'));
  }

  public function workshopDetail($id){
    $workshop = Workshop::find($id);
    return view('site.gathering-workshop-detailes', compact('workshop'));
  }



  public function workshopRegister($id){
    $user = Auth::user();
    $user_workshops = $user->studentWorkshops;
    $workshop = Workshop::find($id);


    //check re register
    foreach ($user_workshops as $item) {
      if($item->id == $workshop->id){
        return back()->with('fail', 'شما قبلا در این کارگاه ثبت نام کرده اید');
      }
    }

    //check deadline
    if (date('Y-m-d') > $workshop->time){
      return back()->with('fail', 'مهلت ثبت نام تمام شده است');
    }
    //check workshop capacity
    if ($workshop->students()->count() >= $workshop->capacity){
      return back()->with('fail', 'ظرفیت کارگاه پر شده است');
    }






    //if price==0
    if ($workshop->price == 0){
      $student_workshop = StudentWorkshops::create([
        'student_id' => $user->id,
        'workshop_id' => $workshop->id,
        'has_certificate' => 0,
      ]);
      return back()->with('success', 'ثبت نام با موفقیت انجام شد');
    }


    $order = Order::create([
      'user_id' => $user->id,
      'orderable_id' => $workshop->id,
      'orderable_type' => 'App\Workshop',
      'amount' => $workshop->price,
    ]);

    $sadad = new Sadad(
      env('SADAD_MERCHANT_ID'),
      env('SADAD_TERMINAL_ID'),
      env('SADAD_TERMINAL_KEY'),
      env('SADAD_PAYMENT_IDENTITY')
    );

    $response = $sadad->request($order->amount, $order->id, url('/gathering/workshop/register/payment-verify'));

    if($response->ResCode != 0){
      $description = $response->Description;
      return view('site.paymentFailed', compact('description'));
    }else{
      return redirect($sadad->getRedirectUrl() . $response->Token);
    }

  }



  public function workshopRegisterVerify(){

  }


  public function industry() {
    $visits = VisitIndustry::orderBy('id', 'desc')->paginate(9);
    return view('site.industry-visit', compact('visits'));
  }

  public function industryDetail($id){
    $visit = VisitIndustry::find($id);
    return view('site.gathering-visit-detailes', compact('visit'));
  }

  public function industryRegister($id){
    $user = Auth::user();
    $visit = VisitIndustry::find($id);

    $user_visits = UserVisits::where('visit_industry_id', '=', $id)->get();
    foreach ($user_visits as $uv){
      if ($uv->user_id == $user->id){
        return back()->with('fail', 'شما قبلا ثبت نام کرده اید');
      }
    }

    if($visit->users()->count() >= $visit->capacity){
      return back()->with('fail', 'ظرفیت ثبت نام پر شده است');
    }

    $uv = UserVisits::create([
      'user_id' => $user->id,
      'visit_industry_id' => $visit->id,
    ]);

    return back()->with('success', 'ثبت نام با موفقیت انجام شد');

  }

  public function industryPosts(){
    $posts = IndustryPost::orderBy('id', 'desc')->paginate(4);
    return view('site.industry-posts', compact('posts'));
  }

  public function industryPost($id) {
    $post = IndustryPost::find($id);
    $image = $post->image;
    $description = $post->description;
    $file = $post->file;
    return view('site.content', compact('image', 'description', 'file'));
  }
}
