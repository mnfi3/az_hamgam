<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = Auth::user();
      if ($user->role == 'student'){
        return redirect(url('/student/student'));
      }elseif ($user->role == 'admin'){
        return redirect(url('/admin/admin'));
      }elseif ($user->role == 'master'){
        return redirect(url('/master/master'));
      }elseif ($user->role == 'consultant'){

      }elseif ($user->role == 'forum'){

      }
//        return view('home');
    }
}
