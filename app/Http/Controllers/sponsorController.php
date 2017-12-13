<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use App\Subscription_plan;
use App\Sponsor;

class sponsorController extends Controller
{
    public function setSponsor(){
    	$rand = rand(1,99);
    	//echo "<br><br>".$rand."<br><br>";
    	if($rand < 10){
    		$sponsor_id = 1;
    		return $sponsor_id;
    	}
    	else{
    		return $this->seekAnotherSponsor();
    	}
    }

    public function seekAnotherSponsor(){
    		$last_id = User::where('level','>',0)->orderBy('id','DESC')->first();
    		$last=$last_id->id;
    		$rand1 = rand(1,$last);
            if($rand1 == 1){
                return $rand1;
            }

    		$users = User::where('level','>',0)->get();
	    	foreach ($users as $user) {
	    		//echo "ID : ".$user->id."Rand : ".$rand1."<br>";
	    		if($user->id == $rand1){
                    if($user->id == 1){
                        return $user->id;
                    }
	    			if($user->level > Auth::user()->level){

	    				$subscription_plan = Subscription_plan::where('id', $user->level)->first();
	    				
	    				$total_ref = Sponsor::where('sponsor_id', $user->id)
	    							->where('sponsor_level', $user->level)
	    							->count();

	    				if($subscription_plan->max_ref > $total_ref){
	    					return $rand1;
	    				}
	    			}
		    	}
	    	}

	    return $this->seekAnotherSponsor();
    }

    public function getSponsor(){
        $rand = rand(1,99);
        if($rand < 10){
            $sponsor_id = 1;
            return $sponsor_id;
        }
        else{
            $last_id = User::where('level','>',0)->orderBy('id','DESC')->first();
            $last=$last_id->id;
            $rand1 = rand(1,$last);
            $users = User::where('level','>',0)->get();
            foreach ($users as $user) {
                if($user->id == $rand1){
                    if($user->id == 1){
                        return $user->id;
                    }
                    if($user->level > 0 ){

                        $subscription_plan = Subscription_plan::where('id', $user->level)->first();
                        
                        $total_ref = Sponsor::where('sponsor_id', $user->id)
                                    ->where('sponsor_level', $user->level)
                                    ->count();

                        if($subscription_plan->max_ref > $total_ref){
                            return $user->id;
                        }
                    }
                }
            }

            return 1;
        }
    }
}
