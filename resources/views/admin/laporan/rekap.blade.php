<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekap - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Palet Warna: #192338 (Oxford Blue), #31487A (YinMn Blue), #8FB3E2 (Jordy Blue), #D9E1F1 (Lavender) */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #D9E1F1; /* Lavender (Background) */
            color: #333333;
        }
        
        /* Navbar (Menggunakan Dark Primary Blue) */
        .navbar { 
            background: #192338; 
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
        
        /* Card Grid (Statistik) */
        .card-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 25px; 
            margin-bottom: 2.5rem; 
        }
        .stat-card { 
            background: white; 
            border-radius: 10px; 
            padding: 1.5rem; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.08); 
            text-align: center; 
            border-top: 5px solid #8FB3E2; /* Aksen biru */
        }
        
        /* Icon Font Styling */
        .stat-card .icon { 
            font-size: 3rem; 
            margin-bottom: 1rem; 
            color: #31487A; /* YinMn Blue */
        }
        .stat-card h3 { 
            color: #192338; 
            font-size: 2.2rem; 
            margin-bottom: 0.5rem; 
            font-weight: 700;
        }
        .stat-card p { 
            color: #606C7B; 
            font-size: 0.95rem;
            text-transform: uppercase;
        }
        
        /* Content Card (Table Container) */
        .card { 
            background: white; 
            border-radius: 10px; 
            padding: 2rem; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.08); 
            margin-bottom: 30px; 
        }
        h2 { 
            color: #31487A; 
            margin-bottom: 1.5rem; 
            font-size: 1.8rem;
            border-bottom: 1px solid #EBF4F9;
            padding-bottom: 10px;
        }
        
        /* Table Styling */
        table { width: 100%; border-collapse: collapse; }
        th, td { 
            padding: 12px; 
            text-align: left; 
            border-bottom: 1px solid #e5e7eb; 
            font-size: 0.95rem;
        }
        th { 
            background: #F8F9FB; 
            font-weight: 600; 
            color: #192338; 
        }
        tbody tr:hover {
            background: #F4F6F9; /* Highlight baris saat hover */
        }

        /* Badge Styling (Dipertahankan warnanya agar tetap fungsional) */
        .badge { 
            padding: 5px 12px; 
            border-radius: 6px; 
            font-size: 0.8rem; 
            font-weight: bold; 
            text-transform: uppercase;
        }
        .badge-menunggu { background: #fef3c7; color: #92400e; }
        .badge-diterima { background: #d1fae5; color: #065f46; }
        .badge-ditolak { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-square-poll-vertical"></i> Laporan Rekap Pendaftar</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
            <a href="{{ route('admin.perusahaan.index') }}"><i class="fa-solid fa-building"></i> Perusahaan</a>
            <a href="{{ route('admin.lowongan.index') }}"><i class="fa-solid fa-briefcase"></i> Lowongan</a>
            <a href="{{ route('admin.laporan.rekap') }}"><i class="fa-solid fa-file-lines"></i> Laporan</a>
        </div>
    </nav>

    <div class="container">
        <h2>Statistik Keseluruhan</h2>
        
        <div class="card-grid">
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-building"></i></div>
                <h3>{{ $totalPerusahaan }}</h3>
                <p>Total Perusahaan</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h3>{{ $totalPelamar }}</h3>
                <p>Total Pelamar</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
                <h3>{{ $totalLowongan }}</h3>
                <p>Total Lowongan</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-file-lines"></i></div>
                <h3>{{ $totalPendaftaran }}</h3>
                <p>Total Lamaran</p>
            </div>
        </div>

        <div class="card">
            <h2>Rekap Lamaran per Status</h2>
            <table>
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapStatus as $item)
                    <tr>
                        <td>
                            <span class="badge badge-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                        </td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $totalPendaftaran > 0 ? round(($item->jumlah / $totalPendaftaran) * 100, 1) : 0 }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card">
            <h2>Daftar Pelamar per Lowongan</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Posisi</th>
                        <th>Perusahaan</th>
                        <th>Jumlah Pelamar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lowonganDenganPelamar as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->posisi }}</td>
                        <td>{{ $item->perusahaan->nama_perusahaan }}</td>
                        <td><strong>{{ $item->pendaftaran_count }} orang</strong></td>
                        <td>
                            <span class="badge badge-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>