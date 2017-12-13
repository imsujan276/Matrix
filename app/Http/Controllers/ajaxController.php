<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ajaxController extends Controller
{
    public function getHeaderData(){

    	$users = User::where('level','>','0')->count();

    	$donations = \DB::table('donations')
                ->selectRaw('sum(btc) as total')
                ->get();
        $data = [
        	'user' => $users,
        	'donation' => $donations
        ];

    	return $data;
    }
}
