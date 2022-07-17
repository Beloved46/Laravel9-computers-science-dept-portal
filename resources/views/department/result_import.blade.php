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
                <i class="fa-solid fa-edit me-2"></i> Handouts
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
            <h3 class="text-secondary mt-5">upload result in csv or xlxs in format: Course_code|matric|score|grade</h3>
            <p class="text-secondary fst-italic fs-5">"all students must be registered before result is uploaded"</p>

            <div class="card-body mt-5 me-5" style="background-color: #034f38">
                    <div class="card-header text-light"><h5>Upload Result Here</h5></div>
                    @if (session()->has('failures'))
                    <div class="table-wrapper">
                        <table class="alt">
                            <tr>
                                <th>Row</th>
                                <th>Attributes</th>
                                <th>Errors</th>
                                <th>Values</th>
                            </tr>
                            @foreach (session()->get('failures') as $error)
                            <tr>
                                <td>{{ $error->row() }}</td>
                                <td>{{ $error->attribute() }}</td>
                                <td>
                                   <ul>
                                    @foreach ($error->errors() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                   </ul>
                                </td>
                                <td>{{ $error->values()[$error->attribute()] }}</td>
                            </tr>
                                
                            @endforeach
                        </table></div>                        
                @endif
                        
                            @if (session('status'))
                                <div class="alert alert-light bg-success fs-5" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                    <form method="POST" action="/results/import" accept=".xlsx,.xls,.csv" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 mt-5">
                        <div class="col-md-6">
                            <input  type="file" class="form-control"  name="result_file" required>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
