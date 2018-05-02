<?php

namespace App\Http\Controllers\Auth;

use App\Database\users;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:64',
            'email' => 'required|string|email|max:48|unique:users',
            'password' => 'required|string|min:6|max:64|confirmed',
            'admin' => 'required|boolean',
//            'address' => 'required|string|min:6|max:64',
//            'cp' => 'required|string|min:3|max:16',
//            'fk_ciudades' => 'required||unique:ciudades,id',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        info($data);
        return \App\Database\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'admin' => intval($data['admin']),
//            'address' => $data['address'],
//            'cp' => $data['cp'],
//            'fk_ciudades' => intval($data['fk_ciudades']),
        ]);
    }
}
