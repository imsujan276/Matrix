<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Sponsor;
use App\Preference;
use App\Wallet;
use App\Subscription_Plan;
use App\Donation;

use Carbon\Carbon; 


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        
        if($user->id == 1){
            $s_id = $user->id;
        }
        else{
            $s = Sponsor::where('user_id', $user->id)->first();
            $s_id = $s->sponsor_id;
        }

        $wallet = Wallet::where('user_id', $user->id)->first();

        $sponsor = User::where('id',$s_id)->first();
        
        $preference = Preference::where('user_id', $sponsor->id)->first();

        $sub_plan = Subscription_plan::get();

        $sub = DB::table('subscriptions')->where('user_id',$user->id)->get();

        $sent_btc = Donation::where('user_id', $user->id)->sum('btc');
        $received_btc = Donation::where('sent_to', $user->id)->sum('btc');

        // $my_ref = Sponsor::where('sponsor_id', $user->id)
        //             ->orderBy('sponsor_level')
        //             ->get();


        $my_ref = DB::select("select count(sponsor_id) as num_ref, sponsor_level as sp_lvl
                from sponsors 
                where sponsor_id= $user->id 
                group by sponsor_level 
                order by sponsor_level asc"
                );

        $my_received_donations = DB::select("select sum(btc) as btc ,level
                                from donations 
                                where sent_to= $user->id 
                                group by level
                                order by level asc"
                                );


        /*
         if subscription pack expired, delete the user
        */
        // $s = DB::table('subscriptions')->where('user_id',$user->id)->orderBy('created_at','desc')->first();
        // $sp = Subscription_plan::where('id', $s->subscription_id)->first();
        // $end = Carbon::parse($s->created_at)->addDays($sp->age);
        // $now = Carbon::now();
        // $length = $end->diffInDays($now);

        // if($length <= 0){
        //     $u = User::find($user->id);
        //     $u->delete();

        //     $p = Preference::where('user_id', $user->id);
        //     $p->delete();

        //     $w = Wallet::where('user_id', $user->id);
        //     $w->delete();

        //     $s = Sponsor::where('user_id', $user->id);
        //     $s->delete();

        //     $data=([
        //         'sponsor_id' => 1,
        //         'sponsor_level' => 9,
        //         ]);
        //     Sponsor::where('sponsor_id', $user->id)->update($data);

        //     $data1=([
        //         'next_sponsor_id' => 1,
        //         ]);
        //     Sponsor::where('next_sponsor_id', $user->id)->update($data1);

        //     return redirect('/register')->with('error','User Expired..... Please Register and start fresh..');

        // }
            


        return view('back_office.index', compact('sent_btc','received_btc','my_ref','my_received_donations','user', 'sponsor', 'preference','wallet','sub','sub_plan'));
    }
}
