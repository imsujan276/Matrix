@section('title')


Wallet | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')

<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <i class="fa fa-google-wallet"></i>


                        Bitcoin Wallet

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

                               <li class="fa fa-cog"></li> Your Bitcoin Wallet

                            </div>

                            <div class="card-block " id="user_body">

                                @if($wallet == NULL)
                                        <div class="alert alert-primary">
                                            <p style="color:#444; ">
                                                <b>We recommend using a blockchain.info wallet to guarantee you have a safe donating experience.</b>
                                                <br>
                                                <b style="color:#a00">WARNING! </b><b>For users of LocalBitcoins.com, Xapo.com and similar exchanges: </b>Our automated system cannot verify all transactions from these websites. If you use localbitcoins.com and xapo.com we kindly ask you to create a Free Bitcoin Wallet with https://blockchain.info/wallet/#/ to do transactions safely and securely on our platform.
                                                <br>
                                                We want all transactions to be secure and verifiable and thus they need to happen on the blockchain. Some wallet services allow for internal transfers without running it through the blockchain and that is unacceptable by us.
                                            </p>

                                            <center ><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addWallet" style="color:#444; "><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Set New Bitcoin Wallet</button></center>
                                        </div>


                                @else
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    {{$wallet->website}}
                                                </th>
                                                <th>
                                                    {{$wallet->address}}
                                                </th>
                                                <th>
                                                    <button type="button" class="btn  btn-sm" data-toggle="modal" data-target="#addWallet" style="color:#444; "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                </th>
                                            </tr>
                                        </table>
                                        

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

