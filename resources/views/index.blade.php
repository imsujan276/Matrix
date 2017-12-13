@section('title')
{{ config('app.name', 'Matrix') }}
@endsection

@extends('layouts.front')

@section('content')

<style type="text/css">
  #slideshow { 
    margin: 50px auto; 
    position: relative; 
    width: 100%%; 
    height: 240px; 
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
    }

    #slideshow > div { 
        position: absolute; 
        top: 10px; 
        left: 10px; 
        right: 10px; 
        bottom: 10px; 
    }

    blockquote p:before {
    content: "\f10d";
    font-family: 'Fontawesome';
    float: left;
    margin-right: 10px;
}


</style>
  <!-- Hero -->

  <section class="hero" style="background-image:url({{ asset('lib/hero.jpg') }})" >
    <div class="container" align="left">

      <div class="col-md-12">
        <h2>
            Bring Your Ideas Into Life.
          </h2>

        <p class="tagline">
          We help you with direct funding for your financial needs. <br>With our step by step model you can reach financial freedom.
        </p>
        <a class="btn btn-info btn-lg" href="/login">Get Started Now</a>
      </div>
    </div>

  </section>
  <!-- /Hero -->

  <section id="features">
    <div class="container">
      <h4><li class="fa fa-check-square-o"></li> Only <li class="fa fa-btc"></li> 0.005 to get started. </h4>
      <h4><li class="fa fa-check-square-o"></li> No Monthly / Yearly Subscription (Lifetime Subscription) </h4>
      <h4><li class="fa fa-check-square-o"></li> Secured platform </h4>
      <h4><li class="fa fa-check-square-o"></li> No Waiting for Withdrawal. Direct Donation to member wallet </h4>
      <h4><li class="fa fa-check-square-o"></li> Best Team Building Platform! Learn and Earn! </h4>
      <h4><li class="fa fa-check-square-o"></li> 9 levels of plan. </h4>
    </div>
  </section>

  <section id="work" class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="{{ asset('lib/hero1.jpg') }}" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <div class="container">
      <div >
      <h2 class="text-center">
          This is How It Works
        </h2>
        <hr>
      <div class="row">
        <div class="col-lg-4 col-xs-12">
          <div class="ctext-center">
            <div>
              <h1>
                <span class="fa fa-rocket"></span>
              </h1>
            </div>
            <div>
              <h3>
                  Register
                </h3>
                <hr>
              <p>
                Register and Donate to start your journey. You can now invite others to donate to you.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-xs-12">
          <div class="text-center">
            <div>
              <h1>
                <span class="fa fa-envelope"></span>
              </h1>
            </div>

            <div>
              <h3>
                  Invite Friends
                </h3>
              <hr>
              <p>
                Invite your friends to also donate and receive monthly donations. Together we achieve more.
              </p>
            </div>
          </div>
        </div>

        <div class=" col-lg-4 col-xs-12">
          <div class=" text-center">
            <div>
              <h1>
                <span class="fa fa-bell"></span>
              </div>
            </h1>

            <div>
              <h3>
                  Success
                </h3>
              <hr>
              <p>
                You find only 2 people. Duplicate the process. And before you know it. Your success is easily achievable.
              </p>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>


  <section id="statistics" >
    <div class="container">
      <h2 class="text-center"> STATISTICS </h2>
      <div class="row text-center">
        <div class="col-md-4">
          <h3>
            TOTAL USERS
          </h3>
          <p style="font-size:20px">
            <span class="stats-no" data-toggle="counter-up">{{$total_users}} </span>
          </p>
        </div>
        <div class="col-md-4">
          <h3>
            TOTAL DONATIONS
          </h3>
          <p >
            <li class="fa fa-bitcoin"style="font-size:20px"></li> 
            <span class="stats-no" style="font-size:20px">
              {{$total_donations}}
            </span>
          </p>
        </div>
        <div class="col-md-4">
          <h3>
            DAYS ONLINE
          </h3>
          <p style="font-size:20px">
            <span class="stats-no" data-toggle="counter-up">
              <?php
                $end = Carbon\Carbon::parse($admin->created_at);
                $now = Carbon\Carbon::now();
                $length = $end->diffInDays($now);
                echo $length;
              ?>
            </span> Days
          </p>
        </div>
      </div>
      <hr>

      <div class="row text-center ">
        <div class="col-md-4">
          <h4>
            TOP 10 EARNERS
          </h4>
          <table class="table" style="background-color:#ddd">
            @foreach($top_earners as $te)
              <tr>
                <td>
                  {{ucwords($te->name)}}
                </td>
                <td>
                  <li class="fa fa-btc"></li> {{$te->total_btc}}
                </td>
              </tr>
            @endforeach
          </table>
        </div>

        <div class="col-md-4">
          <h4>
            TOP 10 RECRUITERS 
          </h4>
          <table class="table " style="background-color:#ddd">
            @foreach($top_recruiters as $t)
              <tr>
                <td>
                  {{ucwords($t->name)}}
                </td>
                <td>
                  {{$t->num_ref}}
                </td>
              </tr>
            @endforeach
          </table>
        </div>

        <div class="col-md-4">
          <h4>
            TOP 10 COUNTRIES
          </h4>
          <table class="table" style="background-color:#ddd">
            @foreach($top_countries as $tc)
              <tr>
                <td>
                    {{ucwords($tc->country) }}
                </td>
                <td>
                    {{$tc->num_country}}
                </td>
              </tr>
            @endforeach
          </table>
        </div>

      </div>
    </div>
  </section>


  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-12 text-lg-left text-center">
          <h2>
              Latest Donations
            </h2>
        </div>
        <div class="col-lg-9 col-sm-12 text-lg-left text-center">
          <div class="row">

            @foreach($latest_donations as $ld)
            <div class="col-md-2">
                <p>
                  {{ucwords($ld->name)}} <br>
                  <li class="fa fa-bitcoin"></li>{{$ld->btc}} <br>
                  {{$ld->created_at}} 
                </p>
              </div>
            @endforeach
            
          </div>
          

        </div>

      </div>
    </div>
  </section>

  <section class="">
    <div class="container">
      <h2 class="text-center"> TESTIMONIALS</h2>
        <div id="slideshow">
           @foreach($testimonials as $test)
             <div>
                <blockquote>
                  <p>{{$test->message}}</p>
                </blockquote>
               <b>- {{ucwords($test->name)}}</b><small> ( {{$test->created_at}} )</small> 
             </div>
            @endforeach
        </div>

      </div>
    </section>

  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>

<script type="text/javascript">
  $("#slideshow > div:gt(0)").hide();

  setInterval(function() { 
    $('#slideshow > div:first')
      .fadeOut(1000)
      .next()
      .fadeIn(1000)
      .end()
      .appendTo('#slideshow');
  },  5000);
</script>

@endsection
