<x-guest-layout>

    
        <div id="page-wrapper">

            <!-- Header -->
            <header id="header">
                <h1 id="logo"><a href="/">Computer Science</a></h1>
                <nav id="nav">
                    <ul>

                        <li><a href="/dashboard"><i class="fa fa-user"></i> {{ Auth::user()->name }}
                                {{ Auth::user()->surname }}</a></li>

                    </ul>
                </nav>
            </header>

            <!-- Main -->
            <div id="main" class="style1">
                <div>

                    <div class="row ">
                        <div class="col-3 col-12-medium">

                            <div class="sidelink">

                                <h3> <a href="/dashboard">Student Dashboard</a></h3>
                                <hr>
                                <h5><a href="/student/profile"><i class="fa fa-fw fa-user"></i> Profile</a></h5>
                                <hr>
                                <h5><a href="/student/results"><i class="fa fa-fw fa-table"></i> View Result</a></h5>
                                <hr>
                                <h5><a href="#"><i class="fa fa-fw fa-edit"></i> Courses</a></h5>
                                <hr>
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
                            <x-auth-card>
                                <div id="page-wrapper">
                                    <section>
                                        <h2>Profile</h2>
                                        <form method="post" action="#">
                                            <div class="">
                                                <div class="col-12 col-12-xsmall">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"  />
                                                </div>
                                                <div class="col-12 col-12-xsmall">
                                                    <label for="surname">surname</label>
                                                    <input type="text" name="surname" id="surname" value="{{ Auth::user()->surname  }}"  />
                                                </div>
                                                <div class="col-12 col-12-xsmall formin">
                                                    <label for="surname">Email</label>
                                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"  />
                                                
                                                </div>
                                                
                                                <div class="col-12 col-12-xsmall formin">
                                                    <label for="matric">Matric Number</label>
                                                    <input type="text" name="matric" id="matric" value="{{ Auth::user()->matric }}" />
                                                </div>
                                                
                                                <div class="col-12">
                                                    <a href="/dashboard" class="button primary">Back</a>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </x-auth-card>

                        </div>
                    </div>
                </div>
            </div>

        </div>
</x-guest-layout>

