<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Lowongan - Own Your Career</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Palet Warna: #192338 (Oxford Blue), #31487A (YinMn Blue), #8FB3E2 (Jordy Blue), #D9E1F1 (Lavender) */
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        body { 
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #D9E1F1; /* Lavender Light */
        }
        
        /* Navigasi */
        .navbar { 
            /* Gradien biru gelap konsisten */
            background: linear-gradient(135deg, #31487A 0%, #192338 100%); 
            color: white; 
            padding: 1.2rem 2rem; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .navbar h1 { 
            font-size: 1.5rem; 
            font-weight: 600;
        }
        .navbar a { 
            color: #D9E1F1; 
            text-decoration: none; 
            margin-left: 20px; 
            transition: color 0.3s;
        }
        .navbar a:hover {
            color: white;
            text-decoration: underline;
        }

        .container { 
            max-width: 1200px; 
            margin: 2rem auto; 
            padding: 0 20px; 
        }
        
        /* Kotak Pencarian */
        .search-box { 
            background: white; 
            padding: 2rem; 
            border-radius: 15px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
            margin-bottom: 2rem; 
            border-top: 5px solid #31487A;
        }
        .search-form { 
            display: grid; 
            grid-template-columns: 1fr 200px 150px; 
            gap: 15px; 
        }
        .search-form input, .search-form select { 
            padding: 12px 15px; 
            border: 2px solid #D9E1F1; 
            border-radius: 10px; 
            font-size: 1rem;
            color: #192338;
        }
        .search-form input:focus, .search-form select:focus {
            border-color: #8FB3E2;
            outline: none;
        }
        .search-form button { 
            padding: 12px; 
            /* Gradien tombol konsisten */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%); 
            color: white; 
            border: none; 
            border-radius: 10px; 
            font-weight: bold; 
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .search-form button:hover { 
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(49, 72, 122, 0.3);
        }
        
        /* Card Lowongan */
        .card { 
            background: white; 
            border-radius: 15px; 
            padding: 1.5rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
            margin-bottom: 20px; 
            transition: all 0.3s ease; 
        }
        .card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 8px 20px rgba(0,0,0,0.15); 
        }
        .card-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: start; 
            margin-bottom: 1rem; 
        }
        .card-title { 
            font-size: 1.5rem; 
            color: #192338; /* Oxford Blue */
            margin-bottom: 0.5rem; 
            font-weight: 700;
        }
        .company-name { 
            color: #31487A; /* YinMn Blue */
            font-size: 1rem; 
            font-weight: 500;
        }
        
        /* Badge Tipe */
        .badge { 
            padding: 5px 15px; 
            border-radius: 20px; 
            font-size: 0.85rem; 
            font-weight: bold;
            text-transform: capitalize; 
        }
        .badge-magang { 
            background: #8FB3E2; 
            color: #192338; 
        }
        .badge-kerja { 
            background: #31487A; 
            color: white; 
        }
        
        .card-info { 
            color: #606C7B; 
            margin-bottom: 0.5rem; 
            font-size: 0.95rem;
        }
        .card-info i {
            margin-right: 5px;
            color: #8FB3E2; /* Jordy Blue */
        }
        
        /* Tombol Detail */
        .btn-detail { 
            display: inline-block; 
            margin-top: 1rem; 
            padding: 10px 25px; 
            /* Gradien tombol konsisten */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%); 
            color: white; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-detail:hover { 
            background: linear-gradient(135deg, #31487A 0%, #192338 100%); 
            box-shadow: 0 3px 10px rgba(49, 72, 122, 0.3);
        }
        
        /* Empty State */
        .empty-state { 
            text-align: center; 
            padding: 3rem; 
            color: #606C7B; 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .empty-state h3 {
            color: #192338;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .search-form { grid-template-columns: 1fr; }
        }

        /* Footer */
        .footer {
            background: #192338;
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-magnifying-glass"></i> Cari Lowongan</h1>
        <div>
            <a href="{{ route('pelamar.dashboard') }}"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a href="{{ route('pelamar.lowongan.index') }}"><i class="fa-solid fa-briefcase"></i> Cari Lowongan</a>
            <a href="{{ route('pelamar.lamaran.index') }}"><i class="fa-solid fa-file-contract"></i> Lamaran Saya</a>
        </div>
    </nav>

    <div class="container">
        <div class="search-box">
            <form action="{{ route('pelamar.lowongan.index') }}" method="GET" class="search-form">
                <input type="text" name="cari" placeholder="Cari posisi, perusahaan, atau lokasi..." value="{{ request('cari') }}">
                <select name="tipe">
                    <option value="">Semua Tipe</option>
                    <option value="magang" {{ request('tipe') == 'magang' ? 'selected' : '' }}>Magang</option>
                    <option value="kerja" {{ request('tipe') == 'kerja' ? 'selected' : '' }}>Kerja</option>
                </select>
                <button type="submit"><i class="fa-solid fa-search"></i> Cari</button>
            </form>
        </div>

        <h2 style="margin-bottom: 1.5rem; color: #192338;">Lowongan Tersedia ({{ $lowongan->count() }})</h2>

        @if($lowongan->count() > 0)
            @foreach($lowongan as $item)
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">{{ $item->posisi }}</h3>
                        <p class="company-name"><i class="fa-solid fa-building"></i> {{ $item->perusahaan->nama_perusahaan }}</p>
                    </div>
                    <span class="badge badge-{{ $item->tipe }}"><i class="fa-solid fa-tag"></i> {{ ucfirst($item->tipe) }}</span>
                </div>
                
                <p class="card-info"><i class="fa-solid fa-map-marker-alt"></i> {{ $item->lokasi }}</p>
                <p class="card-info"><i class="fa-solid fa-calendar-times"></i> Batas: {{ $item->batas_akhir->format('d M Y') }}</p>
                <p class="card-info"><i class="fa-solid fa-file-alt"></i> {{ Str::limit($item->deskripsi, 150) }}</p>
                
                <a href="{{ route('pelamar.lowongan.detail', $item->id) }}" class="btn-detail"><i class="fa-solid fa-eye"></i> Lihat Detail & Lamar</a>
            </div>
            @endforeach
        @else
            <div class="empty-state">
                <h3><i class="fa-solid fa-box-open"></i> Tidak ada lowongan ditemukan</h3>
                <p>Coba ubah kata kunci pencarian atau filter Anda.</p>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Own Your Career. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>