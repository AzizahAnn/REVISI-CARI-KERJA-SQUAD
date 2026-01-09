<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lowongan - Own Your Career</title>
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
            margin-bottom: 1rem; 
            font-weight: 500;
        }
        .badge { 
            padding: 8px 20px; 
            border-radius: 20px; 
            font-size: 0.9rem; 
            font-weight: bold; 
            text-transform: capitalize;
        }
        /* Menggunakan warna palet untuk badge */
        .badge-magang { 
            background: #8FB3E2; 
            color: #192338; 
        } 
        .badge-kerja { 
            background: #31487A; 
            color: white; 
        }
        
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

        /* Alerts */
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
        .alert-error { 
            background: #fecaca; 
            color: #991b1b; 
            border-left: 4px solid #ef4444; 
        }
        .alert-info { 
            /* Info alert menggunakan warna palet */
            background: #D9E1F1; 
            color: #31487A; 
            border-left: 4px solid #31487A; 
        }
        .alert-info a {
            color: #192338; 
            font-weight: bold;
        }

        /* Upload Section */
        .upload-section { 
            background: #f9fafb; 
            padding: 2rem; 
            border-radius: 15px; 
            border: 2px dashed #8FB3E2; /* Jordy Blue dashed border */
        }
        .upload-section h3 { 
            color: #31487A; 
            margin-bottom: 1rem; 
            font-size: 1.3rem;
        }
        .upload-section p {
            color: #606C7B;
            margin-bottom: 1.5rem;
        }
        .file-input { 
            margin: 1rem 0; 
        }
        .file-label { 
            display: block; 
            padding: 12px; 
            background: white; 
            border: 2px solid #e5e7eb; 
            border-radius: 10px; 
            cursor: pointer; 
            text-align: center; 
            color: #606C7B;
            transition: all 0.3s;
        }
        .file-label:hover { 
            border-color: #31487A; 
            background: #D9E1F1;
        }
        .btn { 
            padding: 14px 30px; 
            border-radius: 10px; 
            font-size: 1.1rem; 
            font-weight: bold; 
            cursor: pointer; 
            border: none; 
            transition: all 0.3s ease;
        }
        .btn-primary { 
            /* Gradien tombol konsisten */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%); 
            color: white; 
            width: 100%; 
        }
        .btn-primary:hover { 
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(49, 72, 122, 0.3);
        }
        .error-text { 
            color: #ef4444; 
            font-size: 0.9rem; 
            margin-top: 0.5rem; 
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
        <h1><i class="fa-solid fa-list-alt"></i> Detail Lowongan</h1>
    </nav>

    <div class="container">
        <a href="{{ route('pelamar.lowongan.index') }}" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Lowongan</a>

        @if(session('success'))
        <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        @if(session('error'))
        <div class="alert alert-error"><i class="fa-solid fa-times-circle"></i> {{ session('error') }}</div>
        @endif

        @if($sudahDaftar)
        <div class="alert alert-info">
            <i class="fa-solid fa-info-circle"></i> Anda sudah mendaftar di lowongan ini. Cek status di <a href="{{ route('pelamar.lamaran.index') }}">Riwayat Lamaran</a>
        </div>
        @endif

        <div class="card">
            <div class="header">
                <div>
                    <h1 class="title">{{ $lowongan->posisi }}</h1>
                    <p class="company"><i class="fa-solid fa-building"></i> {{ $lowongan->perusahaan->nama_perusahaan }}</p>
                </div>
                <span class="badge badge-{{ $lowongan->tipe }}"><i class="fa-solid fa-tag"></i> {{ ucfirst($lowongan->tipe) }}</span>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-map-marker-alt"></i> Lokasi</div>
                    <div class="info-value">{{ $lowongan->lokasi }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fa-solid fa-calendar-times"></i> Batas Akhir</div>
                    <div class="info-value">{{ $lowongan->batas_akhir->format('d M Y') }}</div>
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
        </div>

        @if(!$sudahDaftar)
        <div class="card">
            <div class="upload-section">
                <h3><i class="fa-solid fa-cloud-upload-alt"></i> Upload CV dan Lamar Sekarang</h3>
                <p>File CV harus berformat PDF dengan ukuran maksimal 2MB</p>
                
                <form action="{{ route('pelamar.lowongan.daftar', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="file-input">
                        <label for="cv" class="file-label">
                            <span id="file-name"><i class="fa-solid fa-paperclip"></i> Klik untuk pilih file CV (PDF)</span>
                        </label>
                        <input type="file" name="cv" id="cv" accept=".pdf" required style="display: none;">
                        @error('cv')
                        <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Kirim Lamaran</button>
                </form>
            </div>
        </div>

        <script>
            document.getElementById('cv').addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || '<i class="fa-solid fa-paperclip"></i> Klik untuk pilih file CV (PDF)';
                document.getElementById('file-name').innerHTML = '<i class="fa-solid fa-file-arrow-up"></i> ' + fileName;
            });
        </script>
        @endif
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Own Your Career. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>