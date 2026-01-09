<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelamar - Own Your Career</title>
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
            max-width: 1200px; 
            margin: 2rem auto; 
            padding: 0 20px; 
        }

        /* Card & Header */
        .card { 
            background: white; 
            border-radius: 15px; 
            padding: 2rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
            margin-bottom: 20px;
            border-top: 5px solid #8FB3E2;
        }
        h2 { 
            color: #192338; 
            margin-bottom: 1rem; 
            font-size: 1.8rem;
        }
        
        /* Link Kembali */
        .back-link {
            color: #31487A; 
            text-decoration: none; 
            display: inline-flex; 
            align-items: center; 
            margin-bottom: 1.5rem;
            font-weight: 600;
            transition: color 0.3s;
        }
        .back-link:hover {
            color: #192338;
        }
        .back-link i {
            margin-right: 8px;
        }

        /* Alert */
        .alert-success { 
            background: #d1fae5; 
            color: #065f46; 
            padding: 15px 20px; 
            border-radius: 10px; 
            margin-bottom: 20px; 
            border-left: 4px solid #10b981;
            font-weight: 500;
        }
        .alert-success i {
            margin-right: 8px;
        }

        /* Tabel */
        table { 
            width: 100%; 
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden; 
        }
        th, td { 
            padding: 12px; 
            text-align: left; 
            border-bottom: 1px solid #e5e7eb; 
        }
        th { 
            background: #D9E1F1; /* Lavender Light */
            font-weight: 700; 
            color: #31487A; /* YinMn Blue */
            text-transform: uppercase;
            font-size: 0.9rem;
        }
        tbody tr:hover { 
            background: #fcfdff; 
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
            background: #fef3c7; 
            color: #92400e; 
        }
        .badge-diterima { 
            background: #d1fae5; 
            color: #065f46; 
        }
        .badge-ditolak { 
            background: #fee2e2; 
            color: #991b1b; 
        }

        /* Buttons Aksi */
        .btn { 
            padding: 8px 15px; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 0.85rem; 
            margin-right: 5px; 
            text-decoration: none; 
            display: inline-flex; 
            align-items: center;
            font-weight: 600;
            transition: background 0.3s;
        }
        .btn i {
            margin-right: 5px;
        }
        .btn-download { 
            background: #31487A; 
            color: white; 
        }
        .btn-download:hover { background: #192338; }

        .btn-terima { 
            background: #10b981; 
            color: white; 
        }
        .btn-terima:hover { background: #059669; }

        .btn-tolak { 
            background: #ef4444; 
            color: white; 
        }
        .btn-tolak:hover { background: #b91c1c; }
        
        /* Empty State */
        .empty-state { 
            text-align: center; 
            padding: 2rem; 
            color: #606C7B;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-users-viewfinder"></i> Daftar Pelamar</h1>
    </nav>

    <div class="container">
        <a href="{{ route('perusahaan.lowongan.index') }}" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Lowongan</a>

        @if(session('success'))
        <div class="alert-success"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <div class="card">
            <h2>{{ $lowongan->posisi }}</h2>
            <p style="color: #606C7B; margin-bottom: 2rem;">Perusahaan: {{ $lowongan->perusahaan->nama_perusahaan }} | Total Pelamar: <strong>{{ $lowongan->pendaftaran->count() }}</strong> orang</p>

            @if($lowongan->pendaftaran->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelamar</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Tanggal Lamar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lowongan->pendaftaran as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><i class="fa-solid fa-user-graduate"></i> {{ $item->Pelamar->nama_lengkap }}</td>
                        <td>{{ $item->pelamar->nim }}</td>
                        <td>{{ $item->pelamar->jurusan }}</td>
                        <td><i class="fa-solid fa-calendar-check"></i> {{ $item->tanggal_daftar->format('d M Y H:i') }}</td>
                        <td>
                            <span class="badge badge-{{ $item->status }}">
                                @if($item->status == 'menunggu') <i class="fa-solid fa-hourglass-start"></i> Menunggu
                                @elseif($item->status == 'diterima') <i class="fa-solid fa-check"></i> Diterima
                                @else <i class="fa-solid fa-times"></i> Ditolak
                                @endif
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('perusahaan.pendaftaran.unduh-cv', $item->id) }}" class="btn btn-download"><i class="fa-solid fa-file-arrow-down"></i> Download CV</a>
                            
                            @if($item->status == 'menunggu')
                            <form action="{{ route('perusahaan.pendaftaran.ubah-status', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Terima pelamar ini?')">
                                @csrf
                                <input type="hidden" name="status" value="diterima">
                                <button type="submit" class="btn btn-terima"><i class="fa-solid fa-user-check"></i> Terima</button>
                            </form>
                            <form action="{{ route('perusahaan.pendaftaran.ubah-status', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tolak pelamar ini?')">
                                @csrf
                                <input type="hidden" name="status" value="ditolak">
                                <button type="submit" class="btn btn-tolak"><i class="fa-solid fa-user-times"></i> Tolak</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <h3><i class="fa-solid fa-box-open"></i> Belum ada pelamar</h3>
                <p>Lowongan ini belum menerima lamaran dari pelamar.</p>
            </div>
            @endif
        </div>
    </div>
</body>
</html>