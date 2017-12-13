@section('title')


Add Page | {{ config('app.name', 'Matrix') }}


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


                        Add New Page

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

                                <li class="fa fa-file-text-o"></li> Add Page 

                            </div>

                            <div class="card-block " id="user_body">
                                        <form action="{{url('back_office/page/create')}}" method="POST" class="form-horizontal">

                                          {{csrf_field()}}

                                                 <table class="table">
                                                     <tr>
                                                        <th>
                                                        Name
                                                        </th>
                                                         <td>
                                                         <input type="text" name="name" class="form-control" placeholder="Page Name" autofocus>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                        <th>
                                                        Slug
                                                        </th>
                                                        <td>
                                                        <input type="text" name="slug" placeholder="Page Slug with no space" class="form-control" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                         Content
                                                        </th>
                                                        <td>
                                                        <textarea name="content" id="page_content" class="widgEditor"></textarea>
                                                         </td>
                                                    </tr>
                                            </table>
                                 
                                        <button type="submit" class="btn btn-info">Save</button>
                                      </form>

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

