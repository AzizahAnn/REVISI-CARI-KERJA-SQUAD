<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lowongan - Own Your Career</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Palet Warna: #192338, #31487A, #8FB3E2, #D9E1F1 */
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
        
        /* Header dan Tombol Utama */
        .header-section { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 2rem; 
        }
        .header-section h2 {
            color: #192338;
        }
        .btn-primary { 
            padding: 12px 30px; 
            /* Gradien Tombol Primary */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%); 
            color: white; 
            text-decoration: none; 
            border-radius: 10px; 
            font-weight: bold; 
            display: inline-block;
            transition: all 0.3s ease;
        }
        .btn-primary:hover { 
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(49, 72, 122, 0.3);
        }

        /* Alert */
        .alert { 
            padding: 15px 20px; 
            border-radius: 10px; 
            margin-bottom: 20px;
            font-weight: 500;
        }
        .alert-success { 
            background: #d1fae5; 
            color: #065f46; 
            border-left: 4px solid #10b981; 
        }
        
        /* Card Lowongan */
        .card { 
            background: white; 
            border-radius: 15px; 
            padding: 1.5rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
            margin-bottom: 20px; 
            transition: all 0.3s ease;
            border-left: 5px solid #8FB3E2;
        }
        .card:hover {
            transform: translateY(-5px); 
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
            color: #192338; 
            font-weight: 700;
        }
        
        /* Badges */
        .badge { 
            padding: 5px 15px; 
            border-radius: 20px; 
            font-size: 0.85rem; 
            font-weight: bold;
            display: inline-flex;
            align-items: center;
        }
        .badge i {
            margin-right: 5px;
        }
        .badge-menunggu { 
            background: #D9E1F1; 
            color: #31487A; 
        }
        .badge-aktif { 
            background: #d1fae5; 
            color: #065f46; 
        }
        .badge-nonaktif { 
            background: #fecaca; 
            color: #991b1b; 
        }
        .badge-tipe { 
            background: #31487A; 
            color: white; 
            margin-left: 10px;
        }
        
        /* Card Info */
        .card-info { 
            color: #606C7B; 
            margin-bottom: 0.5rem; 
            font-size: 0.95rem;
        }
        .card-info i {
            margin-right: 5px;
            color: #8FB3E2;
        }

        /* Actions */
        .card-actions { 
            margin-top: 1rem; 
            display: flex; 
            gap: 10px; 
            flex-wrap: wrap; 
        }
        .btn { 
            padding: 8px 18px; 
            border-radius: 8px; 
            text-decoration: none; 
            display: inline-block; 
            font-size: 0.9rem;
            font-weight: 600;
            transition: background 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        .btn i {
            margin-right: 5px;
        }
        .btn-detail { 
            background: #8FB3E2; 
            color: #192338;
        }
        .btn-detail:hover { background: #6F9FD2; }

        .btn-pelamar { 
            background: #31487A; 
            color: white; 
        }
        .btn-pelamar:hover { background: #192338; }

        .btn-edit { 
            background: #606C7B; 
            color: white; 
        }
        .btn-edit:hover { background: #4b5563; }

        .btn-delete { 
            background: #ef4444; 
            color: white; 
            border: none; 
            cursor: pointer;
        }
        .btn-delete:hover { background: #b91c1c; }
        
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
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-building"></i> Daftar Lowongan</h1>
        <div>
            <a href="{{ route('perusahaan.dashboard') }}"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a href="{{ route('perusahaan.lowongan.index') }}"><i class="fa-solid fa-briefcase"></i> Lowongan</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <div class="header-section">
            <h2>Lowongan Saya</h2>
            <a href="{{ route('perusahaan.lowongan.buat') }}" class="btn-primary"><i class="fa-solid fa-plus-circle"></i> Buat Lowongan Baru</a>
        </div>

        @if($lowongan->count() > 0)
            @foreach($lowongan as $item)
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">{{ $item->posisi }}</h3>
                        <span class="badge badge-{{ $item->status }}">
                            @if($item->status == 'menunggu') <i class="fa-solid fa-hourglass-half"></i> Menunggu Verifikasi
                            @elseif($item->status == 'aktif') <i class="fa-solid fa-check"></i> Aktif
                            @else <i class="fa-solid fa-ban"></i> Nonaktif
                            @endif
                        </span>
                        <span class="badge badge-tipe"><i class="fa-solid fa-tag"></i> {{ ucfirst($item->tipe) }}</span>
                    </div>
                </div>
                
                <p class="card-info"><i class="fa-solid fa-map-marker-alt"></i> {{ $item->lokasi }}</p>
                <p class="card-info"><i class="fa-solid fa-calendar-times"></i> Batas: {{ $item->batas_akhir->format('d M Y') }}</p>
                <p class="card-info"><i class="fa-solid fa-users"></i> Pelamar: {{ $item->pendaftaran->count() }} orang</p>
                
                <div class="card-actions">
                    <a href="{{ route('perusahaan.lowongan.detail', $item->id) }}" class="btn btn-detail"><i class="fa-solid fa-file-alt"></i> Detail</a>
                    <a href="{{ route('perusahaan.lowongan.pelamar', $item->id) }}" class="btn btn-pelamar"><i class="fa-solid fa-user-check"></i> Lihat Pelamar</a>
                    <a href="{{ route('perusahaan.lowongan.ubah', $item->id) }}" class="btn btn-edit"><i class="fa-solid fa-edit"></i> Edit</a>
                    <form action="{{ route('perusahaan.lowongan.hapus', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus lowongan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete"><i class="fa-solid fa-trash-alt"></i> Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        @else
            <div class="empty-state">
                <h3><i class="fa-solid fa-box-open"></i> Belum ada lowongan</h3>
                <p>Buat lowongan pertama Anda untuk mulai menerima pelamar.</p>
            </div>
        @endif
    </div>
</body>
</html>