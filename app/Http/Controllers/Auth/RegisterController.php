<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255', ],
            'last_name' => ['required', 'string', 'max:255', ],
            'is_male' => ['required', 'numeric', 'max:1', 'min:0'],
            'mobile' => ['required', 'string', 'max:15', 'min:8'],
//            'student_number' => ['required', 'string', 'max:15', 'min:5'],
            'national_code' => ['required', 'string', 'max:15', ],
            'field_id' => ['required', 'numeric',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'is_male' => $data['is_male'],
            'mobile' => $data['mobile'],
            'student_number' => $data['student_number'],
            'national_code' => $data['national_code'],
            'field_id' => $data['field_id'],
            'is_male' => $data['is_male'],
            'role' => 'student',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
