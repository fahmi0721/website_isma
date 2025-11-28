{{-- resources/views/dashboard/keuangan.blade.php --}}
@extends('layouts.app')

@section('title','Dashboard PT INTAN SEJAHTERA UTAMA')

@section('css')
     {{-- Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
@endsection

@section('content')
<div class="container-fluid">
    <div class="mb-3 d-flex align-items-center mt-4">
    <h5 class="mb-0">Dashboard Keuangan</h5>
</div>

<div class="container-fluid py-4">

    {{-- Cards Summary --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Total Pengunjung</h6>
                    <h3 class="mb-0">{{ number_format($totalVisitors) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Pengunjung Hari Ini</h6>
                    <h3 class="mb-0">{{ number_format($todayVisitors) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Pengunjung Bulan Ini</h6>
                    <h3 class="mb-0">{{ number_format($monthVisitors) }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart + Map --}}
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h6 class="mb-0">Pengunjung 30 Hari Terakhir</h6>
                    <small class="text-muted">
                        {{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}
                    </small>
                </div>
                <div class="card-body">
                    <canvas id="chartVisitors" height="120"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h6 class="mb-0">Peta Lokasi Pengunjung</h6>
                </div>
                <div class="card-body">
                    <div id="visitorsMap" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Browser & Device --}}
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h6 class="mb-0">Top Negara</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartCountry" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h6 class="mb-0">Browser</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartBrowser" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h6 class="mb-0">Device</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartDevice" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- Leaflet JS --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    // Data dari controller (Laravel) -> JS
    const dailyLabels   = @json($dailyVisitors->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M')));
    const dailyTotals   = @json($dailyVisitors->pluck('total'));

    const countryLabels = @json($byCountry->pluck('country'));
    const countryTotals = @json($byCountry->pluck('total'));

    const browserLabels = @json($byBrowser->pluck('browser'));
    const browserTotals = @json($byBrowser->pluck('total'));

    const deviceLabels  = @json($byDevice->pluck('device'));
    const deviceTotals  = @json($byDevice->pluck('total'));

    const locations     = @json($locations);

    // Line chart visitors
    const ctxVisitors = document.getElementById('chartVisitors').getContext('2d');
    new Chart(ctxVisitors, {
        type: 'line',
        data: {
            labels: dailyLabels,
            datasets: [{
                label: 'Pengunjung',
                data: dailyTotals,
                borderWidth: 2,
                fill: false,
                tension: 0.2
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Country chart (bar)
    const ctxCountry = document.getElementById('chartCountry').getContext('2d');
    new Chart(ctxCountry, {
        type: 'bar',
        data: {
            labels: countryLabels,
            datasets: [{
                label: 'Pengunjung',
                data: countryTotals,
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: { beginAtZero: true }
            }
        }
    });

    // Browser chart (pie)
    const ctxBrowser = document.getElementById('chartBrowser').getContext('2d');
    new Chart(ctxBrowser, {
        type: 'pie',
        data: {
            labels: browserLabels,
            datasets: [{
                label: 'Browser',
                data: browserTotals
            }]
        }
    });

    // Device chart (doughnut)
    const ctxDevice = document.getElementById('chartDevice').getContext('2d');
    new Chart(ctxDevice, {
        type: 'doughnut',
        data: {
            labels: deviceLabels,
            datasets: [{
                label: 'Device',
                data: deviceTotals
            }]
        }
    });

    // Leaflet Map
    const map = L.map('visitorsMap').setView([0, 118], 4); // Fokus Indonesia
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    locations.forEach(loc => {
        if (loc.lat && loc.lng) {
            L.marker([loc.lat, loc.lng]).addTo(map)
                .bindPopup((loc.city ?? '') + ' ' + (loc.country ?? ''));
        }
    });
</script>
@endsection
