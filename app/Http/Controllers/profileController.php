<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Validator;
use Auth;

use App\User;
use App\Preference;

class profileController extends Controller
{
    public function getProfile(){

        $preference = Preference::where('user_id',Auth::user()->id)->first();
        
    	return view('back_office.profile', compact('preference'));
    }

    public function updateProfile($id){

    	$this->validate(request(), [
            'name' => 'required|string|max:25',
            'email' => 'required|email',
            'phone' => 'required|integer',
            ]);

    	$data = ([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'skype' => request('skype'),
            ]);

    	User::where('id', $id)->update($data);

    	return Redirect::back()->with('success','Profile details updated successfully.');
    }


    public function updatePassword($id){

    	$this->validate(request(), [
            'password' => 'required|min:6',
            'new_password' => 'required|different:password|max:20|min:6|alpha_num',
            'confirm_password' => 'required|same:new_password',
            'security_answer' => 'required'
            ]);

        $user = User::where('id', $id)
                ->where('security_answer',request('security_answer'))
                ->first();  

        if($user){
            if(Hash::check(request('password'), $user->password))
            {
                $password = Hash::make(request('new_password'));

                $data = ([
                'password' => $password,
                ]);

                User::where('id', $id)->update($data);

                return Redirect::back()->with('success','Password updated successfully.');
            }
            else{
                return Redirect::back()->with('error','Invalid Current Password.');
            }
        }
        else{
            return Redirect::back()->with('error','Incorrect Security Answer.');
        }
    }


    public function updateSecurity($id){
        $this->validate(request(), [
            'new_security_answer' => 'required|max:25',
            'new_security_question' => 'required|max:25',
            'password' => 'required',
        ]);

        if(Hash::check(request('password'), Auth::user()->password))
        {
            $data = ([
                'security_question' => request('new_security_question'),
                'security_answer' => request('new_security_answer'),
            ]);

            User::where('id', $id)->update($data);

            return Redirect::back()->with('success','Security QA updated successfully.');

        }
        else{
            return Redirect::back()->with('error','Incorrect Password.');
        }
    }


    public function updatePreferences($id){

        $email = request('email')?'1':'0';
        $skype = request('skype')?'1':'0';
        $phone = request('phone')?'1':'0';

        $check = Preference::where('user_id', $id)->first();
        
        if($check){

            $data=([
                'email' => $email,
                'skype'=> $skype,
                'phone' => $phone
                ]);
            Preference::where('user_id', $id)->update($data);
        }
        else{
            $p = new Preference;
            $p->user_id = $id;
            $p->email = $email;
            $p->skype = $skype;
            $p->phone = $phone;
            $p->save();
        }
        return Redirect::back()->with('success','Preferences updated successfully.');

    }

    
}
