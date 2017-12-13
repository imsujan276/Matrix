@section('title')
    Register - {{ config('app.name', 'Matrix') }}
@endsection

@extends('layouts.front')

@section('content')

          @if (Session::has('referral'))
            <?php
              $ref_name = Session::get('referral')->name;
              $ref_id = Session::get('referral')->id;
            ?>
            @else
            <?php
                $ref_name = "Admin";
                $ref_id = 1;
            ?>
          @endif

<div class="container"  style="margin-top:15px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Register </div>

                <div class="panel-body">

                   {{--  @include('layouts.errors') --}}

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="ref_name" class="col-md-4 control-label">Sponsor/Upline</label>

                            <div class="col-md-6">
                                <input id="ref_name" type="text" class="form-control" name="ref_name" value="{{$ref_name}}" readonly>
                                <input id="sponsor_id" type="hidden" class="form-control" name="sponsor_id" value="{{$ref_id}}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone </label>

                            <div class="col-md-6">
                                <input id="phone" type="test" value="{{ old('phone') }}" class="form-control" name="phone" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country </label>

                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control ">
                                    <option value="" selected>Select Your Country</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="USA">USA</option>
                                </select>
                            </div>
                            @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('security_question') ? ' has-error' : '' }}">
                            <label for="security-question" class="col-md-4 control-label">Security Question *</label>

                            <div class="col-md-6">
                                <input id="security-question" value="{{ old('security_question') }}"type="test" class="form-control" name="security_question" required>
                                @if ($errors->has('security_question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('security_question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('security_answer') ? ' has-error' : '' }}">
                            <label for="security-answer" class="col-md-4 control-label">Security Answer *</label>

                            <div class="col-md-6">
                                <input id="security-answer" value="{{ old('security_answer') }}" type="password" class="form-control" name="security_answer" required>
                                @if ($errors->has('security_answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('security_answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-offset-md-3 col-md-9 ">
                            <span style="color:red">*</span> indicated fields are important for later security features.
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
