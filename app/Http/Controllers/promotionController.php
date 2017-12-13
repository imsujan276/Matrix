<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class promotionController extends Controller
{
    public function getPromotionLink(){

    	$ref_id = Auth::user()->ref_id;
    	return view('back_office.promotion', compact('ref_id'));
    }
}
