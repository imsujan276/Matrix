@section('title')


Upgrade | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')


<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <i class="fa fa-arrow-up"></i>


                        Account Upgrade

                    </h4>


                </h4>


            </div>


        </div>


    </header>

<div class="row">

    <div class="outer">
@include('layouts.error')
        <div class="inner bg-container">

                    <div class="card">

                            <div class="card-header bg-white" style="background-color:#bbb">

                               <li class="fa fa-arrow-up"></li> Current Level : {{Auth::user()->level}}

                            </div>

                            <div class="card-block " id="user_body">
<!-- Instruction Start -->

                             @if($wallet == NULL)
                                        <div class="alert alert-primary">
                                            <p style="color:#444; ">
                                                <b>Set The Wallet First to be able to upgrade</b>
                                            </p>

                                            <center ><a href="{{url('back_office/wallet')}}" class="btn btn-primary btn-lg" style="color:#444; "><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Set New Bitcoin Wallet</a></center>
                                        </div>


                            @else

                                <div class="row">


                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="alert alert-primary" style="border: 5px solid #090;">
                                            <h3> <u>INSTRUCTIONS - READ CAREFULLY</u></h3>
                                            
                                                <ul style="color:#444; ">
                                                    <li>
                                                        You must complete the following 2 steps.
                                                    </li>
                                                    <li>
                                                        <a href="#step1">Step 1:</a> Send bitcoin payment to the wallet listed by the payee.
                                                    </li>
                                                    <li>
                                                        <a href="#step2">Step 2:</a> Provide the transaction hash ID using the form provided below.
                                                    </li>
                                                    <li>
                                                        This system features automatic payment approval which takes 30-60 minutes.
                                                    </li>
                                                    <li>
                                                        Your upgrade will not be in effect until donation is validated and approved by the system.
                                                    </li>
                                                    <li>
                                                        All donations are voluntarily and final. Refunds are not available.
                                                    </li>
                                                    <li>
                                                        Communication about the upgrade process, donation and approval is between you and the payee only.
                                                    </li>
                                                    <li>
                                                        All disagreements and problems will be manually handled by system administrator. Submit a support ticket to report any issues.
                                                    </li>
                                                    <li>
                                                        You must read and agree to our terms of service.
                                                    </li>
                                                </ul>
                                        </div>
                                    </div>

                                </div>
<!-- Instruction end -->

<!-- Sponsor Detail Start --> 

                                <div class="row" id="step1">
                                    <div class=" card-header" style="background-color:#bbb">
                                        Step 1 : Level {{$upgrade_to}} ( <li class="fa fa-bitcoin"></li> {{$s_plan->donation}})
                                    </div>

                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-6">
                                                  <center>
                                                     <img src="{{ asset('img/'.$sponsor->avatar) }}" class="thumbnail" alt="avatar" width="100px">
                                                     <br>
                                                     <b> {{$sponsor->name}}</b>
                                                     <br>
                                                     <b> Level : {{$sponsor->level}}</b>
                                                 </center>
                                                </div>
                                                
                                                <div class="col-md-6 text-xs-center">
                                                    <table class="table">
                                                        <th colspan="2">
                                                            <h4><u>CONTACT ME</u></h4>
                                                        </th>
                                                       
                                                    @if($sponsor->email !=NULL)
                                                        <tr>
                                                            <th>
                                                                <h4><i class="fa fa-envelope"></i></h4> 
                                                            </th>
                                                            <td>
                                                                <a href="mailto:{{$sponsor->email}}" > {{$sponsor->email}} </a> 
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if($sponsor->phone !=NULL)
                                                        <tr>
                                                            <th>
                                                                <h4><i class="fa fa-phone"></i></h4> 
                                                            </th>
                                                            <td>
                                                                {{$sponsor->phone}}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if($sponsor->skype !=NULL)
                                                        <tr>
                                                            <th>
                                                                <h4><i class="fa fa-skype"></i></h4> 
                                                            <td>
                                                                 {{$sponsor->skype}}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 sol-sm-6">
                                                    
                                                </div>
                                                <div class="col-md-6 sol-sm-6">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                </div>
<!-- Sponsor Detail End -->

<!-- Sponsor Wallet start -->
                                <div class="row">
                                    <div class=" card-header" style="background-color:#bbb">
                                        Send Donation <b>ONLY</b> to the <b>blockchain.info</b> Wallet Address Below <li class="fa fa-arrow-down"></li>
                                    </div>

                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-6 sol-sm-6">
                                                    <div class="alert " style="border: 5px solid #090;">
                                                        <h4>{{$wallet->address}} </h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 sol-sm-6">
                                                    <center>
                                                         <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{$wallet->address}}?&amount={{$s_plan->donation}}" class="thumbnail" alt="QR" >
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!-- Sponsor Wallet end -->

<!-- Transaction Instruction Start -->
                                <div class="row" id="step2">
                                    <div class=" card-header" style="background-color:#bbb">
                                        Step 2 : Submit the transaction hash ID
                                    </div>

                                    <div class="card-block">

                                        <div class="col-md-12 col-sm-12">
                                            <div class="alert alert-primary" style="border: 5px solid #090;">
                                                <h3> <u>WHERE TO FIND THE TRANSACTION HASH ID AFTER YOU MADE PAYMENT?</u></h3>
                                                
                                                    <ul style="color:#444; ">
                                                        <li>
                                                            Go to <a href="https://blockchain.info/" target="_blank">https://blockchain.info/</a>
                                                        </li>
                                                        <li>
                                                            Copy the Bitcoin Wallet address you see in Step 1 and paste it in the search box on Blockchain.info then click on search.
                                                        </li>
                                                        <li>
                                                            On the next page, look for Transactions (Oldest First). Just below that you will see a long string of characters.
                                                        </li>
                                                        <li>
                                                            Copy that long string of characters and come paste it in here in the Transaction Hash ID field.
                                                        </li>
                                                        <li>
                                                            Click on Submit. Voila, if you've done it correctly your upgrade will be in effect as soon as our automated system approves the transaction.
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        <b style="color:#900">WARNING!</b><b> For users of LocalBitcoins.com, Xapo.com and similar exchanges: </b>Our automated system cannot verify all transactions from these websites. If you use localbitcoins.com and xapo.com we kindly ask you to create a Free Bitcoin Wallet with https://blockchain.info/wallet/#/ to do transactions safely and securely on our platform. We want all transactions to be secure and verifiable and thus they need to happen on the blockchain. Some wallet services allow for internal transfers without running it through the blockchain and that is unacceptable to Us. Please ensure you have a blockchain.info wallet to guarantee you have a safe donating experience.
                                                    </p>
                                            </div>


                                            <div>
                                                <h4><u>DONATION AMOUNT (BTC) = <li class="fa fa-bitcoin"></li> {{$s_plan->donation}} </u></h4>
                                                
                                                
                                            
                                                <form action="{{url('back_office/upgrade', Auth::user()->id)}}/{{$upgrade_to}} " method="POST" class="form-horizontal login_validator">

                                                    {{csrf_field()}}

                                                    <div class="form-group">
                                                        <b>Transaction Hash ID : </b>
                                                        <input class="form-control" type="text" name="tx_id" value="" placeholder ="Transaction ID">
                                                    </div>
                                                    <div class="form-group">
                                                        <b>Exact Amount Sent : </b>
                                                        <input class="form-control" type="text" name="btc_sent" value="" placeholder ="Amount of BTC sent">
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" name="submit" class="btn btn-info"> Submit </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
<!-- Transaction end -->
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



@endsection

