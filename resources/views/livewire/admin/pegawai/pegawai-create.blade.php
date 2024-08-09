<div>
    <main class="p-4 sm:ml-64">
        <div class="bg-white p-6 w-full sm:w-4/5 md:w-3/4 lg:w-2/3 xl:w-1/2 shadow-md rounded-lg mx-auto">
            <p class="mb-6 text-center font-semibold font-poppins text-xl mb-10">
                Tambahkan pegawai baru
            </p>
            <form wire:submit.prevent='create'>
                <div class="mb-5">
                    <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP/NOREG</label>
                    <input wire:model="nip" type="text" inputmode="numeric" id="nip"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="nama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA</label>
                    <input wire:model="nama" type="text" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="flex justify-end mt-10">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </form>
        </div>
    </main>
</div>
