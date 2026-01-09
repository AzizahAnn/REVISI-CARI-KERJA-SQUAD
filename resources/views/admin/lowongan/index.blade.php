<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Lowongan - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Palet Warna: #192338 (Oxford Blue), #31487A (YinMn Blue), #8FB3E2 (Jordy Blue), #D9E1F1 (Lavender) */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #D9E1F1; /* Lavender (Background) */
            color: #333333;
        }
        
        /* Navbar */
        .navbar { 
            background: #192338; /* Oxford Blue */
            color: white; 
            padding: 1.2rem 2.5rem; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .navbar h1 { 
            font-size: 1.5rem; 
            font-weight: 500;
        }
        .navbar a { 
            color: #8FB3E2; /* Jordy Blue untuk link navigasi */
            text-decoration: none; 
            margin-left: 20px; 
            padding: 5px 10px;
            border-radius: 4px;
            transition: background 0.2s ease;
        }
        .navbar a:hover {
            background: #31487A;
            color: white;
        }

        .container { max-width: 1200px; margin: 3rem auto; padding: 0 25px; }
        
        /* Alert Success */
        .alert-success { 
            background: #d1fae5; 
            color: #065f46; 
            padding: 15px 20px; 
            border-radius: 8px; 
            margin-bottom: 20px; 
            border-left: 4px solid #10b981; 
            font-weight: 500;
        }
        
        /* Lowongan Card */
        .card { 
            background: white; 
            border-radius: 10px; 
            padding: 1.5rem; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.08); 
            margin-bottom: 20px; 
            border-left: 5px solid #8FB3E2; /* Aksen biru untuk card lowongan */
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
            margin-bottom: 0.5rem; 
            font-weight: 700;
        }
        .company-name { 
            color: #606C7B; 
            font-size: 1rem; 
            display: flex; 
            align-items: center;
        }
        .company-name i { margin-right: 5px; color: #31487A; }

        /* Badge Status */
        .badge { 
            padding: 5px 15px; 
            border-radius: 6px; 
            font-size: 0.85rem; 
            font-weight: bold; 
            text-transform: uppercase;
        }
        .badge-menunggu { background: #fef3c7; color: #92400e; }
        .badge-aktif { background: #d1fae5; color: #065f46; }
        .badge-nonaktif { background: #fee2e2; color: #991b1b; }
        
        /* Card Info */
        .card-info { 
            color: #4B5563; 
            margin-bottom: 0.5rem; 
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }
        .card-info i { margin-right: 8px; color: #31487A; }
        
        /* Buttons */
        .btn { 
            padding: 8px 20px; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 0.9rem; 
            font-weight: bold; 
            margin-right: 10px; 
            text-decoration: none; 
            display: inline-block;
            transition: opacity 0.2s ease;
        }
        .btn:hover { opacity: 0.9; }
        .btn-detail { background: #31487A; color: white; }
        .btn-detail i { margin-right: 5px; }
        .btn-success { background: #10b981; color: white; }
        .btn-success i { margin-right: 5px; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger i { margin-right: 5px; }

        /* Empty State */
        .empty-state { 
            text-align: center; 
            padding: 3rem; 
            color: #606C7B; 
            background: white; 
            border-radius: 10px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .empty-state h3 { color: #31487A; margin-bottom: 10px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-list-check"></i> Verifikasi Lowongan</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
            <a href="{{ route('admin.perusahaan.index') }}"><i class="fa-solid fa-building"></i> Perusahaan</a>
            <a href="{{ route('admin.lowongan.index') }}"><i class="fa-solid fa-briefcase"></i> Lowongan</a>
            <a href="{{ route('admin.laporan.rekap') }}"><i class="fa-solid fa-file-lines"></i> Laporan</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
        @endif

        <h2 style="margin-bottom: 1.5rem; color: #31487A;">Daftar Lowongan ({{ $lowongan->count() }})</h2>

        @if($lowongan->count() > 0)
            @foreach($lowongan as $item)
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">{{ $item->posisi }}</h3>
                        <p class="company-name"><i class="fa-solid fa-building"></i> {{ $item->perusahaan->nama_perusahaan }}</p>
                    </div>
                    <span class="badge badge-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                </div>
                
                <p class="card-info"><i class="fa-solid fa-location-dot"></i> {{ $item->lokasi }}</p>
                <p class="card-info"><i class="fa-solid fa-calendar-xmark"></i> Batas: {{ $item->batas_akhir->format('d M Y') }}</p>
                <p class="card-info"><i class="fa-solid fa-clock"></i> Dibuat: {{ $item->created_at->format('d M Y H:i') }}</p>
                
                <div style="margin-top: 1rem;">
                    <a href="{{ route('admin.lowongan.detail', $item->id) }}" class="btn btn-detail"><i class="fa-solid fa-magnifying-glass"></i> Detail</a>
                    
                    @if($item->status == 'menunggu')
                    <form action="{{ route('admin.lowongan.setujui', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i> Setujui</button>
                    </form>
                    <form action="{{ route('admin.lowongan.tolak', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin tolak lowongan ini?')">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Tolak</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        @else
            <div class="empty-state">
                <i class="fa-solid fa-file-circle-check" style="font-size: 3rem; color: #31487A; margin-bottom: 10px;"></i>
                <h3>Belum ada lowongan</h3>
                <p>Lowongan dari perusahaan akan muncul di sini</p>
            </div>
        @endif
    </div>
</body>
</html>