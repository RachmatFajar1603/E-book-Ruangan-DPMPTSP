<div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        <div class="bg-white p-2 rounded-md shadow-md flex justify-between items-center">
            <div class="flex flex-col items-center ml-auto">
                <img src="/images/profile.svg" alt="Profile Image" class="w-12 h-12 rounded-full object-cover">
            </div>
        </div>
        
        <!-- Main Content -->
        <main class="flex-grow p-4 sm:ml-64 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
                <h2 class="text-2xl font-bold mb-6">Tambah Pengguna</h2>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="nama_lengkap" class="block text-gray-700">Nama Lengkap *</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">E-mail *</label>
                            <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan E-mail">
                        </div>
                        <div class="mb-4">
                            <label for="nim" class="block text-gray-700">NIP / NO REG *</label>
                            <input type="text" name="nim" id="nim" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan NIP / NIP REG">
                        </div>
                        <div class="mb-4">
                            <label for="no_telepon" class="block text-gray-700">No. Telepon *</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan No. Telepon">
                        </div>
                        <div class="mb-4">
                            <label for="jurusan" class="block text-gray-700">Bidang</label>
                            <select name="jurusan" id="jurusan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                                <option value="" disabled selected>-- Pilih Bidang --</option>
                                <option value="admin">Data dan Informasi</option>
                                <option value="pegawai">Promosi</option>
                                <option value="pegawai">Sekretariat</option>
                                <option value="pegawai">Keuangan</option>
                                <option value="pegawai">Dalak</option>
                                <option value="pegawai">P2IM</option>
                                <option value="pegawai">Perizinan</option>
                                <option value="pegawai">Perizinan_a</option>
                                <option value="pegawai">Perizinan_b</option>
                                <option value="pegawai">Perizinan_c</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700">Role *</label>
                            <select name="role" id="role" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                                <option value="" disabled selected>-- Pilih Role --</option>
                                <option value="admin">Admin Bidang</option>
                                <option value="pegawai">Pegawai</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="kata_sandi" class="block text-gray-700">Kata Sandi *</label>
                            <input type="password" name="kata_sandi" id="kata_sandi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan Kata Sandi">
                        </div>
                        <div class="mb-4">
                            <label for="konfirmasi_kata_sandi" class="block text-gray-700">Konfirmasi Kata Sandi *</label>
                            <input type="password" name="konfirmasi_kata_sandi" id="konfirmasi_kata_sandi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Masukkan Konfirmasi Kata Sandi">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Submit</button>
                        <a href="/datapengguna" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 inline-block">
                            Cancel
                        </a>

                    </div>
                </form>
            </div>
        </main>
    </div>