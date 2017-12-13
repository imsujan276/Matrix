<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Pages;

class pageController extends Controller
{
    public function index(){
    	$pages = Pages::get();
    	return view('back_office.page', compact('pages'));
    }

    public function create(){
    	$page_num = Pages::count();
    	if($page_num >= 5){
    		return Redirect::to('/back_office/pages')->with('error','You can create 5 pages only.');
    	}
    	return view('back_office.pages.create');
    }


    public function store(){

    	$this->validate(request(),[
    		'name' => 'required|string|max:50',
    		'slug' => 'required|string|max:50',
    		'content' => 'required|string'
    		]);

    	$name = request('name');
    	$slug = request('slug');
    	$content = request('content');

    	$page = new Pages;
    	$page->name = $name;
    	$page->slug = $slug;
    	$page->content = $content;
    	$page->save();

    	return Redirect::to('/back_office/pages')->with('success','Page Added Successfully');


    	
    }

    public function edit($id){
    	$page = Pages::find($id);
    	return view('back_office.pages.update', compact('page'));
    }

    public function update($id){

    		$this->validate(request(),[
    		'name' => 'required|string|max:50',
    		'slug' => 'required|string|max:50',
    		'content' => 'required|string'
    		]);

    	$name = request('name');
    	$slug = request('slug');
    	$content = request('content');

    	$page = Pages::find($id);
    	$page->name = $name;
    	$page->slug = $slug;
    	$page->content = $content;
    	$page->save();

    	return Redirect::to('/back_office/pages')->with('success','Page Updated Successfully');
    }

    public function delete($id){
    	$page = Pages::find($id);
    	$page->delete();

    	return Redirect::to('/back_office/pages')->with('success','Page Deleted Successfully');
    }

    public function getPage($slug){
    	$page = Pages::where('slug',$slug)->first();

    	return view('page',compact('page'));
    }
}
