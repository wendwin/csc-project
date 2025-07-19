{{-- HANDLE BY PUTRA --}}
@extends('layouts.adminlayout')

@section('content')
    <h2 class="mb-4 text-2xl font-bold text-gray-800">Dashboard</h2>
      
    <div class="flex flex-wrap gap-6">
        {{-- Total Users --}}
        <div class="relative flex-1 min-w-[200px] p-4 bg-white shadow rounded-xl">
            <div class="absolute p-4 text-purple-600 bg-purple-100 rounded-2xl top-4 right-4">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
            <h3 class="text-sm text-gray-500">Total Users</h3>
            <p class="text-[28px] font-semibold text-black mt-2">{{ $totalUsers }}</p>
            <div class="flex items-center gap-1 mt-8">
                @if ($growth >= 0)
                    <i data-lucide="trending-up" class="w-4 h-4 text-green-500"></i>
                    <p class="text-sm text-green-600">
                        {{ number_format($growth, 1) }}% <span class="text-gray-500">Up from yesterday</span>
                    </p>
                @else
                    <i data-lucide="trending-down" class="w-4 h-4 text-red-500"></i>
                    <p class="text-sm text-red-600">
                        {{ number_format(abs($growth), 1) }}% <span class="text-gray-500">Down from yesterday</span>
                    </p>
                @endif
            </div>
        </div>

        {{-- Artikel CSC --}}
        <div class="relative flex-1 min-w-[200px] p-4 bg-white shadow rounded-xl">
            <div class="absolute p-2 bg-yellow-100 top-4 right-4 rounded-2xl">
                <img src="{{ asset('img/logindashboard/csc.png') }}" class="w-10 h-10" alt="Logo CSC">
            </div>
            <h3 class="text-sm text-gray-500">Total Artikel CSC</h3>
            <p class="text-[28px] font-semibold text-black mt-2">{{ $totalArticlesCsc }}</p>
            <div class="flex items-center gap-1 mt-8">
                @if ($growthCsc >= 0)
                    <i data-lucide="trending-up" class="w-4 h-4 text-green-500"></i>
                    <p class="text-sm text-green-600">
                        {{ number_format($growthCsc, 1) }}% <span class="text-gray-500">Up from past week</span>
                    </p>
                @else
                    <i data-lucide="trending-down" class="w-4 h-4 text-red-500"></i>
                    <p class="text-sm text-red-600">
                        {{ number_format(abs($growthCsc), 1) }}% <span class="text-gray-500">Down from past week</span>
                    </p>
                @endif
            </div>
        </div>

        {{-- Artikel Pustaka Pemda --}}
        <div class="relative flex-1 min-w-[200px] p-4 bg-white shadow rounded-xl">
            <div class="absolute p-2 bg-blue-100 top-4 right-4 rounded-2xl">
                <img src="{{ asset('img/logindashboard/logo PustakaPemda 1.png') }}" class="w-10 h-10" alt="Logo Pemda">
            </div>
            <h3 class="text-sm text-gray-500">Total Artikel Pustaka Pemda</h3>
            <p class="text-[28px] font-semibold text-black mt-2">{{ $totalArticlesPemda }}</p>
            <div class="flex items-center gap-1 mt-8">
                @if ($growthPemda >= 0)
                    <i data-lucide="trending-up" class="w-4 h-4 text-green-500"></i>
                    <p class="text-sm text-green-600">
                        {{ number_format($growthPemda, 1) }}% <span class="text-gray-500">Up from yesterday</span>
                    </p>
                @else
                    <i data-lucide="trending-down" class="w-4 h-4 text-red-500"></i>
                    <p class="text-sm text-red-600">
                        {{ number_format(abs($growthPemda), 1) }}% <span class="text-gray-500">Down from yesterday</span>
                    </p>
                @endif
            </div>
        </div>

        {{-- Artikel PSPI --}}
        <div class="relative flex-1 min-w-[200px] p-4 bg-white shadow rounded-xl">
            <div class="absolute p-2 bg-orange-100 top-4 right-4 rounded-2xl">
                <img src="{{ asset('img/logindashboard/pspi.png') }}" class="w-10 h-10" alt="Logo PSPI">
            </div>
            <h3 class="text-sm text-gray-500">Total Artikel PSPI</h3>
            <p class="text-[28px] font-semibold text-black mt-2">{{ $totalArticlesPspi }}</p>
            <div class="flex items-center gap-1 mt-8">
                @if ($growthPspi >= 0)
                    <i data-lucide="trending-up" class="w-4 h-4 text-green-500"></i>
                    <p class="text-sm text-green-600">
                        {{ number_format($growthPspi, 1) }}% <span class="text-gray-500">Up from yesterday</span>
                    </p>
                @else
                    <i data-lucide="trending-down" class="w-4 h-4 text-red-500"></i>
                    <p class="text-sm text-red-600">
                        {{ number_format(abs($growthPspi), 1) }}% <span class="text-gray-500">Down from yesterday</span>
                    </p>
                @endif
            </div>
        </div>
    </div>

    {{-- Statistik Artikel Bulanan --}}
<div class="p-6 mt-6 bg-white shadow rounded-xl">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-xl font-semibold text-gray-800">Jumlah Artikel</h3>
        <select id="websiteSelect" class="px-3 py-1 text-sm border border-gray-300 rounded">
            <option value="all">Semua Website</option>
            @foreach ($monthlyArticleStats->pluck('target_website')->unique() as $website)
                <option value="{{ $website }}">{{ strtoupper($website) }}</option>
            @endforeach
        </select>
    </div>

    <canvas id="monthlyChart" height="100"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const rawData = @json($monthlyArticleStats);
    const monthLabels = @json($monthLabels);

    const datasetsMap = {};

    rawData.forEach(stat => {
        const website = stat.target_website;
        const month = stat.month;
        const total = stat.total;

        if (!datasetsMap[website]) {
            datasetsMap[website] = Array(12).fill(0);
        }
        datasetsMap[website][month - 1] = total;
    });

    const allDatasets = Object.entries(datasetsMap).map(([website, data], i) => ({
        label: website.toUpperCase(),
        data: data,
        fill: true,
        tension: 0.4,
        borderColor: ['#3b82f6', '#f59e0b', '#10b981'][i % 3],
        backgroundColor: ['#dbeafe', '#fef3c7', '#d1fae5'][i % 3],
        pointRadius: 4,
        pointHoverRadius: 6
    }));

    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        responsive: true,
        maintainAspectRatio: false,
        data: {
            labels: Object.values(monthLabels),
            datasets: allDatasets
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.parsed.y} artikel`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    });

    document.getElementById('websiteSelect').addEventListener('change', function () {
        const selected = this.value;

        if (selected === 'all') {
            chart.data.datasets = allDatasets;
        } else {
            chart.data.datasets = allDatasets.filter(d => d.label.toLowerCase() === selected);
        }
        chart.update();
    });
   


   
</script>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.effect(() => {
            const sidebar = Alpine.store('sidebarOpen') ?? true;
            setTimeout(() => {
                chart.resize();
            }, 300);
        });
    });
</script>
<style>
    canvas {
        display: block;
        max-width: 100%;
        height: auto;
    }
</style>




@endsection
