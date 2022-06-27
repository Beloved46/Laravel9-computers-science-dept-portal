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

                            <h3><a href="/dashborad">Administrator</a></h3>
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
                        </section>

                    </div>
                </div>
            </div>
        </div>


    </div>



</x-guest-layout>
