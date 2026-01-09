<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelamar - Own Your Career</title>
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
        .login-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 450px;
            width: 100%;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header .icon {
            font-size: 3.5rem;
            margin-bottom: 0.5rem;
            color: #8FB3E2; /* Warna ikon Jordy Blue */
        }
        .login-header h2 {
            color: #192338; /* Oxford Blue */
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .login-header p {
            color: #606C7B;
        }
        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
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
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }
        input:focus {
            outline: none;
            border-color: #31487A; /* YinMn Blue untuk fokus */
            box-shadow: 0 0 0 3px rgba(49, 72, 122, 0.2);
        }
        .error-text {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .checkbox-group input {
            margin-right: 8px;
        }
        .checkbox-group label {
            margin: 0;
            font-weight: normal;
            color: #333;
        }
        .btn {
            width: 100%;
            padding: 14px;
            /* Gradien tombol menggunakan warna palet biru */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(49, 72, 122, 0.3);
            opacity: 0.95;
        }
        .links {
            text-align: center;
            margin-top: 1.5rem;
        }
        .links a {
            color: #31487A; /* Warna link YinMn Blue */
            text-decoration: none;
            display: block;
            margin-top: 0.5rem;
            font-weight: 500;
        }
        .links a strong {
            color: #8FB3E2; /* Jordy Blue untuk penekanan */
        }
        .links a:hover {
            text-decoration: underline;
        }
        .links a i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="icon"><i class="fa-solid fa-user-graduate"></i></div>
            <h2>Login Pelamar</h2>
            <p>Cari lowongan impianmu</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('pelamar.masuk') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="checkbox-group">
                <input type="checkbox" name="ingat_saya" id="ingat_saya">
                <label for="ingat_saya">Ingat saya</label>
            </div>

            <button type="submit" class="btn">Masuk</button>
        </form>

        <div class="links">
            <a href="{{ route('pelamar.daftar') }}"><strong>Belum punya akun? Daftar di sini</strong></a>
            <a href="{{ route('pilih.peran') }}"><i class="fa-solid fa-arrow-left"></i> Kembali ke Pilih Peran</a>
        </div>
    </div>
</body>
</html>