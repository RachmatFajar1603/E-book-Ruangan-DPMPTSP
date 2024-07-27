<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6" enctype="multipart/form-data">
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

        <!-- Dynamic Form Fields -->
        <div id="dynamic-fields" style="display: none;">
            <!-- Common Fields -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-700" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Phone Number')" class="block text-sm font-medium text-gray-700" />
                <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')"
                    required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Internal-specific fields -->
            <div id="internal-fields" style="display: none;">
                <div>
                    <x-input-label for="nip" :value="__('NIP/Noreg')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip"
                        :value="old('nip')" />
                    <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="department" :value="__('Bidang/Bagian')" class="block text-sm font-medium text-gray-700" />
                    <select id="department" name="department"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring focus:ring-gray-700 focus:ring-opacity-50">
                        <option value="">Pilih Bidang/Bagian</option>
                        <option value="DATIN" {{ old('department') == 'DATIN' ? 'selected' : '' }}>DATIN</option>
                        <option value="DALAK" {{ old('department') == 'DALAK' ? 'selected' : '' }}>DALAK</option>
                        <option value="Sekretariat" {{ old('department') == 'Sekretariat' ? 'selected' : '' }}>Sekretariat</option>
                        <option value="SEKSI BIDANG A" {{ old('department') == 'SEKSI BIDANG A' ? 'selected' : '' }}>SEKSI BIDANG A</option>
                        <option value="SEKSI BIDANG B" {{ old('department') == 'SEKSI BIDANG B' ? 'selected' : '' }}>SEKSI BIDANG B</option>
                        <option value="SEKSI BIDANG C" {{ old('department') == 'SEKSI BIDANG C' ? 'selected' : '' }}>SEKSI BIDANG C</option>
                        <option value="SEKSI BIDANG D" {{ old('department') == 'SEKSI BIDANG D' ? 'selected' : '' }}>SEKSI BIDANG D</option>
                    </select>
                    <x-input-error :messages="$errors->get('department')" class="mt-2" />
                </div>
            </div>

            <!-- External-specific fields -->
            <div id="external-fields" style="display: none;">
                <div>
                    <x-input-label for="nik" :value="__('NIK')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik"
                        :value="old('nik')" />
                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address" :value="__('Alamat')" class="block text-sm font-medium text-gray-700" />
                    <textarea id="address" name="address" rows="3"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring focus:ring-gray-700 focus:ring-opacity-50">{{ old('address') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="ktp" :value="__('Upload KTP')" class="block text-sm font-medium text-gray-700" />
                    <input id="ktp" name="ktp" type="file" class="block mt-1 w-full" accept="image/*" />
                    <x-input-error :messages="$errors->get('ktp')" class="mt-2" />
                </div>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                    class="block text-sm font-medium text-gray-700" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <a class="font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            var dynamicFields = document.getElementById('dynamic-fields');
            var internalFields = document.getElementById('internal-fields');
            var externalFields = document.getElementById('external-fields');

            if (this.value === 'internal') {
                dynamicFields.style.display = 'block';
                internalFields.style.display = 'block';
                externalFields.style.display = 'none';
            } else if (this.value === 'external') {
                dynamicFields.style.display = 'block';
                internalFields.style.display = 'none';
                externalFields.style.display = 'block';
            } else {
                dynamicFields.style.display = 'none';
                internalFields.style.display = 'none';
                externalFields.style.display = 'none';
            }
        });
    </script>
</x-guest-layout>
