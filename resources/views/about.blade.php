@extends('layouts.app')

@section('content')
<div class="about-wrapper">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="hero-content">
                        <span class="badge-text">Tentang Kami</span>
                        <h1 class="hero-title">Toko Olahraga Sans Store</h1>
                        <p class="hero-description">
                            Menyediakan berbagai perlengkapan olahraga mulai dari sepatu, bola, 
                            raket, hingga alat fitness. Kami berkomitmen menyediakan produk 
                            berkualitas tinggi untuk menunjang gaya hidup sehat Anda.
                        </p>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <h3>5+</h3>
                                <p>Tahun Pengalaman</p>
                            </div>
                            <div class="stat-item">
                                <h3>10K+</h3>
                                <p>Pelanggan Puas</p>
                            </div>
                            <div class="stat-item">
                                <h3>500+</h3>
                                <p>Produk Berkualitas</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-image">
                        <div class="image-wrapper">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <div class="floating-card card-1">
                            <i class="bi bi-star-fill"></i>
                            <span>Kualitas Terbaik</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="bi bi-shield-check"></i>
                            <span>Terpercaya</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="bi bi-heart-fill"></i>
                            <span>Pelayanan Prima</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Category Section -->
    <section class="products-section">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Produk Unggulan Kami</h2>
                <p class="section-subtitle">Berbagai pilihan perlengkapan olahraga terlengkap</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="product-category-card">
                        <div class="category-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <h4>Sepatu Olahraga</h4>
                        <p>Running, basket, futsal, dan berbagai jenis sepatu berkualitas</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="product-category-card">
                        <div class="category-icon">
                            <i class="bi bi-disc-fill"></i>
                        </div>
                        <h4>Bola & Raket</h4>
                        <p>Bola sepak, basket, voli, dan raket tenis & badminton original</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="product-category-card">
                        <div class="category-icon">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>
                        <h4>Alat Fitness</h4>
                        <p>Dumbbell, barbell, treadmill, dan peralatan gym profesional</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="product-category-card">
                        <div class="category-icon">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                        <h4>Aksesoris</h4>
                        <p>Tas olahraga, botol minum, dan perlengkapan pendukung lainnya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="vision-mission-section">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Visi & Misi Kami</h2>
                <p class="section-subtitle">Komitmen kami untuk memberikan yang terbaik</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="vm-card vision-card">
                        <div class="vm-icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <h3>Visi</h3>
                        <p>
                            Menjadi toko olahraga terdepan yang menginspirasi masyarakat 
                            untuk menjalani gaya hidup sehat dan aktif melalui produk-produk 
                            berkualitas tinggi dan pelayanan terbaik.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="vm-card mission-card">
                        <div class="vm-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h3>Misi</h3>
                        <ul>
                            <li>Menyediakan produk olahraga berkualitas dengan harga terjangkau</li>
                            <li>Memberikan pelayanan pelanggan yang ramah dan profesional</li>
                            <li>Mendukung komunitas olahraga lokal dan nasional</li>
                            <li>Terus berinovasi dalam koleksi dan layanan produk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Mengapa Memilih Kami?</h2>
                <p class="section-subtitle">Keunggulan Sans Store untuk Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <h4>Produk Original</h4>
                        <p>Semua produk dijamin 100% original dari brand ternama dengan garansi resmi</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-tags-fill"></i>
                        </div>
                        <h4>Harga Kompetitif</h4>
                        <p>Dapatkan harga terbaik dengan berbagai promo dan diskon menarik setiap bulan</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h4>Pengiriman Cepat</h4>
                        <p>Pengiriman ke seluruh Indonesia dengan packaging aman dan tracking real-time</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4>Customer Service 24/7</h4>
                        <p>Tim support siap membantu Anda kapan saja melalui chat, email, atau telepon</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h4>Garansi & Retur</h4>
                        <p>Kemudahan retur dan tukar barang dalam 7 hari jika ada masalah produk</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Konsultasi Gratis</h4>
                        <p>Dapatkan rekomendasi produk yang sesuai dengan kebutuhan olahraga Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" data-aos="zoom-in">
        <div class="container">
            <div class="cta-content">
                <div class="cta-icon">
                    <i class="bi bi-cart-check-fill"></i>
                </div>
                <h2>Siap Memulai Perjalanan Olahraga Anda?</h2>
                <p>Belanja sekarang dan dapatkan diskon spesial untuk pelanggan baru!</p>
                <div class="cta-buttons">
                    <a href="/products" class="btn btn-primary-custom">
                        <i class="bi bi-bag-fill me-2"></i>Lihat Produk
                    </a>
                    <a href="/contact" class="btn btn-outline-custom">
                        <i class="bi bi-envelope-fill me-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* General Styles */
.about-wrapper {
    background: #f8f9fa;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 100px 0;
    color: white;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
    background-size: cover;
    opacity: 0.3;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.badge-text {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.5rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    backdrop-filter: blur(10px);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 1.5rem;
}

.hero-description {
    font-size: 1.2rem;
    line-height: 1.8;
    margin-bottom: 2.5rem;
    opacity: 0.95;
}

.hero-stats {
    display: flex;
    gap: 3rem;
    margin-top: 2rem;
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-item p {
    font-size: 0.95rem;
    opacity: 0.9;
}

/* Hero Image */
.hero-image {
    position: relative;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-wrapper {
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
    border: 3px solid rgba(255, 255, 255, 0.3);
    animation: float-main 4s ease-in-out infinite;
}

@keyframes float-main {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.image-wrapper i {
    font-size: 8rem;
    color: white;
}

.floating-card {
    position: absolute;
    background: white;
    padding: 1rem 1.5rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    gap: 0.8rem;
    animation: float-card 3s ease-in-out infinite;
}

.floating-card i {
    font-size: 1.5rem;
}

.floating-card span {
    font-weight: 600;
    font-size: 0.9rem;
}

.card-1 {
    top: 50px;
    right: 50px;
    color: #ffc107;
    animation-delay: 0s;
}

.card-2 {
    bottom: 50px;
    left: 50px;
    color: #28a745;
    animation-delay: 1s;
}

.card-3 {
    top: 150px;
    left: 20px;
    color: #dc3545;
    animation-delay: 2s;
}

@keyframes float-card {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

/* Products Section */
.products-section {
    padding: 100px 0;
    background: white;
}

.section-header {
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 1rem;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 2px;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #718096;
}

.product-category-card {
    text-align: center;
    padding: 2.5rem 1.5rem;
    background: #f8f9fa;
    border-radius: 20px;
    transition: all 0.3s ease;
    height: 100%;
}

.product-category-card:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
}

.category-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    color: white;
    transition: all 0.3s ease;
}

.product-category-card:hover .category-icon {
    background: white;
    color: #667eea;
    transform: rotate(360deg);
}

.product-category-card h4 {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.product-category-card p {
    font-size: 1rem;
    line-height: 1.6;
    color: #718096;
}

.product-category-card:hover p {
    color: rgba(255, 255, 255, 0.9);
}

/* Vision Mission Section */
.vision-mission-section {
    padding: 100px 0;
}

.vm-card {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.vm-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.vm-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    font-size: 2.5rem;
}

.vision-card .vm-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.mission-card .vm-icon {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.vm-card h3 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #2d3748;
}

.vm-card p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #4a5568;
}

.vm-card ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.vm-card ul li {
    font-size: 1.05rem;
    line-height: 1.8;
    color: #4a5568;
    padding-left: 2rem;
    position: relative;
    margin-bottom: 1rem;
}

.vm-card ul li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #f5576c;
    font-weight: bold;
    font-size: 1.2rem;
}

/* Why Choose Section */
.why-choose-section {
    padding: 100px 0;
    background: white;
}

.feature-card {
    background: white;
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
    border: 2px solid transparent;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    border-color: #667eea;
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    color: white;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1) rotate(10deg);
}

.feature-card h4 {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #2d3748;
}

.feature-card p {
    font-size: 1rem;
    line-height: 1.6;
    color: #718096;
}

/* CTA Section */
.cta-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-align: center;
}

.cta-content {
    max-width: 800px;
    margin: 0 auto;
}

.cta-icon {
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 3rem;
    backdrop-filter: blur(10px);
    animation: pulse-icon 2s ease-in-out infinite;
}

@keyframes pulse-icon {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta-content p {
    font-size: 1.2rem;
    margin-bottom: 2.5rem;
    opacity: 0.95;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary-custom {
    background: white;
    color: #667eea;
    padding: 1rem 2.5rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.btn-primary-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    color: #667eea;
}

.btn-outline-custom {
    background: transparent;
    color: white;
    padding: 1rem 2.5rem;
    border: 2px solid white;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-outline-custom:hover {
    background: white;
    color: #667eea;
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 992px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-stats {
        gap: 2rem;
    }
    
    .hero-image {
        margin-top: 3rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-description {
        font-size: 1rem;
    }
    
    .hero-stats {
        gap: 1.5rem;
    }
    
    .stat-item h3 {
        font-size: 2rem;
    }
    
    .cta-content h2 {
        font-size: 1.8rem;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .floating-card {
        padding: 0.8rem 1rem;
    }
    
    .floating-card span {
        font-size: 0.8rem;
    }
}
</style>

<!-- AOS Animation CDN -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });
</script>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection