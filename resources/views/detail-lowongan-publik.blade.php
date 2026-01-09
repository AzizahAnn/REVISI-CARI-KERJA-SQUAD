<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lowongan->posisi }} - Own Your Career</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            padding: 20px;
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        .navbar-brand i {
            margin-right: 10px;
            color: #8FB3E2;
        }

        .navbar-links {
            display: flex;
            gap: 20px;
        }

        .navbar-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .navbar-links a:hover {
            color: #8FB3E2;
        }

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        /* Main Content */
        .main-content {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        /* Header */
        .lowongan-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
        }

        .lowongan-header-left h1 {
            color: #192338;
            font-size: 2.2rem;
            margin-bottom: 10px;
        }

        .lowongan-header-left .perusahaan {
            font-size: 1.1rem;
            color: #666;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .lowongan-header-left .info-mini {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            font-size: 0.95rem;
            color: #666;
        }

        .lowongan-header-left .info-mini span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
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

        .badge-aktif {
            background: #e8f5e9;
            color: #2e7d32;
        }

        /* Content Sections */
        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            color: #192338;
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #31487A;
        }

        .section-content {
            color: #555;
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .section-content ul,
        .section-content ol {
            margin-left: 20px;
            margin-top: 10px;
        }

        .section-content li {
            margin-bottom: 10px;
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .sidebar-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .sidebar-card h3 {
            color: #192338;
            font-size: 1.2rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-card h3 i {
            color: #31487A;
        }

        .info-item {
            display: flex;
            align-items: start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-item i {
            color: #31487A;
            margin-top: 5px;
            width: 20px;
        }

        .info-item-content {
            flex: 1;
        }

        .info-item-label {
            font-weight: 600;
            color: #192338;
            margin-bottom: 3px;
        }

        .info-item-value {
            color: #666;
            font-size: 0.95rem;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: block;
        }

        .btn-primary {
            background: #31487A;
            color: white;
        }

        .btn-primary:hover {
            background: #192338;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(49, 72, 122, 0.3);
        }

        .btn-secondary {
            background: #e9ecef;
            color: #192338;
        }

        .btn-secondary:hover {
            background: #dee2e6;
        }

        /* Status Badge */
        .status-box {
            background: #e8f5e9;
            border-left: 4px solid #2e7d32;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }

        .status-box i {
            color: #2e7d32;
            margin-right: 10px;
        }

        .status-box p {
            color: #1b5e20;
            font-weight: 600;
        }

        /* Company Card */
        .company-card {
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            color: white;
            padding: 25px;
            border-radius: 12px;
        }

        .company-name {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .company-info {
            font-size: 0.95rem;
            line-height: 1.8;
        }

        .company-info span {
            display: block;
            margin-bottom: 8px;
        }

        /* Back Button */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #31487A;
            text-decoration: none;
            margin-bottom: 20px;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-button:hover {
            color: #192338;
        }

        /* Footer */
        .footer {
            background: #192338;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 60px;
        }

        @media (max-width: 968px) {
            .container {
                grid-template-columns: 1fr;
            }

            .lowongan-header {
                flex-direction: column;
            }

            .lowongan-header-left h1 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .navbar-container {
                flex-direction: column;
                gap: 15px;
            }

            .main-content {
                padding: 20px;
            }

            .sidebar {
                order: -1;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-container">
            <a href="{{ route('beranda') }}" class="navbar-brand">
                <i class="fa-solid fa-briefcase"></i> Own Your Career
            </a>
            <div class="navbar-links">
                <a href="{{ route('beranda') }}">Beranda</a>
                <a href="{{ route('lowongan.publik') }}">Lowongan</a>
                <a href="{{ route('pilih.peran') }}">Masuk</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <a href="{{ route('lowongan.publik') }}" class="back-button">
                <i class="fa-solid fa-chevron-left"></i> Kembali ke Lowongan
            </a>

            <!-- Header -->
            <div class="lowongan-header">
                <div class="lowongan-header-left">
                    <h1>{{ $lowongan->posisi }}</h1>
                    <div class="perusahaan">
                        <i class="fa-solid fa-building"></i>
                        {{ $lowongan->perusahaan->nama_perusahaan }}
                    </div>
                    <div class="info-mini">
                        <span>
                            <i class="fa-solid fa-map-pin"></i>
                            {{ $lowongan->lokasi }}
                        </span>
                        <span>
                            <i class="fa-solid fa-calendar"></i>
                            {{ $lowongan->batas_akhir->format('d M Y') }}
                        </span>
                    </div>
                </div>
                <div>
                    <span class="badge badge-{{ $lowongan->tipe }}">
                        {{ ucfirst($lowongan->tipe) }}
                    </span>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="section">
                <h2><i class="fa-solid fa-briefcase" style="color: #31487A; margin-right: 10px;"></i>Deskripsi Pekerjaan</h2>
                <div class="section-content">
                    {!! nl2br(e($lowongan->deskripsi)) !!}
                </div>
            </div>

            <!-- Persyaratan -->
            <div class="section">
                <h2><i class="fa-solid fa-list-check" style="color: #31487A; margin-right: 10px;"></i>Persyaratan</h2>
                <div class="section-content">
                    {!! nl2br(e($lowongan->persyaratan)) !!}
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Info Card -->
            <div class="sidebar-card">
                <h3>
                    <i class="fa-solid fa-circle-info"></i>
                    Informasi Lowongan
                </h3>

                <div class="info-item">
                    <i class="fa-solid fa-briefcase"></i>
                    <div class="info-item-content">
                        <div class="info-item-label">Tipe Lowongan</div>
                        <div class="info-item-value">{{ ucfirst($lowongan->tipe) }}</div>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-map-pin"></i>
                    <div class="info-item-content">
                        <div class="info-item-label">Lokasi</div>
                        <div class="info-item-value">{{ $lowongan->lokasi }}</div>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-calendar"></i>
                    <div class="info-item-content">
                        <div class="info-item-label">Batas Akhir Pendaftaran</div>
                        <div class="info-item-value">{{ $lowongan->batas_akhir->format('d F Y') }}</div>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-clock"></i>
                    <div class="info-item-content">
                        <div class="info-item-label">Sisa Waktu</div>
                        <div class="info-item-value">
                            @php
                                $hari = $lowongan->batas_akhir->diffInDays(now());
                            @endphp
                            {{ $hari }} hari lagi
                        </div>
                    </div>
                </div>

                <div class="status-box">
                    <i class="fa-solid fa-check-circle"></i>
                    <p>Lowongan Aktif dan Terbuka</p>
                </div>
            </div>

            <!-- Company Card -->
            <div class="sidebar-card company-card">
                <div class="company-name">
                    {{ $lowongan->perusahaan->nama_perusahaan }}
                </div>
                <div class="company-info">
                    <span>
                        <i class="fa-solid fa-globe"></i>
                        @if($lowongan->perusahaan && $lowongan->perusahaan->website)
                            <a href="{{ $lowongan->perusahaan->website }}" target="_blank" style="color: #8FB3E2; text-decoration: none;">
                                {{ $lowongan->perusahaan->website }}
                            </a>
                        @else
                            Tidak tersedia
                        @endif
                    </span>
                    <span>
                        <i class="fa-solid fa-phone"></i>
                        {{ $lowongan->perusahaan->no_telp }}
                    </span>
                </div>
            </div>

            <!-- Action Card -->
            <div class="sidebar-card">
                <h3>
                    <i class="fa-solid fa-paper-plane"></i>
                    Tertarik?
                </h3>
                <p style="color: #666; margin-bottom: 20px; font-size: 0.95rem;">
                    Daftar sekarang untuk melamar posisi ini dan raih kesempatan emas untuk bergabung dengan perusahaan!
                </p>
                <div class="action-buttons">
                    <a href="{{ route('pilih.peran') }}" class="btn btn-primary">
                        <i class="fa-solid fa-user-plus"></i> Daftar & Lamar
                    </a>
                    <button onclick="shareWhatsApp()" class="btn btn-secondary">
                        <i class="fa-brands fa-whatsapp"></i> Bagikan
                    </button>
                </div>
            </div>
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