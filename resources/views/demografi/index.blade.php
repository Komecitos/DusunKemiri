@extends('layouts.app')

@section('content')

<canvas id="usiaPieChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('usiaPieChart').getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Anak (<18)', 'Dewasa (18-59)', 'Lansia (60+)'],
            datasets: [{
                // data: @json([$anak, $dewasa, $lanjutUsia]),
                backgroundColor: [
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribusi Usia Penduduk'
                },
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>




@endsection