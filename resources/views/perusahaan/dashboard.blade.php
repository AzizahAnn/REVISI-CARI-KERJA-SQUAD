<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perusahaan - Own Your Career</title>
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
        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .navbar .user-info span {
            color: #D9E1F1;
            font-weight: 500;
        }
        .logout-btn {
            padding: 8px 20px;
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid #8FB3E2; /* Border Jordy Blue */
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .logout-btn:hover {
            background: #8FB3E2;
            color: #192338;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .alert i {
            margin-right: 8px;
        }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }
        .alert-warning {
            background: #fef3c7;
            color: #92400e;
            border-left: 4px solid #f59e0b;
        }

        /* Welcome Card */
        .welcome-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            border-top: 5px solid #31487A;
        }
        .welcome-card h2 {
            color: #192338;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        .welcome-card p {
            color: #606C7B;
            font-size: 1.1rem;
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            margin-top: 15px;
        }
        .status-badge i {
            margin-right: 5px;
        }
        .status-menunggu {
            background: #D9E1F1;
            color: #31487A;
        }
        .status-disetujui {
            background: #d1fae5;
            color: #065f46;
        }
        
        /* Stat Cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            transition: all 0.3s ease;
            border-bottom: 4px solid #8FB3E2;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .stat-card .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #31487A; /* Warna Ikon Biru */
        }
        .stat-card h3 {
            color: #192338;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            font-weight: 800;
        }
        .stat-card p {
            color: #606C7B;
            font-size: 1rem;
            font-weight: 500;
        }
        
        /* Menu List */
        .menu-list {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-top: 2rem;
        }
        .menu-list h3 {
            color: #31487A;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            border-bottom: 2px solid #D9E1F1;
            padding-bottom: 10px;
        }
        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            background: #f3f4f6;
            border-radius: 10px;
            color: #192338;
            text-decoration: none;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .menu-item:hover {
            background: linear-gradient(90deg, #8FB3E2 0%, #31487A 100%);
            color: white;
            transform: translateX(5px);
        }
        .menu-item i {
            margin-right: 15px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-chart-line"></i> Dashboard Perusahaan</h1>
        <div class="user-info">
            <i class="fa-solid fa-user-circle"></i>
            <span>{{ auth()->user()->name }}</span>
            <form action="{{ route('perusahaan.keluar') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn"><i class="fa-solid fa-sign-out-alt"></i> Keluar</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('warning'))
        <div class="alert alert-warning">
            <i class="fa-solid fa-exclamation-triangle"></i> {{ session('warning') }}
        </div>
        @endif

        <div class="welcome-card">
            <h2>Selamat Datang, {{ auth()->user()->perusahaan->nama_perusahaan }}!</h2>
            <p>Kelola lowongan dan lihat pelamar dari sini.</p>
            
            @if(auth()->user()->perusahaan->status_verifikasi === 'menunggu')
            <span class="status-badge status-menunggu"><i class="fa-solid fa-hourglass-half"></i> Menunggu Verifikasi Admin</span>
            @elseif(auth()->user()->perusahaan->status_verifikasi === 'disetujui')
            <span class="status-badge status-disetujui"><i class="fa-solid fa-check-circle"></i> Akun Terverifikasi</span>
            @endif
        </div>

        <div class="card-grid">
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
                <h3>{{ $totalLowongan }}</h3>
                <p>Lowongan Aktif</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-users"></i></div>
                <h3>{{ $totalPelamar }}</h3>
                <p>Total Pelamar</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-clipboard-check"></i></div>
                <h3>{{ $pelamarDiterima }}</h3>
                <p>Pelamar Diterima</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                <h3>{{ $pelamarMenunggu }}</h3>
                <p>Menunggu Review</p>
            </div>
        </div>

        <div class="menu-list">
            <h3><i class="fa-solid fa-bars"></i> Menu Perusahaan</h3>
            <a href="{{ route('perusahaan.lowongan.buat') }}" class="menu-item"><i class="fa-solid fa-plus-circle"></i> Buat Lowongan Baru</a>
            <a href="{{ route('perusahaan.lowongan.index') }}" class="menu-item"><i class="fa-solid fa-list-check"></i> Kelola Lowongan Saya</a>
        </div>
    </div>
</body>
</html>
