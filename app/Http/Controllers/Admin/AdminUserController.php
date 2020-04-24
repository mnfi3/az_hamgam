<?php

namespace App\Http\Controllers\Admin;

use App\CounselorReport;
use App\Course;
use App\FreeCourse;
use App\User;
use App\Util;
use App\Workshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function students(Request $request) {
    if (strlen($request->national_code) > 0 && strlen($request->name) > 0) {
      $students = User::where('role', '=', 'student')->where('national_code', '=', $request->national_code);
      $students = $students->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30000);
    } elseif (strlen($request->national_code) > 0) {
      $students = User::where('role', '=', 'student')->where('national_code', '=', $request->national_code)->paginate(30000);
    } elseif (strlen($request->name) > 0) {
      $students = User::where('role', '=', 'student')->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30000);
    } else {
      $students = User::where('role', '=', 'student')->paginate(30000);
    }
    $national = $request->national_code;
    $name = $request->name;
    Session::put('national_code', $national);
    Session::put('name', $name);

    return view('admin.users.student', compact('students'));
  }

  public function studentDetail($id) {
    $student = User::find($id);
    return view('admin.users.student-detailes', compact('student'));
  }

  public function masters(Request $request) {
    if (strlen($request->national_code) > 0 && strlen($request->name) > 0) {
      $masters = User::where('role', '=', 'master')->where('national_code', '=', $request->national_code);
      $masters = $masters->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30);
    } elseif (strlen($request->national_code) > 0) {
      $masters = User::where('role', '=', 'master')->where('national_code', '=', $request->national_code)->paginate(30);
    } elseif (strlen($request->name) > 0) {
      $masters = User::where('role', '=', 'master')->where('first_name', 'like', $request->name)->orWhere('last_name', 'like', $request->name)->paginate(30);
    } else {
      $masters = User::where('role', '=', 'master')->paginate(30);
    }


    $national = $request->national_code;
    $name = $request->name;
    Session::put('national_code', $national);
    Session::put('name', $name);
    return view('admin.users.master', compact('masters'));
  }

  public function masterRemove(Request $request){
    $user = User::find($request->id);
    $user->delete();
    return back();
  }

  public function masterDetail($id) {
    $master = User::find($id);
    return view('admin.users.master-detailes', compact('master'));
  }

  public function masterAdd(Request $request) {
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


  public function consult() {
    $consultants = User::where('role', '=', 'consultant')->orderBy('id', 'desc')->get();
    return view('admin.users.consult', compact('consultants'));
  }

  public function consultAdd(Request $request) {
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

  public function consultRemove(Request $request){
    $user = User::find($request->id);
    $user->delete();
    return back();
  }

  public function forums() {
    $forums = User::where('role', '=', 'forum')->orderBy('id', 'desc')->get();
    return view('admin.users.forums', compact('forums'));
  }

  public function forumAdd(Request $request) {
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


  public function industries() {
    $industries = User::where('role', '=', 'industry')->orderBy('id', 'desc')->get();
    return view('admin.users.industry', compact('industries'));
  }

  public function industryAdd(Request $request){
    $industry = User::create([
      'first_name' => $request->name,
      'last_name' => '',
      'is_male' => '1',
      'mobile' => $request->mobile,
      'national_code' => '',
      'role' => 'industry',
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    return back();
  }


  public function printCourseCert($studnet_id, $course_id){
    $user = User::find($studnet_id);
    $course = Course::find($course_id);
    $authority1 = Util::get(Util::KEY_MANAGER_INDUSTRY)->description;
    $authority2 = Util::get(Util::KEY_MANAGER_RESEARCH)->description;
    return view('admin.users.certificate-print', compact('user', 'course', 'authority1', 'authority2'));
  }

  public function printWorkshopCert($studnet_id, $workshop_id){
    $user = User::find($studnet_id);
    $course = Workshop::find($workshop_id);
    $authority1 = Util::get(Util::KEY_MANAGER_INDUSTRY)->description;
    $authority2 = Util::get(Util::KEY_MANAGER_RESEARCH)->description;
    return view('admin.users.certificate-print', compact('user', 'course', 'authority1', 'authority2'));
  }

  public function printFreeCourseCert($studnet_id, $free_course_id){
    $user = User::find($studnet_id);
    $course = FreeCourse::find($free_course_id);
    $authority1 = Util::get(Util::KEY_MANAGER_INDUSTRY)->description;
    $authority2 = Util::get(Util::KEY_MANAGER_RESEARCH)->description;
    return view('admin.users.certificate-print', compact('user', 'course', 'authority1', 'authority2'));
  }


  public function counselorReports(){
    $reports = CounselorReport::orderBy('id', 'desc')->paginate(200);
    return view('admin.performance-report', compact('reports'));
  }

  public function counselorReportPrint($id){
    $report = CounselorReport::find($id);
    return view('admin.report-print', compact('report'));
  }
}
