<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    $master = User::find($id);
    return view('admin.users.master-detailes', compact('master'));
  }

  public function masterAdd(Request $request){
    $master = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'is_male' => $request->is_male,
      'mobile' => $request->mobile,
      'national_code' => $request->national_code,
      'role' => 'master',
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    return back();
  }


  public function consult(){
    $consultants = User::where('role', '=', 'consultant')->orderBy('id', 'desc')->get();
    return view('admin.users.consult', compact('consultants'));
  }

  public function consultAdd(Request $request){
    $consultant = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'is_male' => $request->is_male,
      'mobile' => $request->mobile,
      'national_code' => $request->national_code,
      'role' => 'consultant',
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    return back();
  }

  public function forums(){
    $forums = User::where('role', '=', 'forum')->orderBy('id', 'desc')->get();
    return view('admin.users.forums', compact('forums'));
  }

  public function forumAdd(Request $request){
    $consultant = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'is_male' => $request->is_male,
      'mobile' => $request->mobile,
      'national_code' => $request->national_code,
      'role' => 'forum',
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    return back();
  }
}
