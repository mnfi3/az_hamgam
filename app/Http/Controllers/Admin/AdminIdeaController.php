<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Util\Uploader;
use App\Idea;
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
}
