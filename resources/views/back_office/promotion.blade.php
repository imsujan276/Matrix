@section('title')


Promotion | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')

<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <i class="fa fa-bullhorn"></i>


                        Marketing

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

                               <li class="fa fa-cog"></li> Marketing Material

                            </div>

                            <div class="card-block " id="user_body">

                                @if(Auth::user()->level == 0)
                                        <div class="alert alert-success alert-dismissible">


                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p><strong>
                                                You need to Upgrade first to be able to refer people. 
                                            </strong></p>
                                                <a href="{{url('back_office/upgrade')}}">
                                                    <button class="btn btn-primary" style="color:#222"> Upgrade Now</button>
                                                </a>
                                        </div>


                                @else
                                            <div class="card-header">
                                                Your referral Link
                                            </div>
                                            <div class="card-block">
                                                    <div class="alert alert-info">
                                                          <strong style="color:#222">
                                                            {{url('/')}}/ref/{{Auth::user()->ref_id}}
                                                        </strong>
                                                    </div>
                                            </div>
                                        
                                            <div class="card-header">
                                                Your referral Link To Register Page
                                            </div>
                                            <div class="card-block">
                                                <div class="alert alert-info">
                                                          <strong style="color:#222">
                                                            {{url('/')}}/ref/{{Auth::user()->ref_id}}/register
                                                        </strong>
                                                    </div>
                                            </div>
                                        

                                @endif


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

