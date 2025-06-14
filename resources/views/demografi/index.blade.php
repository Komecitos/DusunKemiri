@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Piramida Penduduk Berdasarkan Usia dan Jenis Kelamin</h3>
    <canvas id="piramidaChart" height="400"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = @json($data);

    const labels = data.map(item => item.usia);
    const dataLaki = data.map(item => item.laki);
    const dataPerempuan = data.map(item => item.perempuan);

    new Chart(document.getElementById('piramidaChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Laki-laki',
                    data: dataLaki,
                    backgroundColor: '#3490dc',
                },
                {
                    label: 'Perempuan',
                    data: dataPerempuan,
                    backgroundColor: '#ff6384',
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
                        callback: function(value) {
                            return Math.abs(value);
                        }
                    }
                },
                y: {
                    stacked: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${Math.abs(context.raw)}`;
                        }
                    }
                }
            }
        }
    });
</script>

<hr class="my-5">

<h4 class="mb-3">Sebaran Tingkat Pendidikan Warga</h4>
<canvas id="pendidikanChart" height="200"></canvas>

<script>
    const pendidikanLabels = @json($pendidikan->pluck('pendidikan'));
    const pendidikanData = @json($pendidikan->pluck('jumlah'));

    new Chart(document.getElementById('pendidikanChart'), {
        type: 'bar',
        data: {
            labels: pendidikanLabels,
            datasets: [{
                label: 'Jumlah Warga',
                data: pendidikanData,
                backgroundColor: '#38bdf8',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
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
            }
        }
    });
</script>

@endsection