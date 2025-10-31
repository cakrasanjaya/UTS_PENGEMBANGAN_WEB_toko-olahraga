@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">
    <div class="container py-5">
        <!-- Header Dashboard -->
        <div class="dashboard-header text-center mb-5">
            <div class="header-icon mb-3">
                <i class="bi bi-speedometer2"></i>
            </div>
            <h1 class="display-4 fw-bold gradient-text mb-2">Dashboard Toko Olahraga</h1>
            <p class="text-muted fs-5">Monitor aktivitas dan statistik toko Anda</p>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-5">
            <!-- Card Total Produk -->
            <div class="col-lg-3 col-md-6">
                <div class="stat-card card-blue" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="stat-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="stat-info">
                            <p class="stat-label">Total Produk</p>
                            <h2 class="stat-value">{{ $totalProducts }}</h2>
                        </div>
                    </div>
                    <div class="card-shine"></div>
                </div>
            </div>

            <!-- Card Total Supplier -->
            <div class="col-lg-3 col-md-6">
                <div class="stat-card card-green" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="stat-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div class="stat-info">
                            <p class="stat-label">Total Supplier</p>
                            <h2 class="stat-value">{{ $totalSuppliers }}</h2>
                        </div>
                    </div>
                    <div class="card-shine"></div>
                </div>
            </div>

            <!-- Card Stok Masuk -->
            <div class="col-lg-3 col-md-6">
                <div class="stat-card card-yellow" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="stat-icon">
                            <i class="bi bi-box-arrow-in-down"></i>
                        </div>
                        <div class="stat-info">
                            <p class="stat-label">Stok Masuk</p>
                            <h2 class="stat-value">{{ $totalStockIn }}</h2>
                        </div>
                    </div>
                    <div class="card-shine"></div>
                </div>
            </div>

            <!-- Card Stok Keluar -->
            <div class="col-lg-3 col-md-6">
                <div class="stat-card card-red" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="stat-icon">
                            <i class="bi bi-box-arrow-up"></i>
                        </div>
                        <div class="stat-info">
                            <p class="stat-label">Stok Keluar</p>
                            <h2 class="stat-value">{{ $totalStockOut }}</h2>
                        </div>
                    </div>
                    <div class="card-shine"></div>
                </div>
            </div>
        </div>

        <!-- Total Stok Banner -->
        <div class="total-stock-banner" data-aos="zoom-in">
            <div class="banner-content">
                <i class="bi bi-graph-up-arrow"></i>
                <div class="banner-text">
                    <p class="banner-label">Total Stok Keseluruhan</p>
                    <h3 class="banner-value">{{ $stokTersedia }} <span>Unit</span></h3>
                </div>
            </div>
            <div class="banner-decoration">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="chart-card" data-aos="fade-up">
                    <div class="chart-header">
                        <div class="header-content">
                            <i class="bi bi-bar-chart-fill me-2"></i>
                            <h5 class="mb-0">Analisis Stok Masuk vs Stok Keluar</h5>
                        </div>
                        <div class="header-badge">
                            <span>Live</span>
                        </div>
                    </div>
                    <div class="chart-body">
                        <canvas id="stockChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard Wrapper */
.dashboard-wrapper {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

/* Dashboard Header */
.dashboard-header .header-icon {
    display: inline-block;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #000000ff 0%, #000000ff 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    animation: pulse-icon 2s ease-in-out infinite;
}

.dashboard-header .header-icon i {
    font-size: 2.5rem;
    color: white;
}

@keyframes pulse-icon {
    0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7); }
    50% { transform: scale(1.05); box-shadow: 0 0 0 20px rgba(102, 126, 234, 0); }
}

