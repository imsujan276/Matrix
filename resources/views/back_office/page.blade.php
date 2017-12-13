@section('title')


Pages | {{ config('app.name', 'Matrix') }}


@endsection

@extends('layouts.back')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/widgEditor.css') }}">
<script src="{{ asset('js/widgEditor.js') }}"></script>


<div id="content" class="bg-container">


    <header class="head">


        <div class="main-bar row">


            <div class="col-xs-6">


                <h4 class="m-t-5">

                     <h4 class="nav_top_align">


                        <li class="fa fa-file-text-o"></li>


                        Pages

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

                                <li class="fa fa-file-text-o"></li> Pages 
                                <p class="pull-right">
                                    <a href="{{url('back_office/page/create') }}" class="btn btn-info btn-sm" > Add Page</a>
                                </p>

                            </div>

                            <div class="card-block " id="user_body">

                                            <table class="table">
                                                <thead class=" card-header">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Slug</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($pages as $p)
                                                        <tr>
                                                            <td>{{ucwords($p->name)}} </td>
                                                            <td>{{($p->slug)}} </td>
                                                            <td>{{$p->created_at->toDateString()}} </td>
                                                            <td>

                                                                <a href="{{url('page')}}/{{$p->slug}}" class="btn btn-success" target="_blank">View</a>
                                                                <a href="{{url('back_office/page/edit')}}/{{$p->id}}" class="btn btn-info">Edit</a>
                                                                <a href="{{url('back_office/page/delete')}}/{{$p->id}}" class="btn btn-danger">Delete</a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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

