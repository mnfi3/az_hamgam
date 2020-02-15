<?php

namespace App\Http\Controllers\Admin;

use App\Festival;
use App\Http\Controllers\Util\PDate;
use App\Http\Controllers\Util\PNum;
use App\Http\Controllers\Util\Uploader;
use App\Idea;
use App\Payment;
use App\StudentFestivals;
use App\User;
use App\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminIdeaController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function idea(){
    $util = Util::get(Util::KEY_IDEA);
    return view('admin.idea', compact('util'));
  }

  public function ideaUpdate(Request $request){
    $util = Util::get(Util::KEY_IDEA);
    $util->description = $request->description;
    if ($request->hasFile('image')){
      $util->image = Uploader::image($request->file('image'));
    }
    $util->save();
    return back();
  }

  public function ideaSupport(){
    $util = Util::get(Util::KEY_IDEA_SUPPROT);
    $ideas = Idea::orderBy('id', 'desc')->get();
    return view('admin.idea-support', compact('util', 'ideas'));
  }

  public function ideaSupportUpdate(Request $request){
    $util = Util::get(Util::KEY_IDEA_SUPPROT);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function ideaSupportAnswer(Request $request){
    $idea = Idea::find($request->idea_id);
    $idea->answer = $request->answer;
    $idea->save();
    return back();
  }

  public function startup(){
    $util = Util::get(Util::KEY_IDEA_STARTUP);
    return view('admin.startup', compact('util'));
  }

  public function startupUpdate(Request $request){
    $util = Util::get(Util::KEY_IDEA_STARTUP);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    if($request->hasFile('file')) $util->file = Uploader::file($request->file('file'));
    $util->save();
    return back();
  }



  public function ideaFestivalsUpdate(Request $request){
    $util = Util::get(Util::KEY_IDEA_FESTIVALS);
    $util->description = $request->description;
    if ($request->hasFile('image')){
      $util->image = Uploader::image($request->file('image'));
    }
    $util->save();
    return back();
  }

  public function ideaFestivalAddStudnet(Request $request){
    $user = User::orderBy('id', 'desc')->where('national_code', '=', $request->national_code)->where('role', '=', 'student')->first();
    $id = $request->id;
    if($user == null) return back()->with('mess', 'کد ملی وارد شده اشتباه است');

    $user_festivals = $user->studentFestivals;
    $festival = Festival::find($id);


    //check re register
    foreach ($user_festivals as $item) {
      if($item->id == $festival->id){
        return back()->with('mess', 'این دانشجو قبلا در این جشنواره ثبت نام کرده است');
      }
    }

    //check deadline
    if (date('Y-m-d') > $festival->date){
      return back()->with('mess', 'مهلت ثبت نام تمام شده است');
    }

    $student_festival = StudentFestivals::create([
      'student_id' => $user->id,
      'festival_id' => $festival->id,
      'file' => '',
    ]);

    //if price>0
    if ($festival->price > 0){
      $payment = Payment::create([
        'user_id' => $user->id,
        'paymentable_id' => $festival->id,
        'paymentable_type' => 'App\Festival',
        'amount' => $festival->price,
        'retrival_ref_no' => 'cash payment',
        'system_trace_no' => 'cash payment',
      ]);
    }

    $name = $user->first_name . ' ' . $user->last_name;
    return back()->with('mess', " ثبت نام با موفقیت انجام شد. $name با موفقیت در این جشنواره ثبت شد");
  }


  public function festivals(){
    $festivals = Festival::orderBy('id', 'desc')->get();
    $util = Util::get(Util::KEY_IDEA_FESTIVALS);
    return view('admin.festivals', compact('festivals', 'util'));
  }

  public function festivalDetail($id){
    $festival = Festival::find($id);
    return view('admin.festival-details', compact('festival'));
  }


  public function festivalAdd(Request $request){
    $image = '';
    $file = '';
    $d = new PDate();
    if($request->hasFile('image')) $image = Uploader::image($request->file('image'));
    if($request->hasFile('file')) $file = Uploader::file($request->file('file'));
    $festival = Festival::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => $image,
      'file' => $file,
      'date' => $d->toGregorian(PNum::toLatin($request->date)),
      'hour' => $request->hour,
      'price' => $request->price,
      'is_cash_pay' => $request->is_cash_pay,
    ]);
    return back();
  }


  public function festivalRemove($id){
    $festival = Festival::find($id);
    $festival->delete();
    return back();
  }

  public function festivalUpdate(Request $request){
    $festival = Festival::find($request->id);
    $d = new PDate();

    $festival->title = $request->title;
    $festival->description = $request->description;
    if($request->hasFile('image')) $festival->image = Uploader::image($request->file('image'));
    if($request->hasFile('file')) $festival->file = Uploader::file($request->file('file'));
    $festival->date = $d->toGregorian(PNum::toLatin($request->date));
    $festival->hour = $request->hour;
    $festival->price = $request->price;
    $festival->is_cash_pay = $request->is_cash_pay;
    $festival->save();
    return back();
  }


}
