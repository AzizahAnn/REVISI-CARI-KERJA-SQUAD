<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peran - Own Your Career</title>
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
            /* Gradien biru gelap konsisten */
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            font-weight: 700;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        .card {
            background: white;
            border-radius: 15px; /* Konsisten */
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            border-bottom: 5px solid transparent; /* Base border */
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.3);
        }
        .card-icon {
            font-size: 3.5rem;
            margin-bottom: 0.5rem;
            color: #8FB3E2; /* Ikon utama Jordy Blue */
        }
        .card h2 {
            color: #192338; /* Oxford Blue */
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }
        .card p {
            color: #606C7B;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            min-height: 72px; /* Menjaga tinggi kartu konsisten */
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            /* Gradien tombol konsisten */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(49, 72, 122, 0.2);
        }
        .btn:hover {
            transform: scale(1.03);
            opacity: 0.95;
        }
        
        /* Pewarnaan Border Kartu & Link Pendaftaran/Utama */
        .admin { border-bottom-color: #31487A; } /* YinMn Blue */
        .admin .btn { background: linear-gradient(135deg, #31487A 0%, #192338 100%); }
        .admin .btn:hover { box-shadow: 0 5px 20px rgba(25, 35, 56, 0.4); }

        .perusahaan { border-bottom-color: #8FB3E2; } /* Jordy Blue */
        .perusahaan-link { color: #31487A !important; font-weight: 600; } 

        .pelamar { border-bottom-color: #8FB3E2; } /* Jordy Blue */
        .pelamar-link { color: #31487A !important; font-weight: 600; } 
        
        .card a.link-daftar {
            text-decoration: none;
            font-size: 0.9rem;
            display: block;
            margin-top: 0.5rem;
            transition: color 0.3s;
        }
        .card a.link-daftar:hover {
            text-decoration: underline;
        }

        .back-btn {
            display: block;
            text-align: center;
            color: #D9E1F1; /* Lavender */
            text-decoration: none;
            margin-top: 2.5rem;
            opacity: 0.9;
            font-weight: 500;
        }
        .back-btn:hover {
            opacity: 1;
            text-decoration: underline;
        }
        .back-btn i {
            margin-right: 5px;
        }

        @media (max-width: 600px) {
            .card p {
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Masuk Sebagai</h1>
        
        <div class="card-container">
            <div class="card admin">
                <div class="card-icon"><i class="fa-solid fa-lock"></i></div>
                <h2>Admin</h2>
                <p>Kelola sistem, verifikasi perusahaan dan lowongan</p>
                <a href="{{ route('admin.masuk') }}" class="btn">Masuk Admin</a>
            </div>
            
            <div class="card perusahaan">
                <div class="card-icon"><i class="fa-solid fa-building"></i></div>
                <h2>Perusahaan</h2>
                <p>Posting lowongan dan lihat pelamar</p>
                <a href="{{ route('perusahaan.masuk') }}" class="btn">Masuk Perusahaan</a>
                <br>
                <a href="{{ route('perusahaan.daftar') }}" class="link-daftar perusahaan-link">Belum punya akun? Daftar</a>
            </div>
            
            <div class="card pelamar">
                <div class="card-icon"><i class="fa-solid fa-user-graduate"></i></div>
                <h2>Pelamar</h2>
                <p>Cari lowongan dan kirim lamaran</p>
                <a href="{{ route('pelamar.masuk') }}" class="btn">Masuk Pelamar</a>
                <br>
                <a href="{{ route('pelamar.daftar') }}" class="link-daftar pelamar-link">Belum punya akun? Daftar</a>
            </div>
        </div>
        
        <a href="{{ route('beranda') }}" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda</a>
    </div>
</body>
</html>