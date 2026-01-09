<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Lowongan - Own Your Career</title>
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

        /* Header/Navbar */
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

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Filter & Search */
        .filter-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .filter-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #192338;
        }

        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #192338;
            font-size: 0.95rem;
        }

        .filter-group input,
        .filter-group select {
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            outline: none;
            border-color: #31487A;
            box-shadow: 0 0 0 3px rgba(49, 72, 122, 0.1);
        }

        .filter-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #31487A;
            color: white;
        }

        .btn-primary:hover {
            background: #192338;
        }

        .btn-secondary {
            background: #e9ecef;
            color: #192338;
        }

        .btn-secondary:hover {
            background: #dee2e6;
        }

        /* Lowongan Grid */
        .lowongan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .lowongan-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
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
            align-items: flex-start;
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
            font-size: 0.95rem;
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

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 12px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #192338;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 20px;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-decoration: none;
            color: #192338;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: #31487A;
            color: white;
            border-color: #31487A;
        }

        .pagination .active span {
            background: #31487A;
            color: white;
            border-color: #31487A;
        }

        .pagination .disabled span {
            color: #ccc;
            cursor: not-allowed;
        }

        /* Footer */
        .footer {
            background: #192338;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 60px;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .lowongan-grid {
                grid-template-columns: 1fr;
            }

            .filter-row {
                grid-template-columns: 1fr;
            }

            .navbar-container {
                flex-direction: column;
                gap: 15px;
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

    <!-- Hero Section -->
    <div class="hero">
        <h1>Semua Lowongan</h1>
        <p>Temukan peluang karir terbaik untuk mengembangkan skill Anda</p>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-title">
                <i class="fa-solid fa-filter"></i> Filter Lowongan
            </div>
            <form method="GET" action="{{ route('lowongan.publik') }}">
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="search">Cari Posisi</label>
                        <input type="text" id="search" name="search" placeholder="Cth: Frontend Developer" 
                               value="{{ request('search') }}">
                    </div>
                    <div class="filter-group">
                        <label for="tipe">Tipe Lowongan</label>
                        <select id="tipe" name="tipe">
                            <option value="">Semua Tipe</option>
                            <option value="magang" {{ request('tipe') === 'magang' ? 'selected' : '' }}>Magang</option>
                            <option value="kerja" {{ request('tipe') === 'kerja' ? 'selected' : '' }}>Kerja</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" placeholder="Cth: Jakarta" 
                               value="{{ request('lokasi') }}">
                    </div>
                </div>
                <div class="filter-buttons">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-search"></i> Cari
                    </button>
                    <a href="{{ route('lowongan.publik') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-redo"></i> Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Lowongan Cards -->
        @if($lowongan->count() > 0)
            <div class="lowongan-grid">
                @foreach($lowongan as $item)
                    <div class="lowongan-card">
                        <div class="lowongan-header">
                            <div>
                                <h3>{{ $item->posisi }}</h3>
                                <div class="perusahaan">
                                    <i class="fa-solid fa-building"></i>
                                    {{ $item->perusahaan->nama_perusahaan }}
                                </div>
                            </div>
                            <span class="badge badge-{{ $item->tipe }}">
                                {{ ucfirst($item->tipe) }}
                            </span>
                        </div>

                        <div class="lowongan-info">
                            <span>
                                <i class="fa-solid fa-map-pin"></i>
                                {{ $item->lokasi }}
                            </span>
                            <span>
                                <i class="fa-solid fa-calendar"></i>
                                {{ $item->batas_akhir->format('d M Y') }}
                            </span>
                        </div>

                        <div class="deskripsi">
                            {{ $item->deskripsi }}
                        </div>

                        <a href="{{ route('lowongan.publik.detail', $item->id) }}" class="btn-detail">
                            Lihat Detail <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $lowongan->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fa-solid fa-search"></i>
                <h3>Tidak Ada Lowongan</h3>
                <p>Maaf, tidak ada lowongan yang sesuai dengan filter Anda. Coba ubah kriteria pencarian.</p>
                <a href="{{ route('lowongan.publik') }}" class="btn btn-primary">
                    Lihat Semua Lowongan
                </a>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Own Your Career. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>