<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelamar - Own Your Career</title>
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
        
        /* Navigasi */
        .navbar {
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
        .logout-btn {
            padding: 8px 20px;
            background: rgba(255,255,255,0.2);
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
            font-size: 2rem;
        }
        .welcome-card p {
            color: #606C7B;
        }
        .info-box {
            /* Info Box menggunakan warna palet */
            background: #D9E1F1; 
            border-left: 4px solid #31487A;
            padding: 15px 20px;
            border-radius: 10px;
            margin-top: 15px;
        }
        .info-box p {
            margin: 5px 0;
            color: #31487A;
            font-weight: 500;
        }
        
        /* Stat Cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 2rem;
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .stat-card .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #8FB3E2; /* Warna ikon utama */
        }
        .stat-card h3 {
            color: #192338;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .stat-card p {
            color: #606C7B;
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
        }
        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            background: #f9fafb;
            border-radius: 10px;
            color: #192338;
            text-decoration: none;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .menu-item i {
            margin-right: 15px;
            font-size: 1.2rem;
        }
        .menu-item:hover {
            background: linear-gradient(90deg, #8FB3E2 0%, #31487A 100%);
            color: white;
            transform: translateX(5px);
        }
        
        /* Alert Success */
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #10b981;
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
        <h1><i class="fa-solid fa-gauge-high"></i> Dashboard Pelamar</h1>
        <div class="user-info">
            <span>{{ auth()->user()->name }}</span>
            <form action="{{ route('pelamar.keluar') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn"><i class="fa-solid fa-sign-out-alt"></i> Keluar</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert-success">
            <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        <div class="welcome-card">
            <h2>Selamat Datang, {{ auth()->user()->pelamar->nama_lengkap }}!</h2>
            <p>Temukan lowongan magang dan kerja impianmu</p>
            
            <div class="info-box">
                <p><i class="fa-solid fa-id-card"></i> <strong>No. Identitas:</strong> {{ auth()->user()->Pelamar->no_identitas }}</p>
                <p><i class="fa-solid fa-graduation-cap"></i> <strong>Bidang Keahlian:</strong> {{ auth()->user()->Pelamar->bidang_keahlian }}</p>
            </div>
        </div>

    <div class="card-grid">
        <div class="stat-card" style="border-bottom: 5px solid #8FB3E2;">
            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
            <h3>{{ $totalLowongan }}</h3>
            <p>Lowongan Tersedia</p>
        </div>
        <div class="stat-card" style="border-bottom: 5px solid #31487A;">
            <div class="icon"><i class="fa-solid fa-file-contract"></i></div>
            <h3>{{ $totalLamaran }}</h3>
            <p>Lamaran Terkirim</p>
        </div>
        <div class="stat-card" style="border-bottom: 5px solid #D9E1F1; color: #31487A;">
            <div class="icon"><i class="fa-solid fa-clock"></i></div>
            <h3>{{ $lamaranMenunggu }}</h3>
            <p>Menunggu Review</p>
        </div>
        <div class="stat-card" style="border-bottom: 5px solid #10b981;">
            <div class="icon" style="color: #10b981;"><i class="fa-solid fa-check-circle"></i></div>
            <h3>{{ $lamaranDiterima }}</h3>
            <p>Lamaran Diterima</p>
        </div>
    </div>
    
    <div class="menu-list">
        <h3><i class="fa-solid fa-bars"></i> Menu Utama</h3>
        <a href="{{ route('pelamar.lowongan.index') }}" class="menu-item"><i class="fa-solid fa-search"></i> Cari Lowongan</a>
        <a href="{{ route('pelamar.lamaran.index') }}" class="menu-item"><i class="fa-solid fa-clipboard-list"></i> Riwayat Lamaran Saya</a>
    </div>

    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Own Your Career. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>