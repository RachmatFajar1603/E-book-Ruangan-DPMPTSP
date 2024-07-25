<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
            <div class="mt-1">
                <x-text-input id="email"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-gray-700 focus:outline-none focus:ring-gray-700 sm:text-sm"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
            <div class="mt-1">
                <x-text-input id="password"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-gray-700 focus:outline-none focus:ring-gray-700 sm:text-sm"
                    type="password" name="password" required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-gray-700 focus:ring-gray-700" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">{{ __('Remember me') }}</label>
            </div>

            @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif
        </div>

        <div>
            <x-primary-button
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gary-700 transition duration-300 ease-in-out">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
