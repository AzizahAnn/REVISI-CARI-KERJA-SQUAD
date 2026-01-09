<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelamar - Own Your Career</title>
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
            /* Gradien biru gelap baru */
            background: linear-gradient(135deg, #31487A 0%, #192338 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .register-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 600px;
            margin: 0 auto;
        }
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .register-header .icon {
            font-size: 3.5rem;
            margin-bottom: 0.5rem;
            color: #31487A;
        }
        .register-header h2 {
            color: #192338;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .register-header p {
            color: #606C7B;
        }
        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        .alert-error {
            background: #fecaca;
            color: #b91c1c;
            border-left: 4px solid #ef4444;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            color: #192338;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        label span {
            color: #ef4444;
        }
        input[type="email"],
        input[type="password"],
        input[type="text"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }
        textarea {
            min-height: 80px;
            resize: vertical;
        }
        input:focus,
        textarea:focus {
            outline: none;
            border-color: #8FB3E2;
            box-shadow: 0 0 0 3px rgba(143, 179, 226, 0.4);
        }
        .error-text {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(49, 72, 122, 0.3);
            opacity: 0.9;
        }
        .links {
            text-align: center;
            margin-top: 1.5rem;
        }
        .links p, .links a {
            color: #31487A;
            text-decoration: none;
            font-weight: 500;
        }
        .links a:hover {
            text-decoration: underline;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <div class="icon"><i class="fa-solid fa-user-tie"></i></div>
            <h2>Daftar Pelamar</h2>
            <p>Mulai perjalanan kariermu bersama kami</p>
        </div>

        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('pelamar.daftar') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap <span>*</span></label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                @error('nama_lengkap')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="no_identitas">No. Identitas <span>*</span></label>
                    <input type="text" name="no_identitas" id="no_identitas" value="{{ old('no_identitas') }}" placeholder="KTP/SIM/dll" required>
                    @error('no_identitas')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bidang_keahlian">Bidang Keahlian <span>*</span></label>
                    <input type="text" name="bidang_keahlian" id="bidang_keahlian" value="{{ old('bidang_keahlian') }}" placeholder="Cth: IT, Desain, dll" required>
                    @error('bidang_keahlian')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email <span>*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password <span>*</span></label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password <span>*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <label for="no_telp">Nomor Telepon <span>*</span></label>
                <input type="tel" name="no_telp" id="no_telp" value="{{ old('no_telp') }}" placeholder="08xxxxxxxxxx" required>
                @error('no_telp')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat (Opsional)</label>
                <textarea name="alamat" id="alamat" placeholder="Alamat lengkap Anda...">{{ old('alamat') }}</textarea>
                @error('alamat')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Daftar Sekarang</button>
        </form>

        <div class="links">
            <p>Sudah punya akun? <a href="{{ route('pelamar.masuk') }}">Masuk di sini</a></p>
            <a href="{{ route('pilih.peran') }}"><i class="fa-solid fa-arrow-left"></i> Kembali ke Pilih Peran</a>
        </div>
    </div>
</body>
</html>