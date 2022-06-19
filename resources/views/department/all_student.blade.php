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

                        <!-- <ul class="sidelist"> -->
                        <div class="sidelink">

                            <h3>Administrator</h3> <hr>

                            <h5><a href="{{ route('allstudents.index') }}"><i class="fa fa-fw fa-user"></i>
                                    Students</a></h5> <hr>

                            <h5><a href="{{ route('allstaff.index') }}"><i class="fa fa-fw fa-table"></i>
                                    Staffs</a></h5> <hr>

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
                            

                        
                                {{-- table --}}
                            <div class="table-wrapper">
                                <table class="alt">
                                    <thead>
                                        <tr>
                                            <td>Matric No.</td>
                                            <th>Name</th>
                                            <th>surname</th>
                                            <th>email</th>
                                            <th>Edit</th>
                                            <th><a href="{{ route('allstudents.create') }}" class="button primary small">Add Student</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->matric }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->surname }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td><a href="allstudents/{{ $student->id }}/edit">Edit</a></td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>{{ $students->links() }}</td>
                                        </tr>
                                    </tfoot>
                                    
                                </table>
                                
                            </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    


</x-guest-layout>
