<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Testimonial;
use App\User;
use Auth;

class testimonialController extends Controller
{
    public function index(){
    	//get first 15
    	$testimonials = Testimonial::orderBy('created_at','desc')->skip(0)->take(15)->get(); // skip == Offset 

    	$users = User::get();

    	$mine = Testimonial::where('user_id', Auth::user()->id)->first();

    	return view('back_office.testimonials', compact('mine','users','testimonials'));
    }


    public function add($id){

    	$this->validate(request(), [
            'message' => 'required|string|max:400',
           ]);


	    		$testimonial = new Testimonial;
	    		$testimonial->message = request('message');
	    		$testimonial->user_id = $id;
	    		$testimonial->save();
	    	

	    	return Redirect::back()->with('success', 'Testimonial Added Successfully.');

    }
}
