<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Donation;

class frontController extends Controller
{
    public function index(){

    	$total_users = User::count();

    	$total_donations = Donation::sum('btc');

		$admin = User::where('id', '1')->first();
		$users = User::get();

		$top_countries = \DB::select("select count(country) as num_country, country
                                from users 
                                group by country
                                order by num_country desc
                                limit 10"
                                );

		$top_recruiters = \DB::select("select count(sponsors.sponsor_id) as num_ref, users.name as name
                                from sponsors, users
                                where users.id = sponsors.sponsor_id
                                group by sponsors.sponsor_id,users.name
                                order by num_ref desc
                                limit 10"
                                );

		$top_earners = \DB::select("select sum(donations.btc) as total_btc, users.name as name
                                from donations,users
                                where users.id = donations.sent_to
                                group by donations.sent_to,users.name
                                order by total_btc desc
                                limit 10"
                                );

		$latest_donations = \DB::select("select donations.btc as btc , users.name as name, donations.created_at as created_at
                                from donations,users
                                where users.id = donations.sent_to
                                group by donations.btc,users.name,donations.created_at
                                order by created_at asc
                                limit 6"
                                );

		$testimonials = \DB::table('testimonials')
			            ->join('users', 'users.id', '=', 'testimonials.user_id')
			            ->select('users.name', 'testimonials.message', 'testimonials.created_at')
			            ->limit(10)
			            ->get();
			           // dd($testimonials);

    	return view('index', compact('testimonials','total_users','total_donations', 'admin','top_countries','top_recruiters','users','top_earners','latest_donations'));
    }
}
