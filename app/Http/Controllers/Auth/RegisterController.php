<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $valid_list = ["1" => [
            'chinese_name' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'integer', 'in:1,2'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'number_home' => ['string', 'max:255'],
            'number_cellphone' => ['required', 'string', 'max:255'],
            'serve_area' => ['required', 'string', 'max:255'],
            'serve_experience' => ['required', 'integer', 'max:100'],
            'other' => ['string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        "2" => [
            'chinese_name' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'integer', 'in:1,2'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'number_home' => ['string', 'max:255'],
            'number_cellphone' => ['required', 'string', 'max:255'],
            'other' => ['string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]];
        return Validator::make($data, $valid_list[$data['role']]);

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
            'role'=> $data['role'],
            'chinese_name' => $data['chinese_name'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'number_home' => $data['number_home'] ?? null,
            'number_cellphone' => $data['number_cellphone'],
            'serve_area' => $data['serve_area'] ?? null,
            'serve_experience' => $data['serve_experience'] ?? null,
            'other' => $data['other'] ?? null,
            'password' => Hash::make($data['password']),
        ]);
    }
}
