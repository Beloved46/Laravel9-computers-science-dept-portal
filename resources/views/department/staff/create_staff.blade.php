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

                            <h3>Administrator</h3> <hr>

                            <h5><a href="{{ route('allstudents.index') }}"><i class="fa fa-fw fa-user"></i>
                                    Students</a></h5> <hr>

                            <h5><a href="{{ route('allstaff.index') }}"><i class="fa fa-fw fa-table"></i> Staffs</a> <hr>
                            </h5>

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
                        <div id="page-wrapper">
                            <section class="is-preload  flex flex-col sm:justify-center items-center">
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" action="{{ route('allstaff.store') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="col-12 col-12-xsmall formin">
                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                            :value="old('name')" placeholder="Name" required autofocus />
                                    </div>

                                    <!-- Surname -->
                                    <div class="col-6 col-12-xsmall formin">
                                        <x-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                                            :value="old('surname')" placeholder="Surname" required autofocus />
                                    </div>


                                    <!-- Email Address -->
                                    <div class="col-6 col-12-xsmall formin">
                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                            :value="old('email')" placeholder="Email" required />
                                    </div>

                                    <!-- Password -->
                                    <div class="col-6 col-12-xsmall formin">

                                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                            required autocomplete="new-password" placeholder="Password" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-6 col-12-xsmall formin">
                                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                            name="password_confirmation" required placeholder="Confirm password" />
                                    </div>

                                    <x-button class="ml-4">
                                        {{ __('Register Staff') }}
                                    </x-button>
                        </div>
                        </form>

                        </section>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
