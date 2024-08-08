<div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <!-- Main Content -->
    <main class="flex-grow p-4 sm:ml-64">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full h-full">
            <h2 class="text-2xl font-bold mb-6">Tambah Pengguna</h2>
            <form wire:submit.prevent='create'>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="nama_lengkap" class="block text-gray-700 font-semibold">NIP / NO REG *</label>
                        <input wire:model.lazy="nip_reg" id="nip_reg" type="text" name="nama_lengkap" id="nama_lengkap"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                            placeholder="Masukkan NIP Anda" required onkeyup="checkNip(this.value)" />
                        @error('nip_reg') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold">E-mail *</label>
                        <input wire:model="email" type="email" name="email" id="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                            placeholder="Masukkan E-mail">
                        @error('email') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nim" class="block text-gray-700 font-semibold">NAMA</label>
                        <input wire:model.lazy="nama" id="nama" type="text" name="nim"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                            placeholder="Nama akan terisi otomatis" readonly>
                        @error('nama') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="no_telepon" class="block text-gray-700 font-semibold">No. Telepon *</label>
                        <input wire:model="telepon" type="text" name="no_telepon" id="no_telepon"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                            placeholder="Masukkan No. Telepon">
                        @error('telepon') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jurusan" class="block text-gray-700 font-semibold">Bidang</label>
                        <select wire:model="bidang_id" name="jurusan" id="jurusan"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <option value="" selected>-- Pilih Bidang --</option>
                            @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                            @endforeach
                        </select>
                        @error('bidang_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-semibold">KETERANGAN *</label>
                        <select wire:model="keterangan" name="role" id="role"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <option value="" selected>-- Pilih KETERANGAN --</option>
                            <option value="INTERNAL">INTERNAL</option>
                            <!-- set option eksternal inactive -->
                            <option value="EKSTERNAL" disabled>EKSTERNAL</option>
                        </select>
                        @error('keterangan') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="selectedRole" class="block text-gray-700 font-semibold">Role *</label>
                        <select wire:model="selectedRole" name="selectedRole" id="selectedRole"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <option value="" selected>-- Pilih Role --</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedRole') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kata_sandi" class="block text-gray-700 font-semibold">Kata Sandi *</label>
                        <input wire:model="password" type="password" name="kata_sandi" id="kata_sandi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                            placeholder="Masukkan Kata Sandi">
                        @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex space-x-4">
                    <button type="submit"
                        class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Submit</button>
                    <a wire:navigate href="/datapengguna"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 inline-block">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
<script>
    function checkNip(nip) {
        if (nip.length > 0) {
            fetch(`/check-nip/${nip}`)
                .then(response => response.json())
                .then(data => {
                    if (data.nama) {
                        document.getElementById('nama').value = data.nama;
                        // Update Livewire component's nama property
                        Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).set('nama',
                            data.nama);
                    } else {
                        document.getElementById('nama').value = '';
                        Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).set('nama',
                        '');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat memeriksa NIP');
                });
        } else {
            document.getElementById('nama').value = '';
            Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).set('nama', '');
        }
    }

</script>
