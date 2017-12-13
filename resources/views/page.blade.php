@section('title')
{{ucwords($page->name)}} - {{ config('app.name', 'Matrix') }}
@endsection

@extends('layouts.front')

@section('content')

<div class="container">

		<h2 align="center" style="margin-top:10px">{{strtoupper($page->name)}} <hr></h2>

	
	{!!html_entity_decode($page->content)!!}
</div>
@endsection