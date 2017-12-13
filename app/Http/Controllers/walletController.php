<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Wallet;
use Auth;
use App\Subscription_plan;
use App\Sponsor;
use App\User;
use App\Donation;
use App\Subscription;

use Carbon\Carbon; 

use App\Http\Controllers\sponsorController;

class walletController extends Controller
{
    public function getwallet(){
    	$wallet = Wallet::where('user_id', Auth::user()->id)->first();
    	return view('back_office.wallet', compact('wallet'));
    }

    public function setwallet($id){
    	$address = request('address');
    	$website = request('website');
    	$security_answer = request('security_answer');

    	$this->validate(request(), [
            'website' => 'required|string|max:50',
            'address' => 'required|alpha_num|max:34|min:34',
            'security_answer' => 'required',
           ]);

    	if($security_answer == Auth::user()->security_answer)
    	{	    	
	    	$wallet = Wallet::where('user_id', Auth::user()->id)->first();
	    	if($wallet){
		    	$data = ([
		            'website' => $website,
		            'address' => $address,
		        ]);
		        Wallet::where('user_id', $id)->update($data);
	    	}
	    	else{
	    		$wallet = new Wallet;
	    		$wallet->website = $website;
	    		$wallet->address = $address;
	    		$wallet->user_id = $id;
	    		$wallet->save();
	    	}
	    	return Redirect::back()->with('success', 'Wallet Updated Successfully.');
    	}
    	else{
    		return Redirect::back()->with('error', 'Invalid Security Answer.');
    	}
    }


    public function getUpgrade(){
       
        $upgrade_to= Auth::user()->level + 1;

        $s_plan = Subscription_plan::where('id',$upgrade_to)->first();

        $s = Sponsor::where('user_id', Auth::user()->id)->first();
        $s_id = $s->sponsor_id;
        $sponsor = User::where('id',$s_id)->first();

        if($s_id != 1){
            if($sponsor->level <= Auth::user()->level ){
                if($s->next_sponsor_id == $s->sponsor_id){

                    $s_id = (new sponsorController)->setSponsor();
                    $sponsor = User::where('id',$s_id)->first();

                    $data=([
                        'next_sponsor_id' => $s_id,
                        ]);
                    Sponsor::where('user_id',Auth::user()->id)->update($data);
                }
            }
        }

        $s = Sponsor::where('user_id', Auth::user()->id)->first();
        if($s->next_sponsor_id != NULL){
            $s_id = $s->next_sponsor_id;
        }else{
            $s_id = $s->sponsor_id;
        }

        $sponsor = User::where('id',$s_id)->first();
       // echo $s_id;
        $wallet = Wallet::where('user_id', $s_id)->first();

        return view('back_office.upgrade', compact('s_plan', 'upgrade_to','sponsor','wallet'));
    }


    public function setUpgrade($id, $upgrade_to){

        $tx_id = request('tx_id');
        $btc_sent = request('btc_sent');

        $this->validate(request(), [
            'tx_id' => 'required',
            'btc_sent' => 'required',
           ]);

        $tx_id_check = Donation::where('tx_id', $tx_id)->first();

        if($tx_id_check){
            return Redirect::back()->with('error','Transaction Hash ID already been used.');
        }
        else{

            try{
                $tx = json_decode(file_get_contents("http://blockchain.info/rawtx/".$tx_id));

            }catch(\Exception $e){
                return Redirect::back()->with('error','Invalid Transaction Hash ID.');
            }

            $sender = $tx->out[0]->addr;
            $to = $tx->inputs[0]->prev_out->addr;
            $sent_btc = $tx->out[0]->value/100000000;
            $sent_date = gmdate("Y-m-d", $tx->time);


            $now  = Carbon::now();
            $end  = Carbon::parse($sent_date);

            // show difference in days between now and end dates
            $diff = $now->diffInDays($end);

            if($diff > 23){
                return Redirect::back()->with('error','Please use the transaction Hash ID that is used within 3 days.');
            }
            else{

                if($sent_btc != $btc_sent){
                    return Redirect::back()->with('error','Sent BTC and Received BTC are not the same.');
                }
                else{

                    $upgrade_cost = Subscription_plan::find($upgrade_to)->first();

                    if($btc_sent != $upgrade_cost->donation){
                        return Redirect::back()->with('error','You entered '.$btc_sent.' You have to send exactly '.$upgrade_cost->donation.' BTC for the upgrade.');
                    }
                    $spons = Sponsor::where('user_id', Auth::user()->id)->first();
                    $d = new Donation;
                    $d->user_id = $id;
                    $d->sent_to = $spons->sponsor_id;
                    $d->btc = $sent_btc;
                    $d->tx_id = $tx_id;
                    $d->send_address = $sender;
                    $d->receive_address = $to;
                    $d->tx_date = $sent_date;
                    $d->level = Auth::user()->level+1;
                    $d->save();
                    /* 
                        update user level
                    */
                    $user = User::find($id);
                    $user->level = Auth::user()->level+1;
                    $user->save();
                    /* 
                        add new subscription
                    */
                    $data=([
                        'user_id'=>$id,
                        'subscription_id' => $upgrade_to,
                        ]);
                    DB::table('subscriptions')->insert($data);
                    /*
                        change sponsor if sponsor is not admin
                    */
                    $sp_get = Sponsor::where('user_id', Auth::user()->id)->first();
                    if($sp_get->sponsor_id == 1){
                        $sp = 1;
                    }else{
                        $sp = (new sponsorController)->setSponsor();
                    }
                    $sponsor = user::where('id', $sp)->first();

                  // echo "new = ".$sp." level: ".$sponsor->level;
                    $data=([
                        'sponsor_id' => $sp_get->next_sponsor_id,
                        'sponsor_level' => $sponsor->level,
                        ]);
                    Sponsor::where('user_id',$id)->update($data);
                   
                    

                   return Redirect::back()->with('success','Upgraded to Level'.$upgrade_to.' Successfully.');
                }
            }

        }
    }

    public function getDOnations(){
        $sent = Donation::where('user_id', Auth::user()->id)->paginate(5);
        $received = Donation::where('sent_to', Auth::user()->id)->paginate(5);
        $users = User::get();
        return view('back_office.donation', compact('sent','received','users'));
    }
}
