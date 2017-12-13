<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Sponsor;
use App\Preference;
use Session;
use App\Subscription_plan;


use App\Http\Controllers\sponsorController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/back_office';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|alpha_num|min:6|confirmed',
            'country' => 'required',
            'phone' => 'required|integer',
            'security_question' => 'required|max:25',
            'security_answer' => 'required|max:25',
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
        $sponsor_id = $data['sponsor_id'];

        if($sponsor_id != 1){

            $userData = User::where('id', $sponsor_id)->first();

            $subscription_plan = Subscription_plan::where('id', $userData->level)->first();
                            
            $total_ref = Sponsor::where('sponsor_id', $userData->id)
                        ->where('sponsor_level', $userData->level)
                        ->count();

           if($subscription_plan->max_ref <= $total_ref){
                $sponsor_id = (new sponsorController)->getSponsor();
                //$sponsor = User::where('id', $sponsor_id)->first();

                //Session::forget('referral'); // destroy session variable 'referral'
                //Session::put('referral', $sponsor); // set new session variable 'referral'

                //echo $subscription_plan->max_ref.$total_ref.$sponsor_id; die();
                //return redirect()->route('register');
            }
        }


        $rand = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 15);
        
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'ip' => \Request::ip(),
            'delete_date' => Carbon::now()->addDays(4),
            'country' =>$data['country'],
            'phone' =>$data['phone'],
            'security_question' => $data['security_question'],
            'security_answer' => $data['security_answer'],
            'avatar' => "avatar".rand(1,5).".png",
            'ref_id' => $rand,
        ]);

        $userId = $user->id;

        $sp = User::where('id', $sponsor_id)->first();
        
        Sponsor::create([
           'user_id' => $userId,
           'sponsor_id' => $sponsor_id,
           'next_sponsor_id' => $sponsor_id,
           'sponsor_level' => $sp->level,
        ]);

        Preference::create([
            'user_id' => $userId,
            'email' => 1,
            'phone' => 1,
            'skype' => 1,
        ]);
        
        return $user;
    }
}
