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
                        <input wire:model="nip_reg" type="number" name="nama_lengkap" id="nama_lengkap" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan NIP Anda">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold">E-mail *</label>
                        <input wire:model="email" type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan E-mail">
                    </div>
                    <div class="mb-4">
                        <label for="nim" class="block text-gray-700 font-semibold">NAMA</label>
                        <input  wire:model="nama" type="text" name="nim" id="nim" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan Nama Anda">
                    </div>
                    <div class="mb-4">
                        <label for="no_telepon" class="block text-gray-700 font-semibold">No. Telepon *</label>
                        <input wire:model="telepon" type="text" name="no_telepon" id="no_telepon" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan No. Telepon">
                    </div>
                    <div class="mb-4">
                        <label for="jurusan" class="block text-gray-700 font-semibold">Bidang</label>
                        <select wire:model="bidang_id" name="jurusan" id="jurusan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <option value="" disabled selected>-- Pilih Bidang --</option>
                            @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-semibold">KETERANGAN *</label>
                        <select wire:model="keterangan" name="role" id="role" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <option value="" disabled selected>-- Pilih KETERANGAN --</option>
                            <option value="internal">INTERNAL</option>
                            <option value="eksternal">EKSTERNAL</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-semibold">Role *</label>
                        <select wire:model="role" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <option value="" disabled selected>-- Pilih Role --</option>
                            <option value="admin">Admin Bidang</option>
                            <option value="admin">Admin</option>
                            <option value="kepala dinas">Kepala Dinas</option>
                            <option value="pegawai">Pegawai</option>

                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="kata_sandi" class="block text-gray-700 font-semibold">Kata Sandi *</label>
                        <input wire:model="password" type="password" name="kata_sandi" id="kata_sandi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan Kata Sandi">
                    </div>
                    <div class="mb-4">
                        <label for="konfirmasi_kata_sandi" class="block text-gray-700 font-semibold">Konfirmasi Kata Sandi *</label>
                        <input type="password" name="konfirmasi_kata_sandi" id="konfirmasi_kata_sandi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan Konfirmasi Kata Sandi">
                    </div>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Submit</button>
                    <a wire:navigate href="/datapengguna" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 inline-block">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>