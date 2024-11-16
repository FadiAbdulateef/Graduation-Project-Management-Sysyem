<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
            {{ __('هل نسيت كلمة المرور الخاصة بك؟ لا تقلق. فضلاً حدد بريدك الإلكتروني لتلقي رابط استعادة كلمة المرور التي سوف تساعدك في اختيار كلمة مرور جديدة') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-flash-message class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="text-right">
                <x-label for="email" :value="__('البريد الإلكتروني')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
{{--                    {{ __('Email Password Reset Link') }}--}}
                    {{ __('رابط إعادة تعيين كلمة مرور البريد الإلكتروني') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
