<?php

namespace App\Http\Controllers;

use App\GraduatesEmployed;
use App\Startup;
use App\Util;
use Illuminate\Http\Request;

class SiteSuccessController extends Controller
{


  public function success(){
    $success = '';
    $startup = '';
    $startup_image = '';
    $graduation = '';
    $graduation_image = '';
    $util = Util::get(Util::KEY_SUCCESS);
    if ($util != null){
      $success = $util->description;
    }
    $util = Util::get(Util::KEY_SUCCESS_STARTUP);
    if ($util != null){
      $startup = $util->description;
      $startup_image = $util->image;
    }
    $util = Util::get(Util::KEY_SUCCESS_GRADUATION);
    if ($util != null){
      $graduation = $util->description;
      $graduation_image = $util->image;
    }
    return view('site.success', compact('success', 'startup', 'startup_image', 'graduation', 'graduation_image'));
  }



  public function graduation(){
    $mans = GraduatesEmployed::orderBy('id', 'desc')->paginate(9);
    return view('site.graduation-job', compact('mans'));
  }


  public function startup(){
    $startups = Startup::orderBy('id', 'desc')->paginate(9);
    return view('site.university-startups', compact('startups'));
  }
}
