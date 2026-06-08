<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        
        <!-- Logo Area -->
        <div class="mb-8 flex items-center gap-3 font-bold text-3xl tracking-tight justify-center text-gray-900">
            <span>AvcPg</span>
        </div>

        <!-- Clean Card Container -->
        <div class="w-full sm:max-w-md mt-2 px-8 py-10 bg-white border border-gray-200 overflow-hidden sm:rounded-2xl shadow-sm">
            
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                <p class="text-sm text-gray-500">Please enter your details to sign in.</p>
            </div>

            <x-validation-errors class="mb-6" />

            @session('status')
                <div class="mb-6 font-medium text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg p-3 text-center">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email Address') }}</label>
                    <input id="email" class="block w-full rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm px-4 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@company.com" />
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-indigo-600 hover:text-indigo-500 font-medium transition-colors" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>
                    <input id="password" class="block w-full rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm px-4 py-3" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                </div>

                <div class="flex items-center">
                    <label for="remember_me" class="flex items-center cursor-pointer">
                        <input type="checkbox" id="remember_me" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                        <span class="ms-3 text-sm text-gray-600">{{ __('Keep me logged in') }}</span>
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all hover:shadow-lg">
                        {{ __('Sign In') }}
                    </button>
                </div>
            </form>
            
            <div class="mt-8 text-center text-sm text-gray-500">
                Don't have an account? <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors">Contact Administrator</a>
            </div>
        </div>
        
        <!-- Footer text -->
        <div class="mt-8 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} AvcPg. All rights reserved.
        </div>
    </div>
</x-guest-layout>
