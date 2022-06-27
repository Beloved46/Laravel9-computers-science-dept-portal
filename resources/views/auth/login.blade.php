
<x-guest-layout>
    <x-auth-card>

    <div id="page-wrapper">
    <section class="is-preload min-h-screen flex flex-col sm:justify-center items-center">
        <img class=" image w-20 h-20 " src="images/overtime.png" alt="logo">
        <!-- Session Status -->
        <x-auth-session-status class="col-6 col-12-xsmall" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="col-6 col-12-xsmall" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div >
            
                <!-- Email Address -->
                <div class="col-6 col-12-xsmall formin">
                    <x-input id="email"  type="email" name="email" :value="old('email')"  placeholder="Email" required autofocus />
                </div>

            
                <!-- Password -->
                <div class="col-6 col-12-xsmall formin">
                    <x-input id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    placeholder="Password" />
                </div>

                <!-- Remember Me -->
                {{-- <div class="col-6 col-12-medium">
                    <label for="remember_me" class="inline-flex items-center">
                        <x-input id="remember_me" type="checkbox" name="remember"/>
                        <span class="ml-2 text-sm text-white-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}
            
                <div class="flex items-center justify-end col-6 col-12-xsmall">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-white-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                
                    <div class="col-12">
                    <x-button class="ml-3">
                        {{ __('Log in') }}
                    </x-button>
                    </div>
            </div>
        </form>
    </section>
    </div>
</x-auth-card>

</x-guest-layout> 
