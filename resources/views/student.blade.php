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
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="/student/profile" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-regular fa-user me-2"></i>  Profile
            </a>
            <a href="/student/results" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-file-lines"></i> View Result
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-address-book me-2"></i>Courses
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-book me-2"></i> Handouts
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
                    <h2 class="fs-2 m-0"> Student Dashboard</h2>
                </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              
              <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
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
        
    </div>
</div>
@endsection
