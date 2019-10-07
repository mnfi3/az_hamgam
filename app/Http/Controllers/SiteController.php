<?php

namespace App\Http\Controllers;

use App\Course;
use App\Field;
use App\FreeCourse;
use App\FrequentlyQuestion;
use App\Idea;
use App\Message;
use App\Post;
use App\Slider;
use App\Startup;
use App\User;
use App\Util;
use App\VisitIndustry;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{

  public function index(){
    $sliders = Slider::orderBy('id', 'desc')->get();
    $posts = Post::orderBy('id', 'desc')->take(3)->get();
    $questions = FrequentlyQuestion::all();
    $about = Util::get(Util::KEY_ABOUT)->description;

    $now = date('Y-m-d H:i:s');
    $free_courses1 = FreeCourse::orderBy('id', 'desc')->where('deadline', '>', $now)->get();
    $courses1 = Course::orderBy('id', 'desc')->where('deadline', '>', $now)->get();
    $workshops1 = Workshop::orderBy('id', 'desc')->where('deadline', '>', $now)->get();

    $free_courses2 = FreeCourse::orderBy('id', 'desc')->where('deadline', '<', $now)->get();
    $courses2 = Course::orderBy('id', 'desc')->where('deadline', '<', $now)->get();
    $workshops2 = Workshop::orderBy('id', 'desc')->where('deadline', '<', $now)->get();
    return view('index',
      compact(
        'posts', 'sliders', 'questions', 'about', 'free_courses1', 'courses1', 'workshops1',
      'free_courses2', 'courses2', 'workshops2'));
  }

  public function questionAdd(Request $request){
    $user_id = 0;
    if($request->user() != null ) $user_id = $request->user()->id;
    $message = Message::create([
      'user_id' => $user_id,
      'name' => $request->name,
      'email' => $request->email,
      'question' => $request->message,
    ]);

    return back()->with('msg', 'پیام شما با موفقیت ارسال شد');
  }



  public function posts(){
    $posts = Post::orderBy('id', 'desc')->paginate(9);
    return view('site.news', compact('posts'));
  }

  public function post($id){
    $post = Post::find($id);
    $image = $post->image;
    $file = $post->file;
    $description = $post->description;
    return view('site.content', compact('image', 'file', 'description'));
  }
}
