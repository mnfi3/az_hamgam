<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Util\PDate;
use App\Http\Controllers\Util\PNum;
use App\Http\Controllers\Util\Uploader;
use App\IndustryPost;
use App\StudentWorkshops;
use App\User;
use App\Util;
use App\VisitIndustry;
use App\Workshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGatheringController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }


  public function gathering(){
    $util = Util::get(Util::KEY_GATHERING);
    return view('admin.gathering', compact('util'));
  }

  public function gatheringUpdate(Request $request){
    $util = Util::get(Util::KEY_GATHERING);
    $util->description = $request->description;
    $util->save();
    return back();
  }

  public function workshops(){
    $util = Util::get(Util::KEY_GATHERING_WORKSHOP);
    $workshops = Workshop::orderBy('id', 'desc')->get();
    $masters = User::where('role', '=', 'master')->orderBy('id', 'desc')->get();
    return view('admin.workshop', compact('util', 'workshops', 'masters'));
  }

  public function workshopsUpdate(Request $request){
    $util = Util::get(Util::KEY_GATHERING_WORKSHOP);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function workshopRemove($id){
    $workshop = Workshop::find($id);
    $workshop->delete();
    return back();
  }

  public function workshopAdd(Request $request){
    $d = new PDate();
    $workshp = Workshop::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
      'master_id' => $request->master_id,
      'capacity' => $request->capacity,
      'price' => $request->price,
      'time' => $d->toGregorian(PNum::toLatin($request->time)),
      'hour' => $request->hour,
      'deadline' => $d->toGregorian(PNum::toLatin($request->time)),
      'duration' => $request->duration,
    ]);
    return back();
  }

  public function workshopDetail($id){
    $workshop = Workshop::find($id);
    $masters = User::where('role', '=', 'master')->orderBy('id', 'desc')->get();
    $st_workshops = StudentWorkshops::where('workshop_id', '=', $id)->get();
    return view('admin.workshop-detailes', compact('workshop', 'masters', 'st_workshops'));
  }

  public function workshopEdit(Request $request){
    $workshop = Workshop::find($request->id);
    $d = new PDate();
    $workshop->title = $request->title;
    $workshop->description = $request->description;
    if($request->hasFile('image')) $workshop->image = Uploader::image($request->file('image'));
    $workshop->master_id = $request->master_id;
    $workshop->capacity = $request->capacity;
    $workshop->price = $request->price;
    $workshop->time = $d->toGregorian(PNum::toLatin($request->time));
    $workshop->hour = $request->hour;
    $workshop->deadline = $d->toGregorian(PNum::toLatin($request->time));
    $workshop->duration = $request->duration;
    $workshop->save();

    return back();
  }

  public function workshopSendCert(Request $request) {
    $certs = $request->certs;
    if ($certs == null){
      $st_workshops = StudentWorkshops::where('workshop_id', '=', $request->workshop_id)->get();
      foreach ($st_workshops as $stw){
        $stw->has_certificate = 0;
        $stw->save();
      }
      return back();
    }

    $st_workshops = StudentWorkshops::where('workshop_id', '=', $request->workshop_id)->get();
    foreach ($st_workshops as $stw){
      $is_find = false;
      foreach ($certs as $id){
        if($stw->student_id == $id){
          $is_find = true;
          $stw->has_certificate = 1;
          $stw->save();
          break;
        }
      }

      if ($is_find == false)  {
        $stw->has_certificate = 0;
        $stw->save();
      }

    }

    return back();
  }


  public function visitIndustry(){
    $util = Util::get(Util::KEY_GATHERING_INDUSTRY_VISIT);
    $visits = VisitIndustry::orderBy('id', 'desc')->get();
    return view('admin.visit-industries', compact('util', 'visits'));
  }

  public function visitIndustryUpdate(Request $request){
    $util = Util::get(Util::KEY_GATHERING_INDUSTRY_VISIT);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function visitIndustryRemove($id){
    $visit = VisitIndustry::find($id);
    $visit->delete();
    return back();
  }

  public function visitIndustryAdd(Request $request){
    $d = new PDate();
    $visit = VisitIndustry::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
      'time_place' => $request->time_place,
      'capacity' => $request->capacity,
      'deadline' => $d->toGregorian(PNum::toLatin($request->deadline)),
    ]);
    return back();
  }

  public function visitIndustryDetail($id){
    $visit = VisitIndustry::find($id);
    return view('admin.visit-details', compact('visit'));
  }

  public function visitIndustryEdit(Request $request){
    $visit = VisitIndustry::find($request->id);
    $d = new PDate();
    $visit->title = $request->title;
    $visit->description = $request->description;
    $visit->time_place = $request->time_place;
    $visit->capacity = $request->capacity;
    $visit->deadline = $d->toGregorian(PNum::toLatin($request->deadline));
    if($request->hasFile('image')) $visit->image = Uploader::image($request->file('image'));
    $visit->save();
    return back();
  }


  public function industryPost(){
    $util = Util::get(Util::KEY_GATHERING_INDUSTRY_INVITE);
    $posts = IndustryPost::orderBy('id', 'desc')->get();
    return view('admin.invite-industries', compact('posts', 'util'));
  }

  public function industryPostAdd(Request $request){
    $file = '';
    if($request->hasFile('file')) $file = Uploader::file($request->file('file'));
    $post = IndustryPost::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => Uploader::image($request->file('image')),
      'file' => $file,
    ]);

    return back();
  }


  public function inviteIndustryUpdate(Request $request){
    $util = Util::get(Util::KEY_GATHERING_INDUSTRY_INVITE);
    $util->description = $request->description;
    if($request->hasFile('image')) $util->image = Uploader::image($request->file('image'));
    $util->save();
    return back();
  }

  public function industryPostRemove($id){
    $post = IndustryPost::find($id);
    $post->delete();
    return back();
  }



}
