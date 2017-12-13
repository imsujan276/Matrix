@section('title')


Donations | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')


<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <li class="fa fa-arrow-right"></li><li class="fa fa-arrow-left"></li>


                        Donations

                    </h4>


                </h4>


            </div>


        </div>


    </header>

<div class="row">

    <div class="outer">

        <div class="inner bg-container">

                    <div class="card">

                            <div class="card-header bg-white" style="background-color:#bbb">

                                <li class="fa fa-arrow-right"></li><li class="fa fa-arrow-left"></li> Total Donations Received

                            </div>

                            <div class="card-block " id="user_body">
<!-- Subscriptions Start --> 

                                <div class="row">
                                    <div class=" card-header" style="background-color:#bbb">
                                         1 Donations Received : <li class="fa fa-bitcoin"></li> 0.006
                                    </div>
                                    <div class="card-block">
                                        <div class="container">
                                            <table class="table">
                                                <thead class=" card-header">
                                                    <tr>
                                                        <th>Level</th>
                                                        <th>From Member</th>
                                                        <th>Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>BTC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($received)
                                                        @foreach($received as $r)
                                                            @foreach($users as $u)
                                                            @if($u->id == $r->sent_to)
                                                            <tr>
                                                                <td> {{$r->level}} </td>
                                                                <td> {{ucwords($u->name)}}</td>
                                                                <td> {{$r->created_at->toDateString()}}</td>
                                                                <td> {{$r->tx_id}}</td>
                                                                <td> <li class="fa fa-bitcoin"></li> {{$r->btc}}</td>
                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        <p>No Records...</p>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <div class="dataTables_paginate paging_simple_numbers text-xs-center" id="editable_table_paginate">
                                                {{ $received->appends(['sort' => 'created_at'])->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!-- Subscriptions End -->

<!-- Referral Summary Start --> 

                                <div class="row">
                                    <div class=" card-header" style="background-color:#bbb">
                                        1 Donations Sent : <li class="fa fa-bitcoin"></li> 0.006
                                    </div>
                                    <div class="card-block">
                                        <div class="container">
                                            <table class="table">
                                                <thead class=" card-header">
                                                    <tr>
                                                        <th>Level</th>
                                                        <th>To Member</th>
                                                        <th>Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>BTC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($sent)
                                                        @foreach($sent as $s)
                                                            @foreach($users as $u)
                                                            @if($u->id == $s->sent_to)
                                                            <tr>
                                                                <td> {{$s->level}} </td>
                                                                <td> {{ucwords($u->name)}}</td>
                                                                <td> {{$s->created_at->toDateString()}}</td>
                                                                <td> {{$s->tx_id}}</td>
                                                                <td> <li class="fa fa-bitcoin"></li> {{$s->btc}}</td>
                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        <p>No Records...</p>
                                                    @endif
                                                </tbody>
                                            </table>

                                            <div class="dataTables_paginate paging_simple_numbers text-xs-center" id="editable_table_paginate">
                                                {{ $sent->appends(['sort' => 'created_at'])->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!-- Referral Summary End -->
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



@endsection

