<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Perusahaan - Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f3f4f6; }
        .navbar { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 1.5rem; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 1200px; margin: 2rem auto; padding: 0 20px; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px; border-left: 4px solid #10b981; }
        table { width: 100%; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        thead { background: #3b82f6; color: white; }
        th, td { padding: 15px; text-align: left; }
        tbody tr:hover { background: #f9fafb; }
        .badge { padding: 5px 15px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; }
        .badge-menunggu { background: #fef3c7; color: #92400e; }
        .badge-disetujui { background: #d1fae5; color: #065f46; }
        .badge-ditolak { background: #fee2e2; color: #991b1b; }
        .btn { padding: 8px 15px; border: none; border-radius: 8px; cursor: pointer; font-size: 0.9rem; font-weight: bold; }
        .btn-success { background: #10b981; color: white; }
        .btn-danger { background: #ef4444; color: white; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>🏢 Verifikasi Perusahaan</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.perusahaan.index') }}">Perusahaan</a>
            <a href="{{ route('admin.lowongan.index') }}">Lowongan</a>
            <a href="{{ route('admin.laporan.rekap') }}">Laporan</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
        @endif

        <h2 style="margin-bottom: 1.5rem;">Daftar Perusahaan ({{ $perusahaan->count() }})</h2>

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
                            <button type="submit" class="btn btn-success">✓ Setujui</button>
                        </form>
                        <form action="{{ route('admin.perusahaan.tolak', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin tolak perusahaan ini?')">
                            @csrf
                            <button type="submit" class="btn btn-danger">✗ Tolak</button>
                        </form>
                        @else
                        <span style="color: #666;">-</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>