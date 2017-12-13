<!doctype html>



<html class="no-js" lang="en">

<head>



    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    
  <!-- Favicon -->
  <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=devanagari" rel="stylesheet" type="text/css"



    <!--global styles-->



    <link type="text/css" rel="stylesheet" href="{{ asset('css/components.css') }}"/>



    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}"/>



    <!-- end of global styles-->



    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/c3/css/c3.min.css') }}"/>



    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/toastr/css/toastr.min.css') }}"/>



     <link type="text/css" rel="stylesheet" href="{{ asset('vendors/switchery/css/switchery.min.css') }}" />


    <link type="text/css" rel="stylesheet" href="{{ asset('css/pages/new_dashboard.css') }}"/>



    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" />



    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" />


    <!--plugin styles-->



    <link type="text/css" rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}"/>



    <link type="text/css" rel="stylesheet" href="{{ asset('css/pages/dataTables.bootstrap.css') }}"/>



    <link type="text/css" rel="stylesheet" href="{{ asset('css/pages/tables.css') }}"/>



    <!-- end of plugin styles -->


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



    <style>

body {font-family: "Lato", sans-serif;}



/* Style the tab */

div.tab {

    overflow: hidden;

    border: 1px solid #ccc;

    background-color: #f1f1f1;

}



/* Style the buttons inside the tab */

div.tab button {

    background-color: inherit;

    float: left;

    border: none;

    outline: none;

    cursor: pointer;

    padding: 14px 16px;

    transition: 0.3s;

    font-size: 17px;

}



/* Change background color of buttons on hover */

div.tab button:hover {

    background-color: #ddd;

}



/* Create an active/current tablink class */

div.tab button.active {

    background-color: #ccc;

}



/* Style the tab content */

.tabcontent {

    display: none;

    padding: 6px 12px;

    -webkit-animation: fadeEffect 1s;

    animation: fadeEffect 1s;

}



/* Fade in tabs */

@-webkit-keyframes fadeEffect {

    from {opacity: 0;}

    to {opacity: 1;}

}



@keyframes fadeEffect {

    from {opacity: 0;}

    to {opacity: 1;}

}

</style>

</head>

<body class="body">


<div class="bg-dark" id="wrap">



    <div id="top">



        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid">
                {{-- <a class="navbar-brand text-xs-center" href="{{ url('back_office') }}">
                    <h4 class="text-white"><img src="{{ asset('img/logo.png') }}" class="admin_img" alt="logo"> {{ config('app.name', 'Matrix') }}</h4>
               </a> --}}
                <div class="menu">
                    <span class="toggle-left" id="menu-toggle">
							<i class="fa fa-bars text-white"></i>
					</span>
				</div>

                <!-- Toggle Button -->



                <div class="text-xs-right xs_menu">
                    <button class="navbar-toggler hidden-xs-up" type="button" data-toggle="collapse"
                            data-target="#nav-content">
                        ☰
                    </button>
                </div>

                <!-- Nav Content -->


                <!-- Brand and toggle get grouped for better mobile display -->



                <div class="topnav dropdown-menu-right float-xs-right">
                    
                    <div class="btn-group" style="min-width: 105px;">

                        <div class="user-settings no-bg">

                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="{{ asset('img/'.Auth::user()->avatar) }}" class="admin_img2 rounded-circle avatar-img" alt="avatar">

                                @if(Auth::check())

                                	<strong>{{ucwords(Auth::user()->name)}}</strong>
			                     @endif
                                 
							<span class="fa fa-sort-down white_bg"></span>
                            </button>



                            <div class="dropdown-menu admire_admin">

                                <a class="dropdown-item" href="{{ url('back_office/profile') }}">
                                    <i class="fa fa-user"></i> &nbsp;&nbsp;User Profile</a>

                                <a class="dropdown-item" href="{{ url('page/how-it-works') }}"><i class="fa fa-question"></i>&nbsp;&nbsp;
                                    How It Works</a>

								<a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>



                        </div>



                    </div>



                </div>




                    <div class="text-xs-center " >

                        <div class=" no-bg">

                                <span style="color:#fff">Total Members : <span id="total_member"></span></span><br>
                                <span style="color:#fff">Total Donations : <li class="fa fa-bitcoin"></li> <span id="total_donation"></span>

                            </div>
                        </div>




            <!-- /.container-fluid --> </nav>



        <!-- /.navbar -->



        <!-- /.head --> </div>











@include('layouts/sidebar')







@yield('content')











@yield('footer')
     

<!-- /#footer -->



<!-- global scripts-->



<script type="text/javascript" src="{{ asset('js/components.js') }}"></script>



<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>

<script type="text/javascript">

    var jq = jQuery.noConflict();



</script>

<!--end of global scripts-->



<!--  plugin scripts -->



<script type="text/javascript" src="{{ asset('vendors/raphael/js/raphael-min.js') }}"></script>



<script type="text/javascript" src="{{ asset('vendors/d3/js/d3.min.js') }}"></script>



<script type="text/javascript" src="{{ asset('vendors/c3/js/c3.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
            url : "{{ url('/getHeaderData') }}",
            type: 'GET',
            success: function(data){
                //console.log(data);
                // console.log(data['user']);
                // console.log(data['donation'][0]['total']);
                $('#total_member').html(data['user']);
                $('#total_donation').html(data['donation'][0]['total']);
            },
            error: function(xhr,textStatus,thrownError) {
                alert(textStatus);
            }
        });

    });
</script>

</body>

</html>