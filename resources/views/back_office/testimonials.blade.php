@section('title')


Testimonials | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')


<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <li class="fa fa-file-text-o"></li>


                        Testimonials

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

                                <li class="fa fa-file-text-o"></li> Testimonials 

                            </div>

                            <div class="card-block " id="user_body">

								@if(!isset($mine))
									<form  action="{{url('back_office/testimonial', Auth::user()->id)}}" method="POST" >
										{{csrf_field()}}
									  <div class="form-group">
									    <textarea class="form-control" rows="3" name="message" placeholder="Write in your testimonials. Please make it short."></textarea>
									    <p>You can add testimonial only once. So, make it short and simple</p>
									  </div>

									  <button type="submit" class="btn btn-primary">Submit</button>
									</form>

									<br> <br>
								@else
									<div class="alert alert-success">
										You have already submitted your testimonial.
									</div>
								@endif
                                            <table class="table table-striped">
                                                <tbody>
                                                	@foreach($testimonials as $t)
	                                                	<tr>
	                                                		<td>
	                                                			{{$t->message}}
	                                                			<br>
	                                                			@foreach($users as $u)
																	@if($t->user_id == $u->id)
																		<b>- {{ucwords($u->name)}} </b>
																	@endif
	                                                			@endforeach
																&nbsp;&nbsp;&nbsp;
	                                                			{{$t->created_at->toDateString()}}
	                                                		</td>
	                                                	</tr>
                                                	@endforeach
                                                </tbody>
                                            </table>
                            </div>
                                           
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

