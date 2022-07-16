
@extends('layouts.admin')
@section('contents')
<div class="d-flex" id="wrapper">
{{-- sidebar --}}
    <div class="bg-white" id="sidebar-wrapper">
       
            <a href="/" class="list-group-item link-success fw-bold sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom">
                Computerscience
            </a>
        <div class="list-group list-group flush my-3">
            <a href="{{ url('/dashboard') }}" class="list-group-item-action bg-transparent second-text active">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-project-diagram me-2"></i> Admins
            </a>
            <a href="{{ route('allstaff.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-regular fa-user me-2"></i> Staffs
            </a>
            <a href="{{ route('allstudents.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-address-book me-2"></i>Students
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-universal-access me-2"></i> Permissions
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
                    <h2 class="fs-2 m-0">Dashboard</h2>
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
        <div class="container-fluid px-4" >
            <div class="row g-5 my-2">
                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">{{ Auth::user()->whereRoleIs('student')->count() }}</h3>
                            <p class="fs-5">Students</p>
                        </div>
                        <i class="fas fa-address-book  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">{{ Auth::user()->whereRoleIs('staff')->count() }}</h3>
                            <p class="fs-5">Staffs</p>
                        </div>
                        <i
                            class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">{{ Auth::user()->whereRoleIs('administrator')->count() }}</h3>
                            <p class="fs-5">Admins</p>
                        </div>
                        <i class="fas fa-project-diagram fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <h3 class="fs-4 mb-3">All students</h3>
                <h3 ><a href="{{ route('allstudents.create') }}" class="btn btn-success">Add Student</a></h3>

                <div class="col-md-8 ">
                    <table class="table bg-white rounded shadow-sm  table-hover table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Matric</th>
                                <th scope="col">Name</th>
                                {{-- <th scope="col">Surname</th> --}}
                                <th scope="col">Email</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->matric }}</td>
                                <td>{{ $student->name }}</td>
                                {{-- <td>{{ $student->surname }}</td> --}}
                                <td>{{ $student->email }}</td>
                                <td><a href="allstudents/{{ $student->id }}/edit"><button class="btn btn-outline-success btn-sm">Edit</button></a></td>
                                <td> 
                                    <form action="allstudents/{{ $student->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
                    {{-- <h4> {{ $students->links() }}</h4> --}}
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
