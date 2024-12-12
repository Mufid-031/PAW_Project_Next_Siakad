<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold mb-6">Laporan Akademik</h1>
            <div class="bg-white rounded-lg shadow mb-8">
                <div class="p-6">
                    <div class=" mb-4">
                        <h2 class="text-xl font-bold">Nilai Terkini</h2>
                        <span class="text-red-500">* Data ini diperbarui setiap 3 tahun sekali</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        Mata Kuliah</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        2022</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        2023</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        2024</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                        Rata-rata</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Pemrograman Web</td>
                                    <td class="px-6 py-4 whitespace-nowrap">82</td>
                                    <td class="px-6 py-4 whitespace-nowrap">85</td>
                                    <td class="px-6 py-4 whitespace-nowrap">88</td>
                                    <td class="px-6 py-4 whitespace-nowrap">85</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Basis Data</td>
                                    <td class="px-6 py-4 whitespace-nowrap">80</td>
                                    <td class="px-6 py-4 whitespace-nowrap">83</td>
                                    <td class="px-6 py-4 whitespace-nowrap">86</td>
                                    <td class="px-6 py-4 whitespace-nowrap">83</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Algoritma</td>
                                    <td class="px-6 py-4 whitespace-nowrap">78</td>
                                    <td class="px-6 py-4 whitespace-nowrap">81</td>
                                    <td class="px-6 py-4 whitespace-nowrap">84</td>
                                    <td class="px-6 py-4 whitespace-nowrap">81</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Grafik Performa Akademik</h2>
                    <div class="h-96">
                        <canvas id="academicChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('academicChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['2021', '2022', '2023'],
                    datasets: [{
                        label: 'Pemrograman Web',
                        data: [10, 85, 88],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }, {
                        label: 'Basis Data',
                        data: [80, 83, 86],
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1
                    }, {
                        label: 'Algoritma',
                        data: [78, 81, 84],
                        borderColor: 'rgb(153, 102, 255)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 10,
                            max: 100
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Perkembangan Nilai Per Tahun (2021-2023)'
                        }
                    }
                }
            });
        </script>
    </x-admin-sidebar>
</x-admin-layout>
