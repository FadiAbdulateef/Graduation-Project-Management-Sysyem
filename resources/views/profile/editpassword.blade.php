<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link rel="icon" href="{!! asset('images/favicon.ico') !!}"/>
    <title>{{ config('app.name', 'SPMS') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        [x-cloak] {
            display: none;
        }

        .login-box {
            max-width: 400px; /* تحديد العرض الأقصى للصفحة */
            /*max-height: 100px;*/
            margin: auto; /* توسيط الصفحة */
        }
    </style>
{{--    <link rel="icon" href="{!! asset('images/favicon.ico') !!}"/>--}}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>--}}

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
</head>

<body class="login-box">
<div class="font-sans text-active-gray-90000">
    <x-auth-card2>
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-40 h-40 fill-current text-gray-400"/>--}}
{{--            </a>--}}
{{--        </x-slot>--}}
        <!-- Session Status -->
{{--        <x-auth-session-status class="mb-4" :status="session('status')"/>--}}
        <p class="login-box-msg text-center">يجب عليك تغيير كلمة المرور الخاصة بك </p>
        <!-- Validation Errors -->
        <x-flash-message class="mb-4" :errors="$errors"/>
        <form method="POST" action="{{ route('profile.updatepassword') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mt-4">
{{--                <x-label for="password">كلمة المرور</x-label>--}}
                <div>
                    <x-input id="password" type="password" class="mt-1 w-full rounded-r-md" name="password"
                             placeholder="كلمة المرور الجديدة" required autocomplete="current-password" />
                </div>
            </div>
            <div class="mt-4">
{{--                <x-label for="password_confirmation">تأكيد كلمة المرور</x-label>--}}
                <div class="flex">
                    <x-input id="password_confirmation" type="password" class="mt-1 w-full rounded-r-md" name="password-confirmation" autocomplete="confirm-password"
                             placeholder="تأكيد كلمة المرور" required />
                    <span onclick="togglePasswordVisibility('password_confirmation')">
{{--            <i id="togglePasswordIconConfirmation" class="fa fa-eye-slash"></i>--}}
        </span>
                </div>
            </div>

            <script>
                function togglePasswordVisibility(id) {
                    var passwordInput = document.getElementById(id);
                    var togglePasswordIcon = document.getElementById('togglePasswordIcon');
                    if (id === 'password_confirmation') {
                        togglePasswordIcon = document.getElementById('togglePasswordIconConfirmation');
                    }
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

            {{--            <div class="mt-4">--}}
{{--                <x-label for="password">كلمة المرور</x-label>--}}
{{--                <div>--}}
{{--                    <x-input id="password" type="password" class="mt-1 w-full rounded-r-md" name="password"--}}
{{--                             placeholder="كلمة المرور الجديدة" required autocomplete="current-password" />--}}
{{--                    <span onclick="togglePasswordVisibility('password')">--}}
{{--            <i id="togglePasswordIcon" class="fa fa-eye-slash"></i>--}}
{{--        </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation">تأكيد كلمة المرور</x-label>--}}
{{--                <div>--}}
{{--                    <x-input id="password_confirmation" type="password" class="mt-1 w-full rounded-r-md" name="password-confirmation" autocomplete="confirm-password"--}}
{{--                             placeholder="تأكيد كلمة المرور" required />--}}
{{--                    <span onclick="togglePasswordVisibility('password_confirmation')">--}}
{{--            <i id="togglePasswordIconConfirmation" class="fa fa-eye-slash"></i>--}}
{{--        </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <script>--}}
{{--                function togglePasswordVisibility(id) {--}}
{{--                    var passwordInput = document.getElementById(id);--}}
{{--                    var togglePasswordIcon = document.getElementById('togglePasswordIcon');--}}
{{--                    if (id === 'password_confirmation') {--}}
{{--                        togglePasswordIcon = document.getElementById('togglePasswordIconConfirmation');--}}
{{--                    }--}}
{{--                    if (passwordInput.type === "password") {--}}
{{--                        passwordInput.type = "text";--}}
{{--                        togglePasswordIcon.classList.remove('fa-eye-slash');--}}
{{--                        togglePasswordIcon.classList.add('fa-eye');--}}
{{--                    } else {--}}
{{--                        passwordInput.type = "password";--}}
{{--                        togglePasswordIcon.classList.remove('fa-eye');--}}
{{--                        togglePasswordIcon.classList.add('fa-eye-slash');--}}
{{--                    }--}}
{{--                }--}}
{{--            </script>--}}



            {{--            <div class="mt-4">--}}
{{--                <x-label for="password">كلمة المرور</x-label>--}}
{{--                <div>--}}
{{--                    <x-input id="password" type="password" class="mt-1 w-full rounded-r-md" name="password"--}}
{{--                             placeholder="كلمة المرور الجديدة" required autocomplete="current-password" />--}}
{{--                    <span onclick="togglePasswordVisibility()">--}}
{{--        </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password-">تأكيد كلمة المرور</x-label>--}}
{{--                <div>--}}
{{--                    <x-input id="password" type="password" class="mt-1 w-full rounded-r-md" name="password-confirmation" autocomplete="confirm-password"--}}
{{--                             placeholder="تأكيد كلمة المرور" required />--}}
{{--                    <span onclick="togglePasswordVisibility()">--}}
{{--        </span>--}}
{{--                </div>--}}
{{--            </div>--}}
<br>


{{--                        <div class="mt-4">--}}
{{--                <x-label for="password">تأكيد كلمة المرور</x-label>--}}
{{--                <div class="flex">--}}
{{--                    <x-input id="password" type="password" class="mt-1 w-full rounded-r-md"--}}
{{--                             name="password-confirmation" autocomplete="confirm-password"--}}
{{--                             placeholder="Password" required/>--}}
{{--                    <span onclick="togglePasswordVisibility()"--}}
{{--                          class="rounded-l-md h-10 mt-1 w-12 bg-gray-800 flex justify-center items-center text-gray-100">--}}
{{--            <i id="togglePasswordIcon" class="fa fa-eye-slash"></i>--}}
{{--                </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password">تأكيد كلمة المرور</x-label>--}}
{{--                <div class="flex">--}}
{{--                    <x-input id="password" type="password" class="mt-1 w-full rounded-r-md"--}}
{{--                             name="password-confirmation" autocomplete="confirm-password"--}}
{{--                             placeholder="Password" required/>--}}
{{--                    <span onclick="togglePasswordVisibility()">--}}
{{--            <i id="togglePasswordIcon" class="fa fa-eye-slash"></i>--}}
{{--                </span>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <script>--}}
{{--                function togglePasswordVisibility() {--}}
{{--                    var passwordInput = document.getElementById('password');--}}
{{--                    var togglePasswordIcon = document.getElementById('togglePasswordIcon');--}}
{{--                    if (passwordInput.type === "password") {--}}
{{--                        passwordInput.type = "text";--}}
{{--                        togglePasswordIcon.classList.remove('fa-eye-slash');--}}
{{--                        togglePasswordIcon.classList.add('fa-eye');--}}
{{--                    } else {--}}
{{--                        passwordInput.type = "password";--}}
{{--                        togglePasswordIcon.classList.remove('fa-eye');--}}
{{--                        togglePasswordIcon.classList.add('fa-eye-slash');--}}
{{--                    }--}}
{{--                }--}}
{{--            </script>--}}
            <!-- Remember Me -->
            <div class="block space-y-2 mt-2">
                <x-button class="block w-full justify-center">
                    حفظ <i class="fas ml-2"></i>
                </x-button>
            </div>
        </form>

    </x-auth-card2>
</div>
</body>
</html>
