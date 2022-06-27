<x-guest-layout>

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
            <x-auth-card>

                <section class="col-8 col-8-medium imp-medium">
                    <div class="card-header"><h1>Upload Result Here</h1></div>
                    <!-- Session Status -->
                    <x-auth-session-status class="col-6 col-12-xsmall" :status="session('status')" />
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="col-6 col-12-xsmall" :errors="$errors" />

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

                    <form method="post" action="/results/import" accept=".xlsx,.xls,.csv" enctype="multipart/form-data">
                        @csrf
                        
                        <div >
                        
                            <div class="col-6 col-12-xsmall formin">
                                <x-input type="file" name="result_file" required/>
                            </div>
                            
                                <div class="col-12">
                                <x-button class="ml-3">
                                    {{ __('Upload') }}
                                </x-button>
                                </div>
                        </div>
                    </form>
                </section>
                
            </x-auth-card>
            
            </div>

    </body>
</x-guest-layout>
