@section('title')


Referrals | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')


<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <li class="fa fa-user-plus"></li>


                        Referrals

                    </h4>


                </h4>


            </div>


        </div>


    </header>

<div class="row">

    <div class="outer">

        <div class="inner bg-container">
            @include('layouts.error')

                    <div class="card">

                            <div class="card-header bg-white" style="background-color:#bbb">

                                <li class="fa fa-user-plus"></li> My Referrals 
                                <p class="pull-right">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#invite"><i class="fa fa-user-plus" aria-hidden="true"></i> Invite Member </button>
                                </p>

                            </div>

                            <div class="card-block " id="user_body">
<!-- Subscriptions Start --> 
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

                                <div class="row">
                                    <div class="alert alert-info">
                                        <p style="color:#222"> <strong >Your referral Link : </strong>{{url('/')}}/ref/{{Auth::user()->ref_id}}  </p>
                                        <p style="color:#222"> <strong >Your referral Link to register Page : </strong>{{url('/')}}/ref/{{Auth::user()->ref_id}}/register  </p>
                                    </div>
                                    <div class=" card-header" style="background-color:#bbb">
                                         Total referrals : {{$ref_num}} 
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         Total received : <li class="fa fa-bitcoin"></li> <?php print_r($total_received[0]->total); ?>
                                    </div>
                                    <div class="card-block">
                                        <div class="container">
                                            <div class="row">
                                            <table class="table">
                                                <thead class=" card-header">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Level</th>
                                                        <th>Contact</th>
                                                        <th>Referral Link</th>
                                                        <th>Join Date</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if($ref)
                                                        @foreach($ref as $r)
                                                            @foreach($users as $u)
                                                            @if($u->id == $r->user_id)
                                                            <tr colspan=2>
                                                                <td> 
                                                                    <b>{{ucwords($u->name)}} </b>
                                                                </td>
                                                                <td> 
                                                                    <a href="mailto:{{$u->email}}">{{$u->email}} </a>
                                                                </td>
                                                                <td>
                                                                    {{$u->level}}
                                                                </td>
                                                                <td>
                                                                    <a href="tel:{{$u->phone}}">{{$u->phone}}</a>
                                                                </td>
                                                                <td>
                                                                    {{url('/')}}/ref/{{$u->ref_id}}
                                                                </td>
                                                                <td>
                                                                    {{$u->created_at->toDateString()}}
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="dataTables_paginate paging_simple_numbers text-xs-center" id="editable_table_paginate">
                                                {{ $ref->appends(['sort' => 'created_at'])->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif
<!-- Subscriptions End -->
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


@include('layouts.modal')

@endsection

