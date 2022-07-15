{{-- <x-guest-layout>

    <body class="is-preload">
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
            <div id="main" class=" style1">
                <div>

                    <div class="row ">
                        <div class="col-3 col-12-medium">

                            <div class="sidelink">

                                <h3> <a href="/dashboarf">Staff Dashboard</a></h3>
                                <hr>

                                <h5><a href="{{ route('allstudents.index') }}"><i class="fa fa-fw fa-user"></i>
                                        Students</a></h5>
                                        <hr>

                                <h5><a href="result/import"><i class="fa fa-fw fa-table"></i> Upload Result</a></h5>
                                <hr>

                                <h5><a href="#"><i class="fa fa-fw fa-edit"></i> Forms</a></h5>
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

                        </div>
                    </div>
                </div>
            </div>




    </body>
</x-guest-layout>

 --}}

@extends('layouts.admin')
@section('contents')
<div class="d-flex" id="wrapper">
{{-- sidebar --}}
    <div class="bg-white" id="sidebar-wrapper">
       
            <a href="/" class="list-group-item link-success fw-bold sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom">
                Computerscience
            </a>
        <div class="list-group list-group flush my-3">
            <a href="/dashboard" class="list-group-item-action bg-transparent second-text active">
                <i class="fas fa-tachometer-alt me-2"></i>Staff Dashboard
            </a>
            <a href="{{ route('allstudents.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-address-book me-2"></i>Students
            </a>
            <a href="result/import" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-arrow-up-from-bracket"></i> Upload Results
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-edit me-2"></i> Forms
            </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                        <span class="list-group-item list-group-item-action bg-transparent text-danger fw-bold link-danger">
                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Logout
                        </span>
                    </a>
                </form>
            
        </div>
    </div>
    <div class="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Staff Dashboard</h2>
                </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item-dropdown">
                        <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i>{{  Auth::user()->name  }} {{ Auth::user()->surname }}
                    </a>
                    </li>
                </ul>
              </div>
        </nav>
        <div class="container-fluid px-4">
            <div class="row g-5 my-2">
                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                       <a href="" class="text-decoration-none link-dark">
                        <div>
                            <p class="fs-5">Students List</p>
                        </div>
                        <i class="fas fa-address-book  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
                    </div>
                       
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <a href="" class="link-dark text-decoration-none">
                            <div>
                                <p class="fs-5">Upload Result</p>
                            </div>
                            <i class="fa-solid fa-arrow-up-from-bracket fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <a href="" class="text-decoration-none link-dark">
                            <div>
                                <p class="fs-5">Lecture Notes</p>
                            </div>
                            <i class="fa-solid fa-book fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
