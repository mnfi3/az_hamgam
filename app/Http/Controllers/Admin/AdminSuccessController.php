<?php

namespace App\Http\Controllers\Admin;

use App\GraduatesEmployed;
use App\Http\Controllers\Util\Uploader;
use App\Startup;
use App\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSuccessController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }


  public function success(){
    $util = Util::get(Util::KEY_SUCCESS);
    return view('admin.success', compact('util'));
  }

  public function successUpdate(Request $request){
    $util = Util::get(Util::KEY_SUCCESS);
    $util->description = $request->description;
    $util->save();
    return back();
  }

  public function graduationJobs(){
    $util = Util::get(Util::KEY_SUCCESS_GRADUATION);
    $persons = GraduatesEmployed::orderBy('id', 'desc')->get();
    return view('admin.graduation-job', compact('util', 'persons'));
  }

  public function graduationJobsUpdate(Request $request){
    $util = Util::get(Util::KEY_SUCCESS_GRADUATION);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));;
    $util->save();
    return back();
  }

  public function graduationJobsRemove($id){
    $person = GraduatesEmployed::find($id);
    $person->delete();
    return back();
  }

  public function graduationJobsAdd(Request $request){
    $person = GraduatesEmployed::create([
      'name' => $request->name,
      'field' => $request->field,
      'job' => $request->job,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
    ]);

    return back();
  }

  public function startups(){
    $util = Util::get(Util::KEY_SUCCESS_STARTUP);
    $startups = Startup::orderBy('id', 'desc')->get();
    return view('admin.uni-startups', compact('util', 'startups'));
  }

  public function startupsUpdate(Request $request){
    $util = Util::get(Util::KEY_SUCCESS_STARTUP);
    $util->description = $request->description;
    $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function startupAdd(Request $request){
    $startup = Startup::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
      'field' => $request->field,
      'place' => $request->place,
      'boss' => $request->boss,
    ]);
    return back();
  }

  public function startupRemove($id){
    $startup = Startup::find($id);
    $startup->delete();
    return back();
  }
}
