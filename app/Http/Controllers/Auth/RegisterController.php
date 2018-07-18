<?php

namespace App\Http\Controllers\Auth;

use App\FinancialInformation;
use App\User;
use App\Http\Controllers\Controller;
use App\UserHistory;
use App\UserType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Carbon\Carbon;

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telephone' => 'required|string|max:13|unique:users',
            'address' => 'required|string|max:255',
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
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'telephone' => $data['telephone'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->user_histories()->create([
            'date' => Carbon::now()->toDateString(),
            'hour' => Carbon::now()->toTimeString(),
            'action' => 'Register',
        ]);

        $user->financial_information()->create([
            'bank_name' => 'Not assigned',
            'number_account' => 'Not assigned',
            'balance' => 0,
        ]);

        $user->user_types()->attach(UserType::where('name', 'user')->first());
        $user->notify(new \App\Notifications\UserCreate);

        return $user;
    }
}