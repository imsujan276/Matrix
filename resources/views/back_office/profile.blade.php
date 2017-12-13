@section('title')


Profile | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')

<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <i class="fa fa-user"></i>


                        Member Profile

                    </h4>


                </h4>


            </div>


        </div>


    </header>

    @include('layouts/error')

<div class="row">

    <div class="outer">

        <div class="inner bg-container">

                    <div class="card">

                            <div class="card-header bg-white" style="background-color:#bbb">

                               <li class="fa fa-cog"></li> Registration Details and Security Updates

                            </div>

                            <div class="card-block " id="user_body">
<!-- Registration Details Start -->
                                <div class="row">

                                    <div class="col-md-6 col-sm-12 right-border">
                                        <div class=" card-header">
                                            Registration Details
                                        </div>
                                        <div class="card-block">

                                            <form action="{{url('back_office/profile', Auth::user()->id)}}" method="POST" class="form-horizontal login_validator">

                                                {{ csrf_field() }}

                                                <table class="table">
                                                        <tr>
                                                            <th>Name : </th>
                                                            <td>
                                                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" width="100px">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email : </th>
                                                            <td>
                                                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone : </th>
                                                            <td>
                                                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Skype ID : </th>
                                                            <td>
                                                                <input type="text" name="skype" value="{{Auth::user()->skype}}" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Country : </th>
                                                            <td>
                                                                {{Auth::user()->country}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Joined Date : </th>
                                                            <td>
                                                                {{Auth::user()->created_at->toDateString()}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>IP Address : </th>
                                                            <td>
                                                                {{Auth::user()->ip}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan=2><center>
                                                                <button type="submit" class="btn btn-info " > Update </button></center>
                                                            </td>
                                                        </tr>
                                                    </table>
                                            </form>
                                        </div>
                                    </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" card-header">
                                            Security
                                        </div>
                                        <div class="card-block">

                                            <table class="table">
                                                <tr>
                                                    <th>Account Password</th>
                                                    <td> ********* <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#changePassword"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                </tr>
                                                <tr>
                                                    <th>Security Question</th>
                                                    <td> {{Auth::user()->security_question}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Security Answer</th>
                                                    <td> ********* <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#changeSecurity"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class=" card-header">
                                            Preferences
                                        </div>
                                        <div class="card-block">

                                            <form action="{{url('back_office/change_preference', Auth::user()->id)}}" method="POST" class="form-horizontal login_validator">

                                             {{csrf_field()}}
                                            
                                            <table class="table">
                                                <tr>
                                                    <th><i class="fa fa-question-circle-o" aria-hidden="true" title="Show Email"></i> Show Email ID</th>
                                                    <td> 
                                                        <input type="checkbox" name="email"
                                                        <?php 
                                                            if($preference->email == 1)
                                                            echo "checked";
                                                            
                                                        ?>
                                                        > 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fa fa-question-circle-o" aria-hidden="true" title="Show Skype"></i> Show Skype ID </th>
                                                    <td> 
                                                        <input type="checkbox" name="skype"
                                                        <?php 
                                                            if($preference->skype == 1)
                                                            echo "checked";
                                                            
                                                        ?>
                                                        > 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fa fa-question-circle-o" aria-hidden="true" title="Show Phone"></i> Show Phone Number </th>
                                                    <td> 
                                                        <input type="checkbox" name="phone"
                                                        <?php 
                                                            if($preference->phone == 1)
                                                            echo "checked";
                                                            
                                                        ?>
                                                        > 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan=2> 
                                                      <center>
                                                        <button type="submit" class="btn btn-info">
                                                            Update
                                                        </button>
                                                      </center>

                                                    </th>
                                                    
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                </div>


                                </div>
<!-- Registration Details end -->

                            <div>

                    <!-- /.card -->
                    </div>

        <!-- /.inner -->
        </div>
        

    <!-- /.outer -->
    </div>

 
</div>

<!--wrapper-->
</div>

@include('layouts/modal')

@endsection

