    <x-admin-layout>
        <x-admin-sidebar :admin="$admin">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
            <main class="p-4 md:ml-64 h-auto pt-20">
                <div class="container mx-auto">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h1 class="text-left text-3xl font-bold tracking-tight text-gray-900">Rekap Laporan </h1>

                        <div class="bg-white shadow mb-10">
                            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 items-center">
                                <canvas id="myChart"></canvas>

                                <br>
                                <table class="border border-gray-300 mx-auto w-full mb-12">
                                    <tr class="bg-black text-white ">
                                        <th id="font" class="border border-gray-300 text-left px-4 py-2">No</th>
                                        <th id="font" class="border border-gray-300 text-left px-4 py-2">Total
                                            Pendapatan</th>
                                        <th id="font" class="border border-gray-300 text-left px-4 py-2">Semester
                                        </th>
                                    </tr>
                                    <?php
                                    $data = [['no' => 1, 'pendapatan' => 550000000, 'semester' => 'Semester Ganjil 2024'], ['no' => 2, 'pendapatan' => 680000000, 'semester' => 'Semester Genap 2024']];
                                    foreach ($data as $row) {
                                        echo "<tr>
                                                                                                                                                                        <td class='border border-gray-300 text-left px-4 py-2'>{$row['no']}</td>
                                                                                                                                                                        <td class='border border-gray-300 text-left px-4 py-2'>{$row['pendapatan']}</td>
                                                                                                                                                                        <td class='border border-gray-300 text-left px-4 py-2'>{$row['semester']}</td>
                                                                                                                                                                      </tr>";
                                    }
                                    ?>
                                </table>

                                <table class="border border-gray-300 mx-auto w-full mb-12">
                                    <tr class="bg-black text-white ">
                                        <th id="font" class="border border-gray-300 text-left px-4 py-2">Total
                                            Pendapatan</th>
                                    </tr>
                                    <?php
                                    $summary = [
                                        'pendapatan' => 4500000,
                                    ];
                                    echo "<tr>
                                                                                                                                                                    <td class='border border-gray-300 text-left px-4 py-2'>{$summary['pendapatan']}</td>
                                                                                                                                                                  </tr>";
                                    ?>
                                </table>
                                <script>
                                    const semester = ["Semester Ganjil 2024", "Semester Genap 2024"];
                                    const dataPendapatan = [550000000, 680000000];
                                    const ctx = document.getElementById("myChart").getContext('2d');
                                    new Chart(ctx, {
                                        type: "bar",
                                        data: {
                                            labels: semester,
                                            datasets: [{
                                                label: "Total Pendapatan",
                                                data: dataPendapatan,
                                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                borderWidth: 1,
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
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </x-admin-sidebar>
    </x-admin-layout>
