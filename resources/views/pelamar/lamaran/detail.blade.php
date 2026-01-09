<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lamaran - Own Your Career</title>
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
            box-shadow: 0 5px 20px rgba(0,0,0,0.1); 
            margin-bottom: 20px; 
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
        .company { 
            color: #31487A; /* YinMn Blue */
            font-size: 1.2rem; 
            font-weight: 500;
        }
        .badge { 
            padding: 8px 20px; 
            border-radius: 20px; 
            font-size: 0.9rem; 
            font-weight: bold; 
        }
        /* Menggunakan warna palet untuk badge */
        .badge-menunggu { 
            background: #D9E1F1; 
            color: #31487A; 
        }
        .badge-diterima { 
            background: #d1fae5; 
            color: #065f46; 
        } /* Tetap hijau untuk diterima */
        .badge-ditolak { 
            background: #fecaca; 
            color: #b91c1c; 
        } /* Tetap merah untuk ditolak */
        
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
        .section { 
            margin-bottom: 2rem; 
        }
        .section h3 { 
            color: #31487A; /* YinMn Blue */
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
        .status-box { 
            padding: 1.5rem; 
            border-radius: 10px; 
            margin-bottom: 2rem; 
        }
        /* Menggunakan warna palet untuk kotak status */
        .status-menunggu { 
            background: #D9E1F1; 
            border-left: 5px solid #31487A; 
        }
        .status-diterima { 
            background: #d1fae5; 
            border-left: 5px solid #10b981; 
        }
        .status-ditolak { 
            background: #fecaca; 
            border-left: 5px solid #ef4444; 
        }
        .status-box h4 { 
            margin-bottom: 0.5rem; 
            font-size: 1.1rem;
        }

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
        
        /* Penyesuaian warna teks di status box agar kontras */
        .status-menunggu h4, .status-menunggu p { color: #31487A; }
        .status-diterima h4, .status-diterima p { color: #065f46; }
        .status-ditolak h4, .status-ditolak p { color: #991b1b; }

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
        <h1><i class="fa-solid fa-file-invoice"></i> Detail Lamaran</h1>
    </nav>

    <div class="container">
        <a href="{{ route('pelamar.lamaran.index') }}" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

        <div class="card">
            <div class="header">
                <div>
                    <h1 class="title">{{ $lamaran->lowongan->posisi }}</h1>
                    <p class="company"><i class="fa-solid fa-building"></i> {{ $lamaran->lowongan->perusahaan->nama_perusahaan }}</p>
                </div>
                <span class="badge badge-{{ $lamaran->status }}">
                    @if($lamaran->status == 'menunggu') <i class="fa-solid fa-clock"></i> Menunggu
                    @elseif($lamaran->status == 'diterima') <i class="fa-solid fa-check-circle"></i> Berkas Diterima
                    @else <i class="fa-solid fa-times-circle"></i> Ditolak
                    @endif
                </span>
            </div>

            @if($lamaran->status == 'menunggu')
            <div class="status-box status-menunggu">
                <h4><i class="fa-solid fa-hourglass-half"></i> Lamaran Sedang Direview</h4>
                <p>Lamaran Anda sedang ditinjau oleh perusahaan. Harap tunggu informasi lebih lanjut.</p>
            </div>
            @elseif($lamaran->status == 'diterima')
            <div class="status-box status-diterima">
                <h4><i class="fa-solid fa-handshake-alt"></i> Selamat! Berkas Anda Diterima</h4>
                <p>Perusahaan akan menghubungi Anda untuk tahap selanjutnya. Jika ada pertanyaan lebih lanjut silahkan menghubungi email berikut:<a href="mailto:{{ $lamaran->lowongan->perusahaan->user->email }}">
                    {{ $lamaran->lowongan->perusahaan->user->email }}.</a>
                    <p>
            </div>
            @else
            <div class="status-box status-ditolak">
                <h4><i class="fa-solid fa-face-sad-tear"></i> Lamaran Tidak Diterima</h4>
                <p>Jangan berkecil hati! Coba lamar ke lowongan lain yang lebih sesuai.</p>
            </div>
            @endif

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-map-marker-alt"></i> Lokasi</div>
                    <div class="info-value">{{ $lamaran->lowongan->lokasi }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-calendar-alt"></i> Tanggal Lamar</div>
                    <div class="info-value">{{ $lamaran->tanggal_daftar->format('d M Y H:i') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-file-pdf"></i> File CV</div>
                    <div class="info-value">{{ basename($lamaran->jalur_cv) }} <a href="/storage/cv/{{ basename($lamaran->jalur_cv) }}" target="_blank" style="color:#8FB3E2; margin-left: 5px;">(Lihat)</a></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-briefcase"></i> Tipe</div>
                    <div class="info-value">{{ ucfirst($lamaran->lowongan->tipe) }}</div>
                </div>
            </div>

            <div class="section">
                <h3><i class="fa-solid fa-clipboard-list"></i> Deskripsi Pekerjaan</h3>
                <p>{{ $lamaran->lowongan->deskripsi }}</p>
            </div>

            <div class="section">
                <h3><i class="fa-solid fa-check-double"></i> Persyaratan</h3>
                <p>{{ $lamaran->lowongan->persyaratan }}</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Own Your Career. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>