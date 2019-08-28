<?php

namespace App\Http\Controllers;

use App\Util;
use Illuminate\Http\Request;

class SiteIdeaController extends Controller
{


  public function idea(){
    $idea = '';
    $supprot = '';
    $support_image = '';
    $startup = '';
    $startup_image = '';

    $util = Util::get(Util::KEY_IDEA);
    if ($util != null){
      $idea = $util->dscription;
    }
    $util = Util::get(Util::KEY_IDEA_SUPPROT);
    if ($util != null){
      $supprot = $util->dscription;
      $support_image = $util->image;
    }
    $util = Util::get(Util::KEY_IDEA_STARTUP);
    if ($util != null){
      $startup = $util->dscription;
      $startup_image = $util->image;
    }

    return view('site.idea', compact('idea', 'supprot', 'support_image', 'startup', 'startup_image'));
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
}
