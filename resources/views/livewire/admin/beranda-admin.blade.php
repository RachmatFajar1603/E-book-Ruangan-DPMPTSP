<div>
    <main class="p-4 sm:ml-64">
        <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-600">
            <!-- Your existing cards -->
            <div class="bg-white p-8 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Ruangan</p>
                    <p class="text-3xl mt-3">{{ $ruangs->count() }}</p>
                    <p class="text-xl mt-2">Total Ruangan</p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-blue-300 rounded-md text-green-300" alt="">
                </div>
            </div>

            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Pengguna</p>
                    <p class="text-3xl mt-3">{{ $pengguna}}</p>
                    <p class="text-xl mt-2">Total Pengguna</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Bidang Icon">
                </div>
            </div>

            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Bidang</p>
                    <p class="text-3xl mt-3">{{$bidang}}</p>
                    <p class="text-xl mt-2">Total Bidang</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Bidang Icon">
                </div>
            </div>

            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Peminjaman</p>
                    <p class="text-3xl mt-3">{{ $sumall }}</p>
                    <p class="text-xl mt-2">Total Peminjaman</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-5 w-5" alt="Calendar Icon">
                </div>
            </div>
        </div>

      <!-- Updated section for charts -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-600">

<!-- Statistik Peminjaman Ruangan -->
<div class="bg-white p-8 rounded-md shadow-md">
    <p class="text-2xl mb-4">Statistik Peminjaman Ruangan</p>
    <canvas id="myBarChart"></canvas>
</div>

<!-- Pengguna Per Bidang -->
<div class="bg-white p-8 rounded-md shadow-md">
    <p class="text-2xl mb-4">Pengguna Per Bidang</p>
    <canvas id="barChartBidang"></canvas>
</div>
</div>

<div class="flex justify-center">
<div class="mt-8 w-full">
    <!-- Select Year Dropdown -->
    <div class="mb-4 flex items-center">
        <label for="yearSelect" class="block text-xl font-medium text-gray-700 mr-4">Select Year:</label>
        <select id="yearSelect" wire:model="selectedYear" class="mt-1 block w-32 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @for ($year = 2024; $year <= 2030; $year++)
                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
        </select>
    </div>

    <!-- Total Peminjaman Ruangan per Bulan -->
    <div class="bg-white p-8 rounded-md shadow-md">
        <p class="text-2xl mb-4">Total Peminjaman Ruangan per Bulan</p>
        <canvas id="barChartMonthly"></canvas>
    </div>
</div>
</div>

<!-- External CSS and JavaScript -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Statistik Peminjaman Ruangan
var ctx = document.getElementById('myBarChart').getContext('2d');
var chartColors = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)'
    // Add more colors if needed
];

var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Jumlah Peminjaman',
            data: @json($chartValues),
            backgroundColor: function(context) {
                var index = context.dataIndex;
                return chartColors[index % chartColors.length];
            },
            borderColor: function(context) {
                var index = context.dataIndex;
                return chartColors[index % chartColors.length];
            },
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                min: 0,
                max: 30,
                ticks: {
                    stepSize: 1,
                    callback: function(value) {
                        return value; // Remove decimals
                    }
                }
            }
        }
    }
});

// Pengguna Per Bidang
const barCtxBidang = document.getElementById('barChartBidang').getContext('2d');
const chartBidangLabels = @json($chartBidangLabels);
const chartBidangValues = @json($chartBidangValues);

new Chart(barCtxBidang, {
    type: 'bar',
    data: {
        labels: chartBidangLabels,
        datasets: [{
            label: '# Pengguna Ruangan Per Bidang',
            data: chartBidangValues,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                // Add more colors if needed
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                // Add more colors if needed
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 30 // Set max value for y-axis
            }
        }
    }
});

// Total Peminjaman Ruangan per Bulan
const barCtxMonthly = document.getElementById('barChartMonthly').getContext('2d');
const chartMonthlyLabels = ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];
const chartMonthlyValues = @json(array_values($chartMonthlyValues));

new Chart(barCtxMonthly, {
    type: 'bar',
    data: {
        labels: chartMonthlyLabels,
        datasets: [{
            label: '# Peminjaman Ruangan per Bulan',
            data: chartMonthlyValues,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                // Add more colors if needed
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                // Add more colors if needed
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 50 // Set max value for y-axis
            }
        }
    }
});
</script>


</div>