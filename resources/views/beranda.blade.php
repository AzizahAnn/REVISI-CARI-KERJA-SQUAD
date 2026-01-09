<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Own Your Career - Beranda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            min-height: 100vh;
            color: #333;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            color: white;
            padding: 80px 20px;
            text-align: center;
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .hero-content {
            max-width: 800px;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 800;
            text-shadow: 0 4px 10px rgba(0,0,0,0.5);
            letter-spacing: 1px;
        }
        
        .hero h1 i {
            margin-right: 15px;
            color: #8FB3E2;
        }
        
        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .btn {
            display: inline-block;
            padding: 15px 45px;
            background: #8FB3E2;
            color: #192338;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            margin: 0 10px;
        }
        
        .btn:hover {
            transform: translateY(-5px);
            background: white;
            color: #31487A;
            box-shadow: 0 18px 40px rgba(0,0,0,0.5);
        }
        
        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid #8FB3E2;
        }
        
        .btn-outline:hover {
            background: #8FB3E2;
            color: #192338;
        }
        
        /* Fitur Section */
        .fitur-section {
            background: white;
            padding: 60px 20px;
            text-align: center;
        }
        
        .fitur-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .fitur-title {
            font-size: 2.2rem;
            color: #192338;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .fitur-subtitle {
            font-size: 1rem;
            color: #666;
            margin-bottom: 50px;
        }
        
        .fitur-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .fitur-card {
            padding: 30px 25px;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .fitur-card:hover {
            transform: translateY(-8px);
            background: #f0f2f5;
        }
        
        .fitur-card i {
            font-size: 3rem;
            color: #31487A;
            margin-bottom: 20px;
            display: block;
        }
        
        .fitur-card h3 {
            font-size: 1.3rem;
            color: #192338;
            margin-bottom: 12px;
            font-weight: 700;
        }
        
        .fitur-card p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        /* Lowongan Section */
        .lowongan-section {
            background: #f8f9fa;
            padding: 60px 20px;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: #192338;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .section-title p {
            color: #666;
            font-size: 1.1rem;
        }
        
        .lowongan-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }
        
        .lowongan-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #31487A;
        }
        
        .lowongan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        
        .lowongan-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }
        
        .lowongan-card h3 {
            color: #192338;
            font-size: 1.4rem;
            margin-bottom: 5px;
        }
        
        .lowongan-card .perusahaan {
            color: #666;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
        }
        
        .badge-magang {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .badge-kerja {
            background: #f3e5f5;
            color: #7b1fa2;
        }
        
        .lowongan-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 15px 0;
            font-size: 0.95rem;
            color: #666;
        }
        
        .lowongan-info span {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .lowongan-card .deskripsi {
            color: #555;
            line-height: 1.6;
            margin: 15px 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .lowongan-card .btn-detail {
            margin-top: 15px;
            display: inline-block;
            padding: 10px 20px;
            background: #31487A;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .lowongan-card .btn-detail:hover {
            background: #192338;
            transform: translateX(3px);
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
        }
        
        .cta-content {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .cta-content h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }
        
        .cta-content p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        /* Lihat Semua */
        .lihat-semua {
            text-align: center;
            margin-top: 40px;
        }
        
        .lihat-semua a {
            color: #31487A;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }
        
        .lihat-semua a:hover {
            color: #8FB3E2;
        }

        /* Footer */
        .footer {
            background: #192338;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-main {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 25px;
        }

        .footer-company {
            text-align: center;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .footer-company p {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .footer-company a {
            color: #8FB3E2;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-company a:hover {
            color: white;
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .lowongan-container {
                grid-template-columns: 1fr;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1><i class="fa-solid fa-briefcase"></i> Own Your Career</h1>
            <p>Platform Lowongan Magang & Kerja untuk Pelamar</p>
            <div>
                <a href="{{ route('lowongan.publik') }}" class="btn">
                    Cari Lowongan <i class="fa-solid fa-search"></i>
                </a>
                <a href="{{ route('pilih.peran') }}" class="btn btn-outline">
                    Masuk <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Fitur Section -->
    <div class="fitur-section">
        <div class="fitur-container">
            <h2 class="fitur-title">Mengapa Mencari Kerja dan Magang di OwnYourCareer.com?</h2>
            <p class="fitur-subtitle">Platform terpercaya untuk mengembangkan karir Anda</p>
            
            <div class="fitur-grid">
                <div class="fitur-card">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <h3>Cari Lowongan</h3>
                    <p>Jelajahi ribuan lowongan kerja dan program magang dari perusahaan-perusahaan terkemuka di seluruh Indonesia</p>
                </div>
                
                <div class="fitur-card">
                    <i class="fa-solid fa-file-arrow-up"></i>
                    <h3>Daftar & Kirim CV</h3>
                    <p>Kirim lamaran dengan CV Anda dalam hitungan menit. Proses pendaftaran yang mudah dan cepat tanpa ribet</p>
                </div>
                
                <div class="fitur-card">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <h3>Pantau Lamaran</h3>
                    <p>Lihat status lamaran Anda secara real-time dan dapatkan notifikasi terbaru dari perusahaan yang Anda lamar</p>
                </div>
                
                <div class="fitur-card">
                    <i class="fa-solid fa-handshake"></i>
                    <h3>Dapatkan Penawaran</h3>
                    <p>Terima penawaran kerja atau program magang langsung dari perusahaan. Mulai karir impian Anda bersama kami</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lowongan Terbaru Section -->
    <div class="lowongan-section">
        <div class="section-title">
            <h2>Lowongan Terbaru</h2>
            <p>Temukan peluang karir terbaik untuk mengembangkan skill Anda</p>
        </div>

        <div class="lowongan-container">
            @forelse($lowonganTerbaru as $lowongan)
                <div class="lowongan-card">
                    <div class="lowongan-header">
                        <div>
                            <h3>{{ $lowongan->posisi }}</h3>
                            <div class="perusahaan">
                                <i class="fa-solid fa-building"></i>
                                {{ $lowongan->perusahaan->nama ?? 'Perusahaan' }}
                            </div>
                        </div>
                        <span class="badge badge-{{ $lowongan->tipe }}">
                            {{ ucfirst($lowongan->tipe) }}
                        </span>
                    </div>

                    <div class="lowongan-info">
                        <span>
                            <i class="fa-solid fa-map-pin"></i>
                            {{ $lowongan->lokasi }}
                        </span>
                        <span>
                            <i class="fa-solid fa-calendar"></i>
                            {{ $lowongan->batas_akhir->format('d M Y') }}
                        </span>
                    </div>

                    <div class="deskripsi">
                        {{ $lowongan->deskripsi }}
                    </div>

                    <a href="{{ route('lowongan.publik.detail', $lowongan->id) }}" class="btn-detail">
                        Lihat Detail <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            @empty
                <p style="grid-column: 1/-1; text-align: center; color: #666; padding: 40px;">
                    Tidak ada lowongan aktif saat ini. Silahkan cek kembali kemudian.
                </p>
            @endforelse
        </div>

        <div class="lihat-semua">
            <a href="{{ route('lowongan.publik') }}">
                Lihat Semua Lowongan <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="cta-content">
            <h2>Siap untuk Memulai Karir Anda?</h2>
            <p>Daftar sekarang dan dapatkan akses ke ribuan peluang kerja dan magang di seluruh Indonesia</p>
            <a href="{{ route('pilih.peran') }}" class="btn">
                Masuk / Daftar Sekarang
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Own Your Career. Semua Hak Dilindungi.</p>
    </div>

    <script>
        function shareWhatsApp() {
            const url = window.location.href;
            const text = `Lihat lowongan "${$lowongan->posisi}" di ${$lowongan->perusahaan->nama ?? 'perusahaan'}: ${url}`;
            window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
        }
    </script>    
</body>
</html>