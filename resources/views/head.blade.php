<x-guest-layout>

    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <h1 id="logo"><a href="/">Computer Science</a></h1>
            <nav id="nav">
                <ul>

                    <li><a href="{{ route('head') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}
                            {{ Auth::user()->surname }}</a></li>

                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main" class=" style1">
            <div>

                <div class="row ">
                    <div class="col-3 col-12-medium">

                        <div class="sidelink">

                            <h3><a href="/dashboard">Administrator</a></h3>
                            <hr>

                            <h5><a href="{{ route('allstudents.index') }}"><i class="fa fa-fw fa-user"></i>
                                    Students</a></h5>
                                    <hr>

                            <h5><a href="{{ route('allstaff.index') }}"><i class="fa fa-fw fa-table"></i> Staffs</a>
                            </h5> <hr>

                            <h5><a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a></h5> <hr>

                            <h5><a href="home">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                            <span class="logOu"> <i class="fa fa-fw fa-power-off"></i>
                                                {{ __('Log out') }}</span>
                                        </x-responsive-nav-link>
                                    </form>
                                </a></h5>

                        </div>


                    </div>
                    <div class="col-9 col-12-medium imp-medium">

                        <!-- Content -->
                        <section id="content">

                            <!-- Page Heading -->
                            <div class="row page-header">
                                <div class="col-8 col-12-medium imp-medium ">

                                    <h1> Welcome to Your Dashboard</h1> 
                                    <small class="userinfo">{{ Auth::user()->name }} {{ Auth::user()->surname }}</small>
                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-6-medium">
                                    <div class="panel">
                                        <div class="panel-heading student-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    {{-- <i class="fa fa-file-text fa-5x"></i> --}}
                                                    <i class="fa fa-user fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9">
                                                    <div><h2>{{ Auth::user()->whereRoleIs('student')->count() }}</h2></div>
                                                    <div class="text-right"><h3>Students</h3></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('allstudents.index') }}">
                                            <div class="panel-footer-student">
                                                <span class="pull-left">View Students</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-6-medium">
                                    <div class="panel">
                                        <div class="panel-heading staff-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    {{-- <i class="fa fa-file-text fa-5x"></i> --}}
                                                    <i class="fa fa-user fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 ">
                                                    <div><h2>{{ Auth::user()->whereRoleIs('staff')->count() }}</h2></div>
                                                    <div class="text-right"><h3>Total staff</h3></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('allstaff.index') }}">
                                            <div class="panel-footer-staff">
                                                <span class="pull-left">View Staffs</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>


    </div>



</x-guest-layout>
