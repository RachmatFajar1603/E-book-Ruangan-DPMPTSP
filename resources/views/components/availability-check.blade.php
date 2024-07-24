<div class="max-w-5xl mx-auto p-6 sm:p-8 bg-white rounded-lg shadow-lg my-12 sm:my-16">
    <form action="" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-end">
            <div class="w-full">
                <label for="tanggal_awal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Awal</label>
                <div class="relative">
                    <input type="date" id="tanggal_awal" name="tanggal_awal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        placeholder="dd/mm/yyyy" required>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="tanggal_akhir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Akhir</label>
                <div class="relative">
                    <input type="date" id="tanggal_akhir" name="tanggal_akhir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        placeholder="dd/mm/yyyy" required>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="gedung" class="block mb-2 text-sm font-medium text-gray-900">Gedung</label>
                <select id="gedung" name="gedung"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                    <option selected>-- Pilih Gedung --</option>
                    <option value="gedung_a">Gedung A</option>
                    <option value="gedung_b">Gedung B</option>
                    <option value="gedung_c">Gedung C</option>
                </select>
            </div>
            <div class="w-full sm:col-span-2 lg:col-span-1">
                <button type="submit"
                    class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full px-5 py-3 text-center transition duration-300 ease-in-out">
                    Check
                </button>
            </div>
        </div>
    </form>
</div>
