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
                <option value="INTERNAL">Internal</option>
                <option value="EXTERNAL" disabled>External</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Dynamic Form Fields -->
        <div id="dynamic-fields" style="display: none;">
            <!-- Internal-specific fields -->
            <div id="internal-fields" style="display: none;">
                <div>
                    <x-input-label for="nip" :value="__('NIP/NOREG')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="nip_reg" class="block mt-1 w-full" type="text" name="nip_reg"
                        :value="old('nip_reg')" required onkeyup="checkNip(this.value)" />
                    <x-input-error :messages="$errors->get('nip_reg')" class="mt-2" />
                </div>
            </div>

            <!-- Common Fields -->
            <div>
                <x-input-label for="nama" :value="__('Name')" class="block text-sm font-medium text-gray-700" />
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('name')" required
                    autofocus autocomplete="nama" readonly />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="telepon" :value="__('Phone Number')"
                    class="block text-sm font-medium text-gray-700" />
                <x-text-input id="telepon" class="block mt-1 w-full" type="tel" name="telepon" :value="old('telepon')"
                    required />
                <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
            </div>

            <!-- Internal-specific fields (Bidang) -->
            <div id="internal-fields-2" style="display: none;">
                <div class="mt-4">
                    <x-input-label for="bidang" :value="__('Bidang/Bagian')"
                        class="block text-sm font-medium text-gray-700" />
                    <select id="bidang_id" name="bidang_id"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring focus:ring-gray-700 focus:ring-opacity-50">
                        <option value="">Pilih Bidang/Bagian</option>
                        @foreach ($bidang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('bidang')" class="mt-2" />
                </div>
            </div>

            <!-- External-specific fields -->
            <div id="external-fields" style="display: none;">
                <div>
                    <x-input-label for="nik" :value="__('NIK')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" />
                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address" :value="__('Alamat')"
                        class="block text-sm font-medium text-gray-700" />
                    <textarea id="address" name="address" rows="3"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring focus:ring-gray-700 focus:ring-opacity-50">{{ old('address') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="ktp" :value="__('Upload KTP')"
                        class="block text-sm font-medium text-gray-700" />
                    <input id="ktp" name="ktp" type="file" class="block mt-1 w-full" accept="image/*" />
                    <x-input-error :messages="$errors->get('ktp')" class="mt-2" />
                </div>
            </div>

            <!-- Password fields -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                    class="block text-sm font-medium text-gray-700" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <span>
                        Sudah punya akun?
                    </span>
                    <a class="font-semibold text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out"
                        href="{{ route('login') }}">
                        Login
                    </a>
                </div>

                <x-primary-button class="ml-4 mt-4" type="submit">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>

    <script>
        function checkNip(nip) {
            if (nip.length > 0) {
                fetch(`/check-nip/${nip}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.nama) {
                            document.getElementById('nama').value = data.nama;
                        } else {
                            document.getElementById('nama').value = '';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('nama').value = '';
            }
        }

        document.getElementById('role').addEventListener('change', function () {
            var dynamicFields = document.getElementById('dynamic-fields');
            var internalFields = document.getElementById('internal-fields');
            var internalFields2 = document.getElementById('internal-fields-2');
            var externalFields = document.getElementById('external-fields');

            // Clear the nama field when changing roles
            document.getElementById('nama').value = '';

            if (this.value === 'INTERNAL') {
                dynamicFields.style.display = 'block';
                internalFields.style.display = 'block';
                internalFields2.style.display = 'block';
                externalFields.style.display = 'none';
            } else if (this.value === 'EXTERNAL') {
                dynamicFields.style.display = 'block';
                internalFields.style.display = 'none';
                internalFields2.style.display = 'none';
                externalFields.style.display = 'block';
            } else {
                dynamicFields.style.display = 'none';
                internalFields.style.display = 'none';
                internalFields2.style.display = 'none';
                externalFields.style.display = 'none';
            }
        });

    </script>
</x-guest-layout>
