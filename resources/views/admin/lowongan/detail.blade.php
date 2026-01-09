<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lowongan - Admin</title>
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
            align-items: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .navbar h1 { 
            font-size: 1.5rem; 
            font-weight: 500;
        }

        .container { max-width: 900px; margin: 3rem auto; padding: 0 25px; }
        
        /* Card */
        .card { 
            background: white; 
            border-radius: 10px; /* Lebih modern */
            padding: 2.5rem; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.08); 
            margin-bottom: 25px; 
        }
        
        /* Header dan Judul */
        .header { 
            display: flex; 
            justify-content: space-between; 
            align-items: start; 
            margin-bottom: 2rem; 
            padding-bottom: 1.5rem; 
            border-bottom: 1px solid #EBF4F9; /* Garis halus */
        }
        .title { 
            font-size: 2.2rem; 
            color: #192338; /* Dark Primary */
            margin-bottom: 0.5rem; 
            font-weight: 700;
        }
        .company { 
            color: #31487A; /* YinMn Blue */
            font-size: 1.1rem; 
            font-weight: 500;
        }
        .company i { margin-right: 5px; } /* Ikon Font Awesome */

        /* Badge Status */
        .badge { 
            padding: 8px 18px; 
            border-radius: 6px; 
            font-size: 0.85rem; 
            font-weight: bold;
            text-transform: uppercase;
        }
        .badge-menunggu { background: #fef3c7; color: #92400e; }
        .badge-aktif { background: #d1fae5; color: #065f46; }
        .badge-nonaktif { background: #fee2e2; color: #991b1b; }
        
        /* Info Grid */
        .info-grid { 
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 20px; /* Jarak lebih besar */
            margin-bottom: 2rem; 
        }
        .info-item { 
            padding: 1.2rem; 
            background: #F8F9FB; /* Sedikit off-white */
            border-radius: 8px; 
            border-left: 4px solid #8FB3E2; /* Aksen biru */
        }
        .info-label { 
            color: #606C7B; 
            font-size: 0.85rem; 
            margin-bottom: 0.3rem; 
            display: flex;
            align-items: center;
        }
        .info-label i { margin-right: 8px; color: #31487A; } /* Ikon Font Awesome */
        .info-value { 
            color: #192338; 
            font-weight: 600; 
            font-size: 1.05rem;
        }

        /* Section Deskripsi & Persyaratan */
        .section { margin-bottom: 2rem; }
        .section h3 { 
            color: #31487A; /* YinMn Blue */
            margin-bottom: 1rem; 
            font-size: 1.5rem; 
            padding-bottom: 5px;
            border-bottom: 1px dashed #EBF4F9;
        }
        .section h3 i { margin-right: 10px; }
        .section p { 
            color: #4B5563; 
            line-height: 1.8; 
            white-space: pre-line; 
        }

        /* Buttons (Disesuaikan dengan desain profesional) */
        .btn { 
            padding: 12px 25px; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 1rem; 
            font-weight: bold; 
            margin-right: 15px; 
            transition: opacity 0.2s ease;
        }
        .btn:hover { opacity: 0.9; }
        .btn-success { background: #10b981; color: white; }
        .btn-success i { margin-right: 5px; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger i { margin-right: 5px; }
        .btn-secondary { 
            background: #6b7280; 
            color: white; 
            text-decoration: none; 
            display: inline-block;
        }
        /* Link Kembali */
        .back-link { 
            color: #31487A; 
            text-decoration: none; 
            display: inline-block; 
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        .back-link i { margin-right: 5px; }

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
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-file-invoice"></i> Detail Lowongan</h1>
    </nav>

    <div class="container">
        <a href="{{ route('admin.lowongan.index') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>

        @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="header">
                <div>
                    <h1 class="title">{{ $lowongan->posisi }}</h1>
                    <p class="company"><i class="fa-solid fa-building"></i> {{ $lowongan->perusahaan->nama_perusahaan }}</p>
                </div>
                <span class="badge badge-{{ $lowongan->status }}">{{ ucfirst($lowongan->status) }}</span>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-location-dot"></i> Lokasi</div>
                    <div class="info-value">{{ $lowongan->lokasi }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-calendar-xmark"></i> Batas Akhir</div>
                    <div class="info-value">{{ $lowongan->batas_akhir->format('d M Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-briefcase"></i> Tipe</div>
                    <div class="info-value">{{ ucfirst($lowongan->tipe) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-clock"></i> Dibuat</div>
                    <div class="info-value">{{ $lowongan->created_at->format('d M Y H:i') }}</div>
                </div>
            </div>

            <div class="section">
                <h3><i class="fa-solid fa-file-lines"></i> Deskripsi Pekerjaan</h3>
                <p>{{ $lowongan->deskripsi }}</p>
            </div>

            <div class="section">
                <h3><i class="fa-solid fa-list-check"></i> Persyaratan</h3>
                <p>{{ $lowongan->persyaratan }}</p>
            </div>

            @if($lowongan->status == 'menunggu')
            <div style="margin-top: 2rem;">
                <form action="{{ route('admin.lowongan.setujui', $lowongan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i> Setujui Lowongan</button>
                </form>
                <form action="{{ route('admin.lowongan.tolak', $lowongan->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin tolak lowongan ini?')">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Tolak Lowongan</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</body>
</html>