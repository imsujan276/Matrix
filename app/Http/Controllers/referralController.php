<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Mail;

use App\User;
use App\Sponsor;

class referralController extends Controller
{
    public function getReferral($ref_id){

    	$sponsor = User::where('ref_id', $ref_id)->first();
    	Session::put('referral', $sponsor);
    	return Redirect::to('/');
    }

    public function getReferralToRegister($ref_id){

    	$sponsor = User::where('ref_id', $ref_id)->first();
    	Session::put('referral', $sponsor); //set session variable 'referral'
    	return Redirect::to('/register');
    }

    public function getMyReferrals(){
        $ref = Sponsor::where('sponsor_id',Auth::user()->id)->paginate(5);
        $ref_num = Sponsor::where('sponsor_id',Auth::user()->id)->count();
        $users = User::get();
        $total_received = \DB::table('donations')
                ->selectRaw('sum(btc) as total')
                ->where('sent_to', Auth::user()->id)
                ->get();

        return view('back_office.referrals', compact('ref','ref_num','total_received','users'));
    }

    public function sendInvitation(){
        $email = request('email');
        $name = request('name');
        
        //$sub = Auth::user()->name." Invited you to join ". config('app.name', 'Matrix');

        Mail::send('email.invite', ['email' => $email, 'name'=> $name], function ($message) use ($email) {

                $message->from('hansenr783@gmail.com', config('app.name', 'Matrix'));

                $message->to($email)->subject(Auth::user()->name." Invited you to join ". config('app.name', 'Matrix'));

        });

        return Redirect::back()->with('success','Invitation sent successfully.');
    }
}
