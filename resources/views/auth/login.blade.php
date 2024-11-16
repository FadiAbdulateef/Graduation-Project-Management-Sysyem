<x-guest-layout>
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-40 h-40 fill-current text-gray-400" />--}}

{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-flash-message class="mb-4" :errors="$errors" />--}}
{{--        @if(session('error'))--}}
{{--            <span class="text-danger">{{ session('error') }}</span>--}}
{{--        @endif--}}

{{--    </x-auth-card>--}}
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-40 h-40 fill-current text-gray-400"/>
            </a>
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-flash-message class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                         placeholder="البريد الإلكتروني" required autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password">Password</x-label>
                <div class="flex">
                    <x-input id="password" type="password" class="mt-1 w-full rounded-r-none" name="password"
                             placeholder="كلمة المرور" required autocomplete="current-password"/>
                    <span onclick="togglePasswordVisibility()"
                          class="rounded-r-md h-10 mt-1 w-12 bg-gray-800 flex justify-center items-center text-gray-100">
            <i id="togglePasswordIcon" class="fa fa-eye-slash"></i>
        </span>
                </div>
            </div>

            <script>
                function togglePasswordVisibility() {
                    var passwordInput = document.getElementById('password');
                    var togglePasswordIcon = document.getElementById('togglePasswordIcon');
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        togglePasswordIcon.classList.remove('fa-eye-slash');
                        togglePasswordIcon.classList.add('fa-eye');
                    } else {
                        passwordInput.type = "password";
                        togglePasswordIcon.classList.remove('fa-eye');
                        togglePasswordIcon.classList.add('fa-eye-slash');
                    }
                }
            </script>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 space-x-2">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="block space-y-2 mt-2">
                <x-button class="block w-full justify-center">
                    Log in <i class="fas fa-sign-in-alt ml-2"></i>
                </x-button>
                {{--                <a class="flex justify-center items-center w-full py-2 bg-gray-800 border border-transparent rounded-md font-bold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 text-sm"--}}
                {{--                   href="{{ url('auth/github') }}">Log in <i class="fab fa-github ml-2"></i></a>--}}
            </div>

        </form>

    </x-auth-card>
</x-guest-layout>
