<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Lamaran - Own Your Career</title>
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
        
        /* Alert/Success Message */
        .alert-success { 
            background: #d1fae5; 
            color: #065f46; 
            padding: 15px 20px; 
            border-radius: 10px; 
            margin-bottom: 20px; 
            border-left: 4px solid #10b981; 
            font-weight: 500;
        }
        
        /* Card Lamaran */
        .card { 
            background: white; 
            border-radius: 15px; 
            padding: 1.5rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
            margin-bottom: 20px; 
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1); 
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
            margin-bottom: 0.3rem; 
            font-weight: 700;
        }
        .company-name { 
            color: #31487A; /* YinMn Blue */
            font-size: 1rem; 
            font-weight: 500;
        }
        
        /* Badge Status */
        .badge { 
            padding: 5px 15px; 
            border-radius: 20px; 
            font-size: 0.85rem; 
            font-weight: bold; 
        }
        .badge-menunggu { 
            background: #D9E1F1; 
            color: #31487A; 
        }
        .badge-diterima { 
            background: #d1fae5; 
            color: #065f46; 
        }
        .badge-ditolak { 
            background: #fecaca; 
            color: #b91c1c; 
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
            transform: translateY(-1px);
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
        .empty-state a {
            color: #31487A;
            text-decoration: none;
            font-weight: 600;
        }
        .empty-state a:hover {
            text-decoration: underline;
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
        <h1><i class="fa-solid fa-list-check"></i> Riwayat Lamaran</h1>
        <div>
            <a href="{{ route('pelamar.dashboard') }}"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a href="{{ route('pelamar.lowongan.index') }}"><i class="fa-solid fa-magnifying-glass"></i> Cari Lowongan</a>
            <a href="{{ route('pelamar.lamaran.index') }}"><i class="fa-solid fa-file-contract"></i> Lamaran Saya</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
        @endif

        <h2 style="margin-bottom: 1.5rem; color: #192338;">Lamaran Saya ({{ $lamaran->count() }})</h2>

        @if($lamaran->count() > 0)
            @foreach($lamaran as $item)
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">{{ $item->lowongan->posisi }}</h3>
                        <p class="company-name"><i class="fa-solid fa-building"></i> {{ $item->lowongan->perusahaan->nama_perusahaan }}</p>
                    </div>
                    <span class="badge badge-{{ $item->status }}">
                        @if($item->status == 'menunggu') <i class="fa-solid fa-clock"></i> Menunggu
                        @elseif($item->status == 'diterima') <i class="fa-solid fa-check-circle"></i> Berkas Diterima
                        @else <i class="fa-solid fa-times-circle"></i> Ditolak
                        @endif
                    </span>
                </div>
                
                <p class="card-info"><i class="fa-solid fa-map-marker-alt"></i> {{ $item->lowongan->lokasi }}</p>
                <p class="card-info"><i class="fa-solid fa-calendar-alt"></i> Dilamar: {{ $item->tanggal_daftar->format('d M Y H:i') }}</p>
                <p class="card-info"><i class="fa-solid fa-file-pdf"></i> CV: {{ basename($item->jalur_cv) }}</p>
                
                <a href="{{ route('pelamar.lamaran.detail', $item->id) }}" class="btn-detail"><i class="fa-solid fa-eye"></i> Lihat Detail</a>
            </div>
            @endforeach
        @else
            <div class="empty-state">
                <h3><i class="fa-solid fa-box-open"></i> Belum ada lamaran</h3>
                <p><a href="{{ route('pelamar.lowongan.index') }}">Cari lowongan</a> dan kirim lamaran pertama Anda</p>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Own Your Career. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>