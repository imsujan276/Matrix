<!-- /#top -->


<div class="wrapper">


    <div id="left" class="sticky">


        <div class="media user-media bg-dark dker">


            <div class="user-media-toggleHover">
                <span class="fa fa-user"></span>


            </div>


            <div class="user-wrapper bg-dark">


                <a class="user-link" href="javascript:void(0);">


                    <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"


                         src="{{ asset('img/'.Auth::user()->avatar) }}">


                    <p class="text-white user-info">Welcome {{ ucwords(Auth::user()->name) }}</p>


                </a>

            </div>


        </div>



        <!-- #menu -->


        <ul id="menu" class="bg-blue dker" >


            <li class=" ">


                <a href="{{ url('back_office') }}">


                    <i class="fa fa-home"></i>


                    <span class="link-title">&nbsp;Dashboard</span>

                </a>


            </li>

            <li>


                <a href="{{ url('back_office/profile') }}">


                    <i class="fa fa-user"></i>


                    <span class="link-title">&nbsp;My Profile</span>


                    <span class="tag tag-pill tag-primary float-xs-right calendar_tag"></span>


                </a>


            </li>

            <!-- referrals start-->


            <li>


                <a href="{{ url('back_office/referrals') }}">

                    <i class="fa fa-user-plus"></i>

                    <span class="link-title">&nbsp; My Referrals</span>

                </a>

            </li>

            <!-- referrals ends-->

            <!-- facility start-->


            <li>


                <a href="javascript:;">

                    <i class="fa fa-money"></i>

                    <span class="link-title">&nbsp; Financial</span>

                    <span class="fa arrow"></span>

                </a>

                <ul>

                    <li>

                        <a href="{{ url('back_office/wallet') }}">
                            <i class="fa fa-angle-right"></i> 
                            &nbsp; Wallet
                        </a>

                    </li>
                    <li>

                        <a href="{{ url('back_office/upgrade') }}">
                            <i class="fa fa-angle-right"></i> 
                            &nbsp; Upgrade
                        </a>

                    </li>
                    <li>

                        <a href="{{ url('back_office/donation') }}">
                            <i class="fa fa-angle-right"></i> 
                            &nbsp; Donations
                        </a>

                    </li>

                </ul>

            </li>

            


            <!-- promotion start-->


            <li>


                <a href="{{ url('back_office/promotion') }}">

                    <i class="fa fa-bullhorn"></i>

                    <span class="link-title">&nbsp; My Link</span>

                </a>

            </li>

            <!-- promotion ends-->

            <!-- testimonial -->

            <li>


                <a href="{{ url('back_office/testimonial') }}">

                    <i class="fa fa-pencil"></i>

                    <span class="link-title">&nbsp; Add Your Testimonial</span>

                </a>

            </li>


            <!-- testimonial end -->

@if(Auth::user()->id == 1)
            <!-- Pages start-->


            <li>


                <a href="{{ url('back_office/pages') }}">

                    <i class="fa fa-file-text-o"></i>

                    <span class="link-title">&nbsp; Pages</span>

                </a>

            </li>

            <!-- pages ends-->

@endif
            <!-- buses starts -->

{{--             <li>


                <a href="{{ url('back_office/support') }}">

                    <i class="fa fa-ticket "></i>

                    <span class="link-title">&nbsp; Support</span>

                </a>

            </li> --}}


            <!-- support end -->

            <!-- buses starts -->

{{--             <li>


                <a href="{{ url('back_office/news') }}">

                    <i class="fa fa-newspaper-o "></i>

                    <span class="link-title">&nbsp; News</span>

                </a>

            </li> --}}


            <!-- news end -->

            <!-- logout starts -->

            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

            </li>


            <!-- logout end -->

        </ul>


        <!-- /#menu -->


    </div>


    <!-- /#left -->
