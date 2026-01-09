<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Own Your Career</title>
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
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .navbar h1 {
            font-size: 1.5rem;
            font-weight: 500;
        }
        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.9rem;
        }
        .logout-btn {
            padding: 8px 20px;
            background: #8FB3E2; /* Jordy Blue */
            color: #192338; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s ease;
        }
        .logout-btn:hover {
            background: #7A9FCB;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 25px;
        }

        /* Alert/Success Box (Meniru desain gambar) */
        .alert-success {
            background: white; 
            border: 1px solid #EBF4F9;
            padding: 15px; 
            border-radius: 8px; 
            margin-bottom: 25px; 
            color: #333;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .alert-success-box {
            background: #EAF7EA; 
            color: #065f46;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }

        /* Welcome Card */
        .welcome-card {
            background: white;
            border-radius: 10px;
            padding: 2.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            margin-bottom: 2.5rem;
            position: relative;
            border-top: 2px solid #8FB3E2; 
        }
        .welcome-card h2 {
            color: #192338; 
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
            font-weight: 700;
        }
        .welcome-card p {
            color: #606C7B;
            font-size: 1rem;
        }
        .welcome-card .greeting-icon {
            font-size: 1.5rem;
        }

        /* Stat Cards Grid */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px;
            margin-top: 2rem;
        }
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            border-bottom: 3px solid transparent;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        /* PENGATURAN ICON FONT BARU */
        .stat-card .icon {
            font-size: 2.5rem; 
            margin-bottom: 0.5rem;
            color: #31487A; /* YinMn Blue untuk ikon */
            display: block;
        }
        .stat-card .icon i {
             color: inherit; 
        }

        .stat-card h3 {
            color: #192338; 
            font-size: 1.5rem; 
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        .stat-card p {
            color: #606C7B;
            font-size: 0.9rem;
            margin: 0;
            text-transform: uppercase;
        }

        /* Tabs di atas Stat Cards */
        .stat-tabs {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: -1px; 
        }
        .stat-tab-item {
            height: 10px;
            background: #D9E1F1;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .stat-tab-item:nth-child(3) { 
            background: #8FB3E2; 
        }

        /* Menu List */
        .menu-list {
            background: white;
            border-radius: 10px;
            padding: 2.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            margin-top: 2.5rem;
        }
        .menu-list h3 {
            color: #192338;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: 600;
        }
        .menu-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 0;
            color: #333;
            text-decoration: none;
            margin-bottom: 8px;
            transition: color 0.2s ease;
            font-weight: 500;
            border-bottom: 1px solid #F0F0F0;
        }
        .menu-item:hover {
            color: #31487A; 
        }
        
        /* PENGATURAN ICON FONT MENU LIST */
        .menu-item i {
            font-size: 1.2rem;
            color: #31487A;
        }
        
        /* Ikon Checkmark untuk Verifikasi */
        .menu-item:nth-child(2) i,
        .menu-item:nth-child(3) i,
        .menu-item:nth-child(4) i {
            color: #065f46; /* Warna hijau untuk checkmark/verifikasi */
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-house-chimney"></i> Dashboard Admin</h1>
        <div class="user-info">
            <span class="username">{{auth()->user()->name}}</span>
            <form action="{{ route('admin.keluar') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Keluar</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert-success">
            <p>Login berhasil!</p>
            <div class="alert-success-box">
                @if (session('success'))
                    @endif
            </div>
        </div>
        @endif

        <div class="welcome-card">
            <h2>Selamat Datang, Admin<span class="greeting-icon"></span></h2>
            <p>Own Your Career </p>
            <p>Kelola sistem Own Your Career dari sini</p>
            <div style="text-align: right; margin-top: 10px;">
                <span style="display: inline-block; width: 6px; height: 6px; background: #ccc; border-radius: 50%;"></span>
                <span style="display: inline-block; width: 6px; height: 6px; background: #ccc; border-radius: 50%; margin-left: 4px;"></span>
                <span style="display: inline-block; width: 6px; height: 6px; background: #ccc; border-radius: 50%; margin-left: 4px;"></span>
            </div>
        </div>

        <div class="stat-tabs">
            <div class="stat-tab-item"></div>
            <div class="stat-tab-item"></div>
            <div class="stat-tab-item"></div>
            <div class="stat-tab-item"></div>
        </div>

        <div class="card-grid">
            <div class="stat-card">
                <div class="icon"><i class="fa-solid fa-money-bill-wave"></i></div> 
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

        <div class="menu-list">
            <h3>Menu Admin</h3>
            <a href="{{ route('admin.perusahaan.index') }}" class="menu-item">
                <i class="fa-solid fa-circle-check"></i> Verifikasi Perusahaan
            </a>
        
            <a href="{{ route('admin.lowongan.index') }}" class="menu-item">
                <i class="fa-solid fa-circle-check"></i> Verifikasi Lowongan
            </a>
            <a href="{{ route('admin.laporan.rekap') }}" class="menu-item">
                <i class="fa-solid fa-file-lines"></i> Laporan Rekap Pendaftar
            </a>
            <div style="height: 10px; background: #8FB3E2; width: 100%; border-radius: 4px; margin-top: 10px;"></div>
        </div>
    </div>
</body>
</html>