<?php

namespace App\Http\Controllers\Admin;

use App\FrequentlyQuestion;
use App\Http\Controllers\Util\Uploader;
use App\Message;
use App\Slider;
use App\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSiteController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }


  public function admin(){
    $sliders = Slider::all();
    return view('admin.admin', compact('sliders'));
  }

  public function sliderRemove($id){
    $slider = Slider::find($id);
    $slider->delete();
    return back();
  }

  public function sliderAdd(Request $request){
    $path = Uploader::image($request->file('image'));
    $slider = Slider::create([
      'title' => $request->title,
      'link' => $request->link,
      'image' => $path,
    ]);

    return back();
  }

  public function about(){
    $about = Util::get(Util::KEY_ABOUT)->description;
    return view('admin.about-hamgam', compact('about'));
  }

  public function aboutAdd(Request $request){
    $about = Util::get(Util::KEY_ABOUT);
    $about->key = Util::KEY_ABOUT;
    $about->description = $request->description;
    $about->save();
    return back();
  }

  public function questions(){
    $questions = FrequentlyQuestion::all();
    return view('admin.question', compact('questions'));
  }

  public function questionAdd(Request $request){
    $question = FrequentlyQuestion::create([
      'question' => $request->question,
      'answer' => $request->answer,
    ]);

    return back();
  }

  public function questionRemove($id){
    $question = FrequentlyQuestion::find($id);
    $question->delete();
    return back();
  }

  public function connection(){
    $phone = Util::get(Util::KEY_PHONE);
    $address = Util::get(Util::KEY_ADDRESS);
    $email = Util::get(Util::KEY_EMAIL);
    $link1 = Util::get(Util::KEY_LINK1);
    $link2 = Util::get(Util::KEY_LINK2);
    $link3 = Util::get(Util::KEY_LINK3);
    $link4 = Util::get(Util::KEY_LINK4);
    return view('admin.connection', compact('phone', 'address', 'email', 'link1', 'link2', 'link3', 'link4'));
  }

  public function connectionUpdate(Request $request){
    $phone = Util::get(Util::KEY_PHONE);
    $address = Util::get(Util::KEY_ADDRESS);
    $email = Util::get(Util::KEY_EMAIL);
    $link1 = Util::get(Util::KEY_LINK1);
    $link2 = Util::get(Util::KEY_LINK2);
    $link3 = Util::get(Util::KEY_LINK3);
    $link4 = Util::get(Util::KEY_LINK4);
    $phone->key = Util::KEY_PHONE;
    $phone->description = $request->phone;
    $phone->save();
    $address->key = Util::KEY_ADDRESS;
    $address->description = $request->address;
    $address->save();
    $email->key = Util::KEY_EMAIL;
    $email->description = $request->email;
    $email->save();
    $link1->key = Util::KEY_LINK1;
    $link1->title = $request->title1;
    $link1->description = $request->link1;
    $link1->save();
    $link1->key = Util::KEY_LINK2;
    $link2->title = $request->title2;
    $link2->description = $request->link2;
    $link2->save();
    $link1->key = Util::KEY_LINK3;
    $link3->title = $request->title3;
    $link3->description = $request->link3;
    $link3->save();
    $link1->key = Util::KEY_LINK4;
    $link4->title = $request->title4;
    $link4->description = $request->link4;
    $link4->save();

    return back();
  }


  public function messages(){
    $messages = Message::where('is_deleted', '=', 0)->orderBy('id', 'desc')->paginate(10);
    return view('admin.inquery', compact('messages'));
  }

  public function messageDelete($id){
    $message = Message::find($id);
    $message->is_deleted = 1;
    $message->save();
    return back();
  }

  public function messageAnswer(Request $request){
    $message = Message::find($request->id);
    $message->answer = $request->answer;
    $message->save();
    return back();
  }

  public function managers(){
    $research_manager = Util::get(Util::KEY_MANAGER_RESEARCH)->description;
    $industry_manager = Util::get(Util::KEY_MANAGER_INDUSTRY)->description;
    return view('admin.managers', compact('industry_manager', 'research_manager'));
  }

  public function managersUpdate(Request $request){
    $util = Util::get(Util::KEY_MANAGER_RESEARCH);
    $util->description = $request->research_manager;
    $util->save();
    $util = Util::get(Util::KEY_MANAGER_INDUSTRY);
    $util->description = $request->industry_manager;
    $util->save();
    return back();
  }
}