.gradient-text {
    background: linear-gradient(135deg, #000000ff 0%, #000000ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Stat Cards */
.stat-card {
    position: relative;
    height: 160px;
    border-radius: 20px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.9;
    transition: opacity 0.3s ease;
}

.stat-card:hover .card-overlay {
    opacity: 1;
}

.card-blue .card-overlay { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.card-green .card-overlay { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
.card-yellow .card-overlay { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
.card-red .card-overlay { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }

.card-content {
    position: relative;
    z-index: 2;
    padding: 1.5rem;
    height: 100%;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    color: white;
}

.stat-icon {
    font-size: 3rem;
    opacity: 0.9;
    transition: transform 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: rotate(10deg) scale(1.1);
}

.stat-info {
    flex: 1;
}

.stat-label {
    font-size: 0.95rem;
    font-weight: 500;
    opacity: 0.95;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.stat-value {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
    line-height: 1;
}

.card-shine {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg);
    transition: all 0.5s ease;
}

.stat-card:hover .card-shine {
    left: 100%;
}

/* Total Stock Banner */
.total-stock-banner {
    position: relative;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 25px;
    padding: 2.5rem;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
    margin-bottom: 2rem;
}

.banner-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 2rem;
    color: white;
}

.banner-content > i {
    font-size: 4rem;
    opacity: 0.9;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.banner-text {
    flex: 1;
    text-align: center;
}

.banner-label {
    font-size: 1.1rem;
    font-weight: 500;
    opacity: 0.95;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.banner-value {
    font-size: 3.5rem;
    font-weight: 700;
    margin: 0;
    line-height: 1;
}

.banner-value span {
    font-size: 1.5rem;
    font-weight: 400;
    opacity: 0.8;
}

.banner-decoration {
    position: absolute;
    top: 0;
    right: 0;
    width: 300px;
    height: 100%;
    opacity: 0.1;
}

.circle {
    position: absolute;
    border-radius: 50%;
    background: white;
}

.circle-1 {
    width: 150px;
    height: 150px;
    top: -30px;
    right: -30px;
}

.circle-2 {
    width: 100px;
    height: 100px;
    top: 50%;
    right: 50px;
}

.circle-3 {
    width: 80px;
    height: 80px;
    bottom: -20px;
    right: 100px;
}

/* Chart Card */
.chart-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.chart-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
}

.chart-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-content {
    display: flex;
    align-items: center;
    font-size: 1.2rem;
    font-weight: 600;
}

.header-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.4rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    backdrop-filter: blur(10px);
}

.header-badge span {
    position: relative;
}

.header-badge span::before {
    content: '';
    position: absolute;
    left: -15px;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: #4ade80;
    border-radius: 50%;
    animation: blink 1.5s ease-in-out infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.3; }
}

.chart-body {
    padding: 2rem;
}

/* Responsive */
@media (max-width: 768px) {
    .stat-card {
        height: 140px;
    }
    
    .stat-icon {
        font-size: 2.5rem;
    }
    
    .stat-value {
        font-size: 2rem;
    }
    
    .banner-content {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .banner-content > i {
        font-size: 3rem;
    }
    
    .banner-value {
        font-size: 2.5rem;
    }
}
</style>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- AOS Animation CDN -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // Chart Configuration
    const ctx = document.getElementById('stockChart').getContext('2d');
    
    // Gradient colors
    const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
    gradient1.addColorStop(0, 'rgba(102, 126, 234, 0.8)');
    gradient1.addColorStop(1, 'rgba(118, 75, 162, 0.3)');
    
    const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
    gradient2.addColorStop(0, 'rgba(250, 112, 154, 0.8)');
    gradient2.addColorStop(1, 'rgba(254, 225, 64, 0.3)');
    
    const stockChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Stok Masuk', 'Stok Keluar'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $totalStockIn }}, {{ $totalStockOut }}],
                backgroundColor: [gradient1, gradient2],
                borderWidth: 0,
                borderRadius: 15,
                barThickness: 80
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { 
                    display: false 
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 15,
                    borderWidth: 1,
                    borderColor: 'rgba(255, 255, 255, 0.1)',
                    displayColors: false,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 16
                    },
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' Unit';
                        }
                    }
                }
            },
            scales: {
                y: { 
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 12
                        },
                        padding: 10
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 13,
                            weight: 'bold'
                        },
                        padding: 10
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
</script>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection