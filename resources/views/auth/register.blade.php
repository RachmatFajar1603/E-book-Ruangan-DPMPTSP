<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-700" />
            <div class="mt-1">
                <x-text-input id="name"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-gray-700 focus:outline-none focus:ring-gray-700 sm:text-sm"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
            <div class="mt-1">
                <x-text-input id="email"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-gray-700 focus:outline-none focus:ring-gray-700 sm:text-sm"
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
            <div class="mt-1">
                <x-text-input id="password"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-gray-700 focus:outline-none focus:ring-gray-700 sm:text-sm"
                    type="password" name="password" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                class="block text-sm font-medium text-gray-700" />
            <div class="mt-1">
                <x-text-input id="password_confirmation"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-gray-700 focus:outline-none focus:ring-gray-700 sm:text-sm"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <div class="text-sm">
                <a class="font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <x-primary-button
                class="ml-4 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 transition duration-300 ease-in-out">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
