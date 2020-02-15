<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Http\Controllers\Util\Sadad;
use App\Order;
use App\Payment;
use App\StudentFestivals;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteIdeaController extends Controller
{


  public function __construct() {
    $this->middleware('auth', ['only' => ['festivalRegister']]);
    $this->middleware('student', ['only' => ['festivalRegister']]);
  }

  public function idea(){
    $idea = '';
    $supprot = '';
    $support_image = '';
    $startup = '';
    $startup_image = '';
    $festivals = '';
    $festivals_image = '';

    $util = Util::get(Util::KEY_IDEA);
    if ($util != null){
      $idea = $util->description;
    }
    $util = Util::get(Util::KEY_IDEA_SUPPROT);
    if ($util != null){
      $supprot = $util->description;
      $support_image = $util->image;
    }
    $util = Util::get(Util::KEY_IDEA_STARTUP);
    if ($util != null){
      $startup = $util->description;
      $startup_image = $util->image;
    }

    $util = Util::get(Util::KEY_IDEA_FESTIVALS);
    if ($util != null){
      $festivals = $util->description;
      $festivals_image = $util->image;
    }

    return view('site.idea', compact('idea', 'supprot', 'support_image', 'startup', 'startup_image', 'festivals', 'festivals_image'));
  }


  public function support(){
    $description = '';
    $image = '';
    $file = '';
    $util = Util::get(Util::KEY_IDEA_SUPPROT);
    if ($util != null){
      $description = $util->description;
      $image = $util->image;
      $file = $util->file;
    }
    return view('site.content', compact('description', 'image', 'file'));
  }

  public function startup(){
    $description = '';
    $image = '';
    $file = '';
    $util = Util::get(Util::KEY_IDEA_STARTUP);
    if ($util != null){
      $description = $util->description;
      $image = $util->image;
      $file = $util->file;
    }
    return view('site.content', compact('description', 'image', 'file'));
  }



  public function festivals(){
    $festivals = Festival::orderBy('id', 'desc')->paginate(9);
    return view('site.festivals', compact('festivals'));
  }

  public function festival($id){
    $festival = Festival::find($id);
    return view('site.festival-details', compact('festival'));
  }

  public function festivalRegister($id){
    $user = Auth::user();
    $user_festivals = $user->studentFestivals;
    $festival = Festival::find($id);
    if($festival->is_cash_pay == 1) return back();


    //check re register
    foreach ($user_festivals as $item) {
      if($item->id == $festival->id){
        return back()->with('fail', 'شما قبلا در این جشنواره ثبت نام کرده اید');
      }
    }

    //check deadline
    if (date('Y-m-d') > $festival->date){
      return back()->with('fail', 'مهلت ثبت نام تمام شده است');
    }

    //if price==0
    if ($festival->price == 0){
      $student_festival = StudentFestivals::create([
        'student_id' => $user->id,
        'festival_id' => $festival->id,
        'file' => '',
      ]);
      return back()->with('success', 'ثبت نام با موفقیت انجام شد.لطفا در صورت نیاز به ارسال فایل به جشنواره از طریق پنل خود اقدام نمایید');
    }


    //payment tasks
    $order = Order::create([
      'user_id' => $user->id,
      'orderable_id' => $festival->id,
      'orderable_type' => 'App\Festival',
      'amount' => (int)($festival->price * 10),
    ]);

    $sadad = new Sadad(
      env('SADAD_MERCHANT_ID'),
      env('SADAD_TERMINAL_ID'),
      env('SADAD_TERMINAL_KEY'),
      env('SADAD_PAYMENT_IDENTITY')
    );

    $response = $sadad->request($order->amount, $order->id, url('/idea/festival-register/payment-verify'));

    if($response->ResCode != 0){
      $description = $response->Description;
      return view('site.paymentFailed', compact('description'));
    }else{
      return redirect($sadad->getRedirectUrl() . $response->Token);
    }


  }

  public function festivalPaymentVerify(Request $request){
    $order_id = $request->OrderId;
    $token = $request->token;
    $pay_res_code = $request->ResCode;

    $order = Order::find($order_id);

    if ($pay_res_code != 0){
      $description = 'تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد';
      return view('site.paymentFailed', compact('description'));
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
      $description = $verify_response->Description . "." . 'لطفا در صورت نیاز به ارسال فایل به جشنواره از طریق پنل خود اقدام نمایید';
      $retrival_ref_no = $verify_response->RetrivalRefNo;
      $system_trace_no = $verify_response->SystemTraceNo;
      $order_id = $verify_response->OrderId;

      $st_f = StudentFestivals::where('student_id', '=', $order->user_id)->where('festival_id', '=' , $order->orderable_id)->firset();
      if ($st_f != null) return view('site.paymentSuccess', compact(['description', 'retrival_ref_no', 'system_trace_no', 'amount']));

      $user_festival = StudentFestivals::create([
        'student_id' => $order->user_id,
        'festival_id' => $order->orderable_id,
        'file' => '',
      ]);

      $payment = Payment::create([
        'user_id' => $order->user_id,
        'paymentable_id' => $order->orderable_id,
        'paymentable_type' => 'App\Festival',
        'amount' => (int)(($order->amount)/10),
        'retrival_ref_no' => $retrival_ref_no,
        'system_trace_no' => $system_trace_no,
      ]);

      return view('site.paymentSuccess', compact(['description', 'retrival_ref_no', 'system_trace_no', 'amount']));

    }else{
      //failed
      $description = 'تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد';
      return view('site.paymentFailed', compact('description'));
    }
  }


}
