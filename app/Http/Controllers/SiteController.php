<?php

namespace App\Http\Controllers;

use App\Course;
use App\Field;
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
    $fields_count = Field::count();
    $students_count = User::where('role', '=', 'student')->count();
    $masters_count = User::where('role', '=', 'master')->count();
    $ideas_count = Idea::count();
    $courses_count = Course::count();
    $workshops_count = Workshop::count();
    $startups_count = Startup::count();
    $visits_count = VisitIndustry::count();
    $questions = FrequentlyQuestion::all();
    $about = '';
    $util = Util::where('key', '=', Util::KEY_ABOUT)->orderBy('id', 'desc')->first();
    if(!is_null($util)) $about = $util->description;
    return view('index',
      compact('posts', 'sliders', 'students_count', 'masters_count', 'fields_count', 'ideas_count', 'courses_count', 'workshops_count', 'startups_count', 'visits_count', 'questions', 'about'));
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
