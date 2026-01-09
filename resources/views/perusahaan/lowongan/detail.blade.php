<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lowongan - Own Your Career</title>
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
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .navbar h1 { 
            font-size: 1.5rem; 
            font-weight: 600;
        }

        .container { 
            max-width: 900px; 
            margin: 2rem auto; 
            padding: 0 20px; 
        }
        .card { 
            background: white; 
            border-radius: 15px; 
            padding: 2rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px; 
            border-top: 5px solid #31487A;
        }
        .header { 
            display: flex; 
            justify-content: space-between; 
            align-items: start; 
            margin-bottom: 2rem; 
            padding-bottom: 1.5rem; 
            border-bottom: 2px solid #D9E1F1; /* Lavender */
        }
        .title { 
            font-size: 2rem; 
            color: #192338; /* Oxford Blue */
            margin-bottom: 0.5rem; 
            font-weight: 700;
        }
        .header p {
            color: #606C7B !important;
            font-size: 0.95rem;
        }
        
        /* Badges Status */
        .badge { 
            padding: 8px 20px; 
            border-radius: 20px; 
            font-size: 0.9rem; 
            font-weight: bold; 
        }
        .badge-menunggu { 
            background: #D9E1F1; 
            color: #31487A; /* YinMn Blue */
        }
        .badge-aktif { 
            background: #d1fae5; 
            color: #065f46; /* Hijau */
        }
        .badge-nonaktif { 
            background: #fecaca; 
            color: #991b1b; /* Merah */
        }
        
        /* Info Grid */
        .info-grid { 
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 1rem; 
            margin-bottom: 2rem; 
        }
        .info-item { 
            padding: 1rem; 
            background: #f9fafb; 
            border-radius: 10px; 
            border-left: 3px solid #8FB3E2; /* Jordy Blue */
        }
        .info-label { 
            color: #606C7B; 
            font-size: 0.9rem; 
            margin-bottom: 0.3rem; 
        }
        .info-value { 
            color: #192338; 
            font-weight: 600; 
        }
        
        /* Sections */
        .section { 
            margin-bottom: 2rem; 
        }
        .section h3 { 
            color: #31487A; 
            margin-bottom: 1rem; 
            font-size: 1.4rem; 
            border-left: 4px solid #8FB3E2;
            padding-left: 10px;
        }
        .section p { 
            color: #4b5563; 
            line-height: 1.8; 
            white-space: pre-line; 
        }

        /* Buttons */
        .btn-group { 
            display: flex; 
            gap: 15px; 
            margin-top: 2rem; 
        }
        .btn { 
            padding: 12px 25px; 
            border-radius: 10px; 
            text-decoration: none; 
            font-weight: bold; 
            display: inline-block; 
            text-align: center;
            transition: all 0.3s ease;
        }
        .btn-primary { 
            /* Lihat Pelamar - Primary Action */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%); 
            color: white; 
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(49, 72, 122, 0.3);
        }
        .btn-secondary { 
            /* Edit Lowongan - Secondary Action */
            background: #606C7B; 
            color: white; 
        }
        .btn-secondary:hover {
            background: #4b5563;
        }
        
        /* Back Link */
        .back-link {
            color: #31487A; 
            text-decoration: none; 
            display: inline-block; 
            margin-bottom: 1.5rem;
            font-weight: 500;
            transition: color 0.3s;
        }
        .back-link:hover {
            color: #192338;
            text-decoration: underline;
        }
        .back-link i {
            margin-right: 5px;
        }

        /* Alert Success */
        .alert-success { 
            background: #d1fae5; 
            color: #065f46; 
            padding: 15px 20px; 
            border-radius: 10px; 
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
        <a href="{{ route('perusahaan.lowongan.index') }}" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

        @if(session('success'))
        <div class="alert-success"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="header">
                <div>
                    <h1 class="title">{{ $lowongan->posisi }}</h1>
                    <p style="color: #666;"><i class="fa-solid fa-clock"></i> Dibuat: {{ $lowongan->created_at->format('d M Y H:i') }}</p>
                </div>
                <span class="badge badge-{{ $lowongan->status }}">
                    @if($lowongan->status == 'menunggu') <i class="fa-solid fa-hourglass-half"></i> Menunggu Verifikasi
                    @elseif($lowongan->status == 'aktif') <i class="fa-solid fa-check"></i> Aktif
                    @else <i class="fa-solid fa-ban"></i> Nonaktif
                    @endif
                </span>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-tag"></i> Tipe</div>
                    <div class="info-value">{{ ucfirst($lowongan->tipe) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-map-marker-alt"></i> Lokasi</div>
                    <div class="info-value">{{ $lowongan->lokasi }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-calendar-times"></i> Batas Akhir</div>
                    <div class="info-value">{{ $lowongan->batas_akhir->format('d M Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-users"></i> Jumlah Pelamar</div>
                    <div class="info-value">{{ $lowongan->pendaftaran->count() }} orang</div>
                </div>
            </div>

            <div class="section">
                <h3><i class="fa-solid fa-clipboard-list"></i> Deskripsi Pekerjaan</h3>
                <p>{{ $lowongan->deskripsi }}</p>
            </div>

            <div class="section">
                <h3><i class="fa-solid fa-check-double"></i> Persyaratan</h3>
                <p>{{ $lowongan->persyaratan }}</p>
            </div>

            <div class="btn-group">
                <a href="{{ route('perusahaan.lowongan.pelamar', $lowongan->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Lihat Pelamar ({{ $lowongan->pendaftaran->count() }})</a>
                <a href="{{ route('perusahaan.lowongan.ubah', $lowongan->id) }}" class="btn btn-secondary"><i class="fa-solid fa-edit"></i> Edit Lowongan</a>
            </div>
        </div>
    </div>
</body>
</html>