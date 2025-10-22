@extends('dashboard.layouts.app')

@section('container')
    <div class="container mx-auto grid px-6">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">

            <div class="shadow-xs flex items-center rounded-lg bg-white p-4 dark:bg-gray-800">
                <div class="mr-4 rounded-full bg-orange-100 p-3 text-orange-500 dark:bg-orange-500 dark:text-orange-100">
                    <i class="ri-table-fill text-xl"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Kriteria
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $kriteria->count() }}
                    </p>
                </div>
            </div>

            <div class="shadow-xs flex items-center rounded-lg bg-white p-4 dark:bg-gray-800">
                <div class="mr-4 rounded-full bg-blue-100 p-3 text-blue-500 dark:bg-blue-500 dark:text-blue-100">
                    <i class="ri-layout-3-fill text-xl"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Kategori
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $kategori }}
                    </p>
                </div>
            </div>

            <div class="shadow-xs flex items-center rounded-lg bg-white p-4 dark:bg-gray-800">
                <div class="mr-4 rounded-full bg-green-100 p-3 text-green-500 dark:bg-green-500 dark:text-green-100">
                    <i class="ri-collage-fill text-xl"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Sub Kriteria
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $subKriteria }}
                    </p>
                </div>
            </div>

            <div class="shadow-xs flex items-center rounded-lg bg-white p-4 dark:bg-gray-800">
                <div class="mr-4 rounded-full bg-teal-100 p-3 text-teal-500 dark:bg-teal-500 dark:text-teal-100">
                    <i class="ri-braces-fill text-xl"></i>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Alternatif
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $alternatif->count() }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-8 grid gap-6 md:grid-cols-2">
            <div class="shadow-xs min-w-0 rounded-lg bg-white p-4 dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Sistem Informasi Data Penilaian Kinerja Karyawan
                </h4>
                <p class="mb-3 text-justify text-gray-600 dark:text-gray-400">
                    AHP merupakan suatu model pendukung keputusan yang dikembangkan oleh <b>Thomas L. Saaty</b>. Model
                    pendukung
                    keputusan ini akan menguraikan masalah multi faktor atau multi kriteria yang kompleks menjadi suatu
                    hirarki yang didefinisikan sebagai suatu representasi dari sebuah permasalahan yang kompleks dalam suatu
                    struktur multi-level dimana level pertama adalah tujuan, yang diikuti level faktor, kriteria, sub
                    kriteria, dan seterusnya ke bawah hingga level terakhir dari alternatif.
                </p>
                <a class="group text-sm font-semibold leading-normal text-gray-600 dark:text-gray-300"
                    href="{{ route('kriteria') }}">
                    Mulai
                    <i
                        class="ri-arrow-right-line ease-bounce group-hover:translate-x-1.25 ml-1 text-sm leading-normal transition-all duration-200"></i>
                </a>
            </div>
            <div class="shadow-xs min-w-0 rounded-lg bg-purple-600 p-4 text-white">
                <h4 class="mb-4 font-semibold">
                    Kegunaan AHP (Analytical Hierarchy Process):
                </h4>
                <ul style="list-style-type: square;" class="mx-5 mb-3">
                    <li>Struktur yang berhirarki, sebagai konsekuesi dari kriteria yang dipilih, sampai pada sub kriteria
                        yang paling dalam.</li>
                    <li>Memperhitungkan validitas sampai dengan batas toleransi inkonsistensi berbagai kriteria dan
                        alternatif yang dipilih oleh pengambil keputusan.</li>
                    <li>Memperhitungkan daya tahan output analisis sensitivitas pengambilan keputusan.</li>
                </ul>
                <a class="group text-sm font-semibold leading-normal" href="{{ route('kriteria') }}">
                    Mulai
                    <i
                        class="ri-arrow-right-line ease-bounce group-hover:translate-x-1.25 ml-1 text-sm leading-normal transition-all duration-200"></i>
                </a>
            </div>
        </div>

        <div class="mb-8 grid gap-6">
            <div class="shadow-xs min-w-0 rounded-lg bg-white p-4 dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Hasil Penilaian Kinerja Karyawan AHP (Line Chart)
                </h4>
                <canvas id="line"></canvas>
                <div class="mt-4 flex justify-center space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex items-center">
                        <span class="mr-1 inline-block h-3 w-3 rounded-full bg-[#0694a2]"></span>
                        <span>Alternatif</span>
                    </div>
                </div>
            </div>
            <div class="shadow-xs min-w-0 rounded-lg bg-white p-4 dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Hasil Penilaian Kinerja Karyawan AHP (Pie Chart)
                </h4>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md flex flex-col items-center">
                    <h5 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Persentase Penilaian (%)</h5>
                    <div style="width: 400px; height: 400px;">
                        <canvas id="pie"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        Chart.register(ChartDataLabels);

        let hasilSolusiData = [];
        let hasilNilaiData = [];

        @foreach ($hasilSolusi as $item)
            hasilSolusiData.push('{{ $item->nama_alternatif }}');
            hasilNilaiData.push({{ $item->nilai }});
        @endforeach

        const lineConfig = {
            type: 'line',
            data: {
                labels: hasilSolusiData,
                datasets: [{
                    label: 'Nilai Alternatif',
                    backgroundColor: '#0694a2',
                    borderColor: '#0694a2',
                    data: hasilNilaiData,
                    fill: false,
                    tension: 0.1,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                return 'Nilai: ' + context.parsed.y.toFixed(3);
                            }
                        }
                    },

                    datalabels: {
                        display: false
                    }
                },
                interaction: {
                    mode: 'nearest',
                    intersect: true,
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Alternatif',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Nilai',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        beginAtZero: true
                    },
                },
            },
        };

        const pieConfig = {
            type: 'pie',
            data: {
                labels: hasilSolusiData,
                datasets: [{
                    label: 'Nilai Alternatif',
                    data: hasilNilaiData,
                    backgroundColor: [
                        '#FF3F7F', '#1D24CA', '#FFCC00', '#7ADAA5', 
                        '#8C00FF', '#FFC400', '#52D3D8', '#F7E987',
                    ],
                    borderWidth: 1,
                    hoverOffset: 10,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 10
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#333',
                            font: { size: 12 }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.chart._metasets[0].total;
                                const value = context.parsed;
                                const percentage = ((value / total) * 100).toFixed(2) + '%';
                                return context.label + ': ' + value.toFixed(3) + ' (' + percentage + ')';
                            }
                        }
                    },

                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value, context) => {
                            const total = context.chart._metasets[0].total;
                            const percentage = ((value / total) * 100).toFixed(1);
                            return percentage + '%';
                        }
                    },
                },
            },
        };

        // --- INISIALISASI CHART ---
        const lineCtx = document.getElementById('line');
        const pieCtx = document.getElementById('pie');

        new Chart(lineCtx, lineConfig);
        new Chart(pieCtx, pieConfig);
    </script>
@endsection
