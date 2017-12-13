@section('title')


Dashboard | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')


<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <i class="fa fa-home"></i>


                        Dashboard

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

                               <li class="fa fa-user"></li> User Profile Summary

                            </div>

                            <div class="card-block " id="user_body">
<!-- Profile Start -->
                                <div class="row">

                                    <div class="col-md-6 col-sm-12 right-border">
                                        <div class=" card-header">
                                            Profile Summary
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-4">
                                                  <center>
                                                     <img src="{{ asset('img/'.Auth::user()->avatar) }}" class="thumbnail" alt="avatar" width="100px">
                                                     <br>
                                                     <b> {{ ucwords(Auth::user()->name)}}</b><br>
                                                     <b>Level : {{ Auth::user()->level}}</b>
                                                 </center>
                                                </div>
                                                <div class="col-md-8 text-xs-center">

                                                    <table class="table">
                                                        @if(!$wallet)
                                                            <tr>
                                                                <th colspan=2>
                                                                    <a class="btn btn-info" href="{{url('back_office/wallet') }}"> Add Bitcoin Wallet to your profile
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th colspan=2>
                                                                <a class="btn btn-info" href="{{url('back_office/upgrade') }}"> Upgrade To Next Stage
                                                                </a>

                                                                <a class="btn btn-info" href="{{url('back_office/profile') }}"> Profile
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Joined
                                                            </th>
                                                            <td>
                                                                {{ Auth::user()->created_at->toDateString()}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                BTC Sent
                                                            </th>
                                                            <td>
                                                                <i class="fa fa-bitcoin"></i> 
                                                                {{$sent_btc}}
                                                            </td>
                                                            <tr>
                                                            <th>
                                                                BTC Received
                                                            </th>
                                                            <td>
                                                                <i class="fa fa-bitcoin"></i> 
                                                                {{$received_btc}}
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class=" card-header">
                                            Sponsor
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-4">
                                                  <center>
                                                     <img src="{{ asset('img/'.$sponsor->avatar) }}" class="thumbnail" alt="avatar" width="100px">
                                                     <br>
                                                     <b> {{ucwords($sponsor->name)}}</b>
                                                     <br>
                                                     <b> Level : {{$sponsor->level}}</b>
                                                 </center>
                                                </div>
                                                
                                                <div class="col-md-8 text-xs-center">
                                                    <table class="table">
                                                       
                                                        <tr>
                                                            <th>
                                                                <h4><i class="fa fa-envelope"></i></h4> 
                                                            </th>
                                                            <td>

                                                                @if($preference->email ==1)
                                                                    @if($sponsor->email != NULL)
                                                                        {{$sponsor->email}}
                                                                    @else
                                                                        Unavailable
                                                                    @endif
                                                                @else
                                                                    Unavailable
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <h4><i class="fa fa-phone"></i></h4> 
                                                            </th>
                                                            <td>
                                                                 @if($preference->phone ==1)
                                                                    @if($sponsor->phone != NULL)
                                                                        {{$sponsor->phone}}
                                                                    @else
                                                                        Unavailable
                                                                    @endif
                                                                @else
                                                                    Unavailable
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <h4><i class="fa fa-skype"></i></h4> 
                                                            <td>
                                                                @if($preference->skype ==1)
                                                                    @if($sponsor->skype != NULL)
                                                                        {{$sponsor->skype}}
                                                                    @else
                                                                        Unavailable
                                                                    @endif
                                                                @else
                                                                    Unavailable
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
<!-- profile end -->

<!-- Subscriptions Start --> 

                                <div class="row">
                                    <div class=" card-header" style="background-color:#bbb">
                                        Subscriptions
                                    </div>
                                    <div class="card-block">
                                        <div class="container">

                                        @if($sub)
                                            <table class="table">
                                                <thead class=" card-header">
                                                    <tr>
                                                        <th>Level</th>
                                                        <th>Start Date</th>
                                                        <th>Next Due Date</th>
                                                        <th>Time remaining</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sub as $s)
                                                    @foreach($sub_plan as $sp)
                                                    @if($s->subscription_id == $sp->id)
                                                    <tr>
                                                        <td>{{$sp->id}} </td>
                                                        <td> {{ Carbon\Carbon::parse($s->created_at)->format('Y-m-d') }} </td>
                                                        <td> {{ Carbon\Carbon::parse($s->created_at)->addDays($sp->age)->format('Y-m-d') }} </td>
                                                        <td> 
                                                            <?php 
                                                                $end = Carbon\Carbon::parse($s->created_at)->addDays($sp->age);
                                                                $now = Carbon\Carbon::now();
                                                                $length = $end->diffInDays($now);
                                                                if($length >= 1)
                                                                    echo $length." Days remaining";
                                                                else
                                                                    echo "<a class='btn btn-info' href='{{url('back_office/upgrade') }}'> Renew Now</a>"
                                                            ?>
                                                         </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            @endif
                                        </div>
                                    </div>
                                </div>
<!-- Subscriptions End -->

<!-- Referral Summary Start --> 

                                <div class="row">
                                    <div class=" card-header" style="background-color:#bbb">
                                        Donation Network Summary
                                    </div>
                                    <div class="card-block">
                                        <div class="container">
                                            <table class="table">
                                                <thead class=" card-header">
                                                    <tr>
                                                        <th>Level</th>
                                                        <th>Donation</th>
                                                        <th>Maximum Referrals</th>
                                                        <th>Your Referrals</th>
                                                        <th>Received BTC</th>
                                                        <th>Potential BTC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $i=0;
                                                    $d = 0;
                                                    $ref = 0;
                                                    $myref = 0;
                                                    $received_btc = 0;
                                                    $total_btc = 0;
                                                ?>
                                                @foreach($sub_plan as $sp)
                                                    <tr>
                                                        <td> {{$sp->id}} </td>

                                                        <td> 
                                                            <li class="fa fa-bitcoin"></li> 
                                                            {{$sp->donation}} 
                                                            <?php $d+= $sp->donation; ?>
                                                        </td>

                                                        <td> 
                                                            {{$sp->max_ref}} 
                                                            <?php $ref += $sp->max_ref; ?>
                                                        </td>

                                                        <td> 
                                                            @if(isset($my_ref[$i])) 
                                                                <?php 
                                                                if($my_ref[$i]->sp_lvl == $sp->id){
                                                                    echo ($my_ref[$i]->num_ref); 
                                                                    $myref += $my_ref[$i]->num_ref;
                                                                }
                                                                ?>
                                                            @endif
                                                        </td>

                                                        <td> 
                                                             @if(isset($my_received_donations[$i])) 
                                                                <?php 
                                                                if($my_received_donations[$i]->level == $sp->id){
                                                                    echo '<li class="fa fa-bitcoin"></li> ';
                                                                    echo ($my_received_donations[$i]->btc);
                                                                    $received_btc += $my_received_donations[$i]->btc;
                                                                }
                                                                $i++;
                                                                ?>
                                                            @endif
                                                         </td>

                                                        <td> 
                                                            <li class="fa fa-bitcoin"></li> 
                                                            {{$sp->max_ref * $sp->donation}} 
                                                            <?php $total_btc += ($sp->max_ref * $sp->donation); ?>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                </tbody>

                                                <tfoot class=" card-header">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th><li class="fa fa-bitcoin"></li> {{$d}}</th>
                                                        <th>{{$ref}} </th>
                                                        <th><?php echo $myref; ?> </th>
                                                        <th> <li class="fa fa-bitcoin"></li> <?php echo $received_btc; ?></th>
                                                        <th> <li class="fa fa-bitcoin"></li> <?php echo $total_btc; ?></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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

