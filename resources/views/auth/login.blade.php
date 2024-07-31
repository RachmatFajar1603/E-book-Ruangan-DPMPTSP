<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Role Selection -->
        <div>
            <x-input-label for="role" :value="__('Role')" class="block text-sm font-medium text-gray-700" />
            <select id="role" name="role"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring focus:ring-gray-700 focus:ring-opacity-50"
                required>
                <option value="">Select Role</option>
                <option value="internal">Internal</option>
                <option value="external">External</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- NIP -->
        <div>
            <x-input-label for="nip_reg" :value="__('NIP')" class="block text-sm font-medium text-gray-700" />
            <div class="mt-1">
                <x-text-input id="nip_reg"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-gray-700 focus:outline-none focus:ring-gray-700 sm:text-sm"
                    type="number" name="nip_reg" :value="old('nip_reg')" required autofocus autocomplete="nip" />
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
                    <a href="{{ route('password.request') }}"
                        class="font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">
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

    <!-- Login with Google -->
    <div class="mt-6">
        <div class="relative">
            <div class="relative flex justify-center">
                <span class="px-2 bg-white text-gray-500 ">
                    Dont Have An Account? 
                </span>
                <a href="/register">Register</a>
            </div>
        </div>

        <div class="relative my-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">
                    {{ __('Or continue with') }}
                </span>
            </div>
        </div>

        <div class="mt-6">
            <a href=""
                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z" />
                </svg>
                {{ __('Log in with Google') }}
            </a>
        </div>
    </div>
</x-guest-layout>
