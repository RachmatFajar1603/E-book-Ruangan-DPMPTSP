<div>
    <main class="p-4 sm:ml-64">
        <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-600">
            <div class="bg-white p-8 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Ruangan</p>
                    <p class="text-3xl mt-3">0</p>
                    <p class="text-xl mt-2">Total Ruangan</p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-blue-300 rounded-md text-green-300" alt="">
                </div>
            </div>

            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Pengguna</p>
                    <p class="text-3xl mt-3">0</p>
                    <p class="text-xl mt-2">Total Pengguna</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Bidang Icon">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Bidang</p>
                    <p class="text-3xl mt-3">0</p>
                    <p class="text-xl mt-2">Total Bidang</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Bidang Icon">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Peminjaman</p>
                    <p class="text-3xl mt-3">0</p>
                    <p class="text-xl mt-2">Total Peminjaman</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-5 w-5" alt="Calendar Icon">
                </div>
            </div>
        </div>
        
        <!-- New section for charts -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-600">
            <div class="bg-white p-8 rounded-md shadow-md">
                <p class="text-2xl mb-4">Statistik Peminjaman Ruangan</p>
                <canvas id="barChart"></canvas>
            </div>
            <div class="bg-white p-8 rounded-md shadow-md">
                <p class="text-2xl mb-4">Pengguna Per Bidang</p>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </main>

    <!-- External CSS and JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: '# of Peminjaman',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

       const pieCtx = document.getElementById('pieChart').getContext('2d');

// Set canvas size
document.getElementById('pieChart').width = 50;
document.getElementById('pieChart').height = 50;

const pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: [
            'DALAK', 'DATIN', 'P2IPM', 'SEKRETARIAT', 'PROMOSI', 
            'KEUANGAN', 'PERIZINAN_A', 'PERIZINAN_B', 'PERIZINAN_C', 'PERIZINAN_D'
        ],
        datasets: [{
            label: '# of Users',
            data: [12, 19, 3, 5, 2, 7, 8, 6, 4, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});

    </script>
</div>
