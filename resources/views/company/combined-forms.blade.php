@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Sistem Manajemen Gudang</h1>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Laporan Gudang</h5>
                    <a href="{{ route('laporan-gudang.index') }}" class="btn btn-primary mt-auto">Buka Laporan Gudang</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">STPW Form</h5> 
                    <a href="{{ route('stpw.index') }}" class="btn btn-primary mt-auto">Buka STPW Form</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Pencatatan Administrasi Gudang</h5>
                    <a href="{{ route('pencatatan.index') }}" class="btn btn-primary mt-auto">Buka Pencatatan</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center mb-4">Statistik Laporan Gudang</h2>

    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <select id="chartSelector" class="form-select">
                <option value="">Pilih Grafik</option>
                <option value="kecamatan">Kecamatan Gudang</option>
                <option value="kabKota">Kabupaten/Kota Gudang</option>
                <option value="provinsi">Provinsi Gudang</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div id="chartContainer" style="height: 400px;">
                <canvas id="dataChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let chart;
    const chartData = {
        kecamatan: {!! json_encode($kecamatanData) !!},
        kabKota: {!! json_encode($kabKotaData) !!},
        provinsi: {!! json_encode($provinsiData) !!}
    };

    function createChart(data, label) {
        const ctx = document.getElementById('dataChart').getContext('2d');
        
        if (chart) {
            chart.destroy();
        }

        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(item => item.label),
                datasets: [{
                    label: label,
                    data: data.map(item => item.value),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const selector = document.getElementById('chartSelector');
        const chartContainer = document.getElementById('chartContainer');

        selector.addEventListener('change', function() {
            const selectedValue = this.value;
            if (selectedValue) {
                chartContainer.style.display = 'block';
                createChart(chartData[selectedValue], `Jumlah Gudang per ${this.options[this.selectedIndex].text}`);
            } else {
                chartContainer.style.display = 'none';
            }
        });

        // Initially hide the chart
        chartContainer.style.display = 'none';
    });
</script>
@endpush

