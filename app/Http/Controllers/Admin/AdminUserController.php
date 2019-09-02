<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function students(Request $request){
    if(strlen($request->national_code) > 0 && strlen($request->name) > 0){
      $students = User::where('role', '=', 'student')->where('national_code', '=', $request->national_code);
      $students = $students->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30);
    }elseif (strlen($request->national_code) > 0 ){
      $students = User::where('role', '=', 'student')->where('national_code', '=', $request->national_code)->paginate(30);
    }elseif (strlen($request->name) > 0 ){
      $students = User::where('role', '=', 'student')->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30);
    }else {
      $students = User::where('role', '=', 'student')->paginate(30);
    }
    $national = $request->national_code;
    $name = $request->name;
    Session::put('national_code', $national);
    Session::put('name', $name);

    return view('admin.users.student', compact('students'));
  }

  public function studentDetail($id){
    $student = User::find($id);
    return view('admin.users.student-detailes', compact('student'));
  }

  public function masters(Request $request){
    if(strlen($request->national_code) > 0 && strlen($request->name) > 0){
      $masters = User::where('role', '=', 'master')->where('national_code', '=', $request->national_code);
      $masters = $masters->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30);
    }elseif (strlen($request->national_code) > 0 ){
      $masters = User::where('role', '=', 'master')->where('national_code', '=', $request->national_code)->paginate(30);
    }elseif (strlen($request->name) > 0 ){
      $masters = User::where('role', '=', 'master')->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30);
    }else {
      $masters = User::where('role', '=', 'master')->paginate(30);
    }


    $national = $request->national_code;
    $name = $request->name;
    Session::put('national_code', $national);
    Session::put('name', $name);
    return view('admin.users.master', compact('masters'));
  }

  public function masterDetail($id){
    $master = User::find(id);
    return view('admin.users.master-detailes', compact('master'));
  }

  public function masterAdd(Request $request){

  }
}
