@extends('layouts.app')

@section('content')
<div class="container pt-5 px-4 sm:px-6 lg:px-8 mb-8 font-sans">
    <h2 class="text-xl sm:text-2xl font-bold text-sogan mb-10">
        Statistik Penduduk <span class="text-orange-700 font-serif tracking-widest">Dusun Kemiri</span>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 mb-10">
        <div class="bg-white border-l-4 border-kunyit shadow-md rounded-2xl p-5">
            <p class="text-sm text-gray-500">Total Penduduk</p>
            <p class="text-3xl font-bold text-sogan">{{ $totalPenduduk }}</p>
        </div>
        <div class="bg-white border-l-4 border-kunyit shadow-md rounded-2xl p-5">
            <p class="text-sm text-gray-500">Jumlah Kepala Keluarga</p>
            <p class="text-3xl font-bold text-sogan">{{ $jumlahKK }}</p>
        </div>
        <div class="bg-white border-l-4 border-kunyit shadow-md rounded-2xl p-5">
            <p class="text-sm text-gray-500">Jumlah Laki-laki</p>
            <p class="text-3xl font-bold text-sogan">{{ $totalLaki }}</p>
        </div>
        <div class="bg-white border-l-4 border-kunyit shadow-md rounded-2xl p-5">
            <p class="text-sm text-gray-500">Jumlah Perempuan</p>
            <p class="text-3xl font-bold text-sogan">{{ $totalPerempuan }}</p>
        </div>
    </div>

    <div class="bg-kunyit/20 border border-kunyit rounded-2xl p-6 shadow text-sogan mb-8">
        <h3 class="text-xl font-semibold mb-3">Informasi Demografi</h3>
        <p class="text-sm leading-relaxed">
            Dusun Kemiri memiliki jumlah penduduk yang cukup merata antara laki-laki dan perempuan. Jumlah kepala keluarga menunjukkan struktur keluarga yang tersebar dengan baik. Data ini diperbarui secara berkala dan menjadi dasar perencanaan pembangunan dusun.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="py-4">
            <h3 class="text-xl font-semibold mb-4">Grafik Jumlah Warga per RT</h3>
            <canvas id="rtChart" class="w-full max-w-full"></canvas>
        </div>
        <div class="py-4">
            <h3 class="text-xl font-semibold mb-4">Grafik Jumlah Warga per RW</h3>
            <canvas id="rwChart" class="w-full max-w-full"></canvas>
        </div>
    </div>

    <div class="py-4">
        <h3 class="text-xl font-semibold mb-4">Grafik Kelompok Umur Penduduk</h3>
        <div class="overflow-x-auto">
            <canvas id="umurChart" class="w-full max-w-full"></canvas>
        </div>
    </div>

    <div class="py-4">
        <h3 class="text-xl font-semibold mb-6">Data Pekerjaan Warga</h3>
        <div class="grid md:grid-cols-2 gap-6 items-start">
            <div class="overflow-x-auto">
                <table class="min-w-[300px] bg-white border border-kunyit rounded-xl shadow">
                    <thead class="bg-kunyit text-white">
                        <tr>
                            <th class="py-2 px-4 text-left">No</th>
                            <th class="py-2 px-4 text-left">Jenis Pekerjaan</th>
                            <th class="py-2 px-4 text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jumlahPerPekerjaan as $index => $item)
                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $item->pekerjaan }}</td>
                            <td class="py-2 px-4 text-right">{{ $item->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full md:w-[300px]">
                <canvas id="pekerjaanPieChart" class="w-full h-auto"></canvas>
            </div>
        </div>
    </div>

    <div class="py-4">
        <h3 class="text-xl font-semibold mb-4">Data Pendidikan Terakhir</h3>
        <div class="overflow-x-auto">
            <canvas id="pendidikanChart" class="w-full max-h-[400px]"></canvas>
        </div>
    </div>

    <div class="py-4">
        <h3 class="text-xl font-semibold mb-4">Distribusi Agama</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($jumlahPerAgama as $agama => $jumlah)
            <div class="bg-white shadow-md border-l-4 border-kunyit rounded-xl p-5">
                <p class="text-sm text-gray-500">Agama</p>
                <p class="text-xl font-bold text-sogan">{{ $agama }}</p>
                <p class="text-sm mt-2 text-gray-600">Jumlah:
                    <span class="font-semibold">{{ $jumlah }}</span>
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const rtLabels = @json($jumlahPerRt->pluck('rt'));
    const rtData = @json($jumlahPerRt->pluck('total'));
    const rwLabels = @json($jumlahPerRw->pluck('rw'));
    const rwData = @json($jumlahPerRw->pluck('total'));
    const umurData = @json($dataPiramida);
    const pekerjaanLabels = @json($jumlahPerPekerjaan->pluck('pekerjaan'));
    const pekerjaanData = @json($jumlahPerPekerjaan->pluck('total'));
    const pendidikanLabels = @json($jumlahPerPendidikan->pluck('pendidikan_terakhir'));
    const pendidikanData = @json($jumlahPerPendidikan->pluck('total'));

    new Chart(document.getElementById('rtChart'), {
        type: 'bar',
        data: {
            labels: rtLabels,
            datasets: [{
                label: 'Jumlah Warga per RT',
                data: rtData,
                backgroundColor: '#3b82f6'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    new Chart(document.getElementById('rwChart'), {
        type: 'bar',
        data: {
            labels: rwLabels,
            datasets: [{
                label: 'Jumlah Warga per RW',
                data: rwData,
                backgroundColor: '#f59e0b'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    new Chart(document.getElementById('umurChart'), {
        type: 'bar',
        data: {
            labels: umurData.map(d => d.usia),
            datasets: [{
                    label: 'Laki-laki',
                    data: umurData.map(d => -d.laki),
                    backgroundColor: '#38bdf8'
                },
                {
                    label: 'Perempuan',
                    data: umurData.map(d => d.perempuan),
                    backgroundColor: '#f472b6'
                }
            ]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                    ticks: {
                        callback: val => Math.abs(val)
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Penduduk'
                    }
                },
                y: {
                    stacked: true,
                    title: {
                        display: true,
                        text: 'Kelompok Umur'
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.dataset.label}: ${Math.abs(ctx.raw)}`
                    }
                },
                legend: {
                    position: 'top'
                }
            }
        }
    });

    const total = pekerjaanData.reduce((a, b) => a + b, 0);
    const pekerjaanLabelsWithPersen = pekerjaanLabels.map((label, i) => `${label} (${((pekerjaanData[i] / total) * 100).toFixed(1)}%)`);

    new Chart(document.getElementById('pekerjaanPieChart'), {
        type: 'pie',
        data: {
            labels: pekerjaanLabelsWithPersen,
            datasets: [{
                data: pekerjaanData,
                backgroundColor: ['#6a8edb', '#8fd694', '#fcd34d', '#fca5a5', '#c4b5fd', '#34d399', '#fb923c'],
                borderColor: '#ffffff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'right'
                },
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.label}: ${ctx.raw} orang`
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('pendidikanChart'), {
        type: 'bar',
        data: {
            labels: pendidikanLabels,
            datasets: [{
                label: 'Jumlah Warga',
                data: pendidikanData,
                backgroundColor: '#60a5fa'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Warga'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tingkat Pendidikan'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endsection