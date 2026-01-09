<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Cari Kerja Squad') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #e9eef7; /* Warna latar biru sangat muda sesuai gambar */
            color: #334155;
        }

        /* Navbar Biru Gelap/Navy sesuai Model */
        .navbar {
            background-color: #232d45 !important; /* Biru Navy Gelap */
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: #ffffff !important;
            display: flex;
            align-items: center;
        }

        .nav-link {
            color: rgba(255,255,255,0.8) !important;
        }

        /* Tombol Keluar sesuai Model */
        .btn-logout {
            background-color: transparent;
            border: 1px solid rgba(255,255,255,0.5);
            color: white;
            border-radius: 8px;
            padding: 5px 15px;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        /* Styling Card */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            font-weight: 600;
            border-radius: 12px 12px 0 0 !important;
        }

        /* Alert Hijau sesuai Model */
        .alert-success {
            background-color: #dcfce7;
            border-left: 5px solid #22c55e; /* Aksen garis hijau */
            color: #166534;
            border-radius: 8px;
            font-weight: 500;
        }

        /* Tombol Utama (Biru) */
        .btn-primary {
            background-color: #3b82f6;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard {{ ucfirst(Auth::user()->peran ?? 'User') }}
            </a>
            
            <div class="ms-auto d-flex align-items-center">
                <span class="text-white me-3 d-none d-md-block">{{ Auth::user()->name ?? 'Guest' }}</span>
                @auth
                <form action="{{ route(Auth::user()->peran . '.keluar') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt me-1"></i> Keluar
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>