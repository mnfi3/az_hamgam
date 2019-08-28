<?php

namespace App\Http\Controllers;

use App\Util;
use App\VisitIndustry;
use App\Workshop;
use Illuminate\Http\Request;

class SiteGatheringController extends Controller
{
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

  public function industry() {
    $visits = VisitIndustry::orderBy('id', 'desc')->paginate(9);
    return view('site.industry-visit', compact('visits'));
  }
}
