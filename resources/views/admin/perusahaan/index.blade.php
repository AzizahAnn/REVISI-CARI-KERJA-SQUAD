<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Perusahaan - Admin</title>
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
        
        /* Empty State */
        .empty-state { 
            text-align: center; 
            padding: 3rem; 
            background: white; 
            border-radius: 10px; 
            color: #606C7B; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .empty-state h3 { color: #31487A; margin-bottom: 10px; }

        /* Table Styling */
        table { 
            width: 100%; 
            background: white; 
            border-radius: 10px; 
            overflow: hidden; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.08); 
            border-collapse: collapse; 
            font-size: 0.95rem;
        }
        thead { 
            background: #31487A; /* YinMn Blue untuk header tabel */
            color: white; 
        }
        th, td { 
            padding: 15px; 
            text-align: left; 
            border-bottom: 1px solid #e5e7eb; 
        }
        tbody tr:hover { background: #f9fafb; }
        
        /* Badge Status */
        .badge { 
            padding: 5px 15px; 
            border-radius: 6px; 
            font-size: 0.85rem; 
            font-weight: bold; 
            display: inline-block;
            text-transform: uppercase;
        }
        .badge-menunggu { background: #fef3c7; color: #92400e; }
        .badge-disetujui { background: #d1fae5; color: #065f46; }
        .badge-ditolak { background: #fee2e2; color: #991b1b; }
        
        /* Buttons */
        .btn { 
            padding: 8px 15px; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 0.9rem; 
            font-weight: bold; 
            margin-right: 5px;
            transition: opacity 0.2s ease;
        }
        .btn:hover { opacity: 0.9; }
        .btn i { margin-right: 5px; }
        .btn-success { background: #10b981; color: white; }
        .btn-danger { background: #ef4444; color: white; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-building"></i> Verifikasi Perusahaan</h1>
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

        <h2 style="margin-bottom: 1.5rem; color: #31487A;">Daftar Perusahaan ({{ $perusahaan->count() }})</h2>

        @if($perusahaan->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perusahaan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_perusahaan }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ Str::limit($item->alamat, 50) }}</td>
                    <td>
                        <span class="badge badge-{{ $item->status_verifikasi }}">
                            {{ ucfirst($item->status_verifikasi) }}
                        </span>
                    </td>
                    <td>
                        @if($item->status_verifikasi == 'menunggu')
                        <form action="{{ route('admin.perusahaan.setujui', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i> Setujui</button>
                        </form>
                        <form action="{{ route('admin.perusahaan.tolak', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin tolak perusahaan ini?')">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Tolak</button>
                        </form>
                        @else
                        <span style="color: #606C7B;">-</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state">
            <i class="fa-solid fa-clipboard-list" style="font-size: 3rem; color: #31487A; margin-bottom: 10px;"></i>
            <h3>Belum ada perusahaan terdaftar</h3>
            <p>Perusahaan yang mendaftar akan muncul di sini</p>
        </div>
        @endif
    </div>
</body>
</html>