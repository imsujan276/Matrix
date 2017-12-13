<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invitation</title>
</head>
<body>
	Hello {{ucwords($name)}}, 
	<p>
		<b>{{ucwords(Auth::user()->name)}}</b> Invited you to Join <b><a href="{{url('/')}}" target="_blank">{{ config('app.name', 'Matrix') }}</a></b>, the member to member donation program, to help you earn upto  128 BTC from just 0.005 BTC.
	</p>
	<a href="{{url('/')}}/ref/{{Auth::user()->ref_id}}/register" target="_blank">Join {{ucwords(Auth::user()->name)}}</a>
	<p>
		OR Copy and Paste the below URL into the browser
	</p>
		{{url('/')}}/ref/{{Auth::user()->ref_id}}/register
	<p>
		Regards,
	</p>
	<p>
		<a href="{{url('/')}}" target="_blank">{{ config('app.name', 'Matrix') }}</a>
	</p>
</body>
</html>