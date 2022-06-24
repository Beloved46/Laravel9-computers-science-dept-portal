
<x-guest-layout>
    <x-auth-card>
    <div id="page-wrapper">
        <section class="is-preload min-h-screen flex flex-col sm:justify-center items-center">
            <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="col-6 col-12-xsmall formin">
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus />
            </div>

            <!-- Surname -->
            <div class="col-6 col-12-xsmall formin">
                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" placeholder="Surname" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="col-6 col-12-xsmall formin"> 
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <!-- Password -->
            <div class="col-6 col-12-xsmall formin">

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                placeholder="Password"/>
            </div>

            <!-- Confirm Password -->
            <div class="col-6 col-12-xsmall formin">
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required 
                                placeholder="Confirm password"/>
            </div>
            {{-- select option --}}
            <div class="col-6 col-12-xsmall formin">
                <select name="role_id" class="block mt-1 w-full border-gray-300
                focus:border-indigo-300 focus:ring-indigo-200
                focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="" disabled selected>Select category</option>
                <option value="student">Student</option>
                <option value="staff">Staff</option>
                <option value="administrator">Admin</option>
                    
                </select>
            </div> 
             <!-- Matric No. -->
             <div class="col-6 col-12-xsmall formin">
                <x-input id="matric" class="block mt-1 w-full" 
                type="text" name="matric" :value="old('matric')" 
                placeholder="Student Matric No." />
            </div>



            <div class="flex items-center justify-end col-6 col-12-xsmall ">
                <a class="underline text-sm text-white-600 hover:text-white-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        </section>
    </div>
</x-auth-card>
 
    </x-guest-layout> 
    
