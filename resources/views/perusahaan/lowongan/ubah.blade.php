<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lowongan - Own Your Career</title>
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
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .navbar h1 { 
            font-size: 1.5rem; 
            font-weight: 600;
        }

        .container { 
            max-width: 800px; 
            margin: 2rem auto; 
            padding: 0 20px; 
        }
        .card { 
            background: white; 
            border-radius: 15px; 
            padding: 2rem; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-top: 5px solid #8FB3E2; 
        }
        
        /* Form Elements */
        .form-group { 
            margin-bottom: 1.5rem; 
        }
        label { 
            display: block; 
            color: #31487A; /* YinMn Blue */
            font-weight: 600; 
            margin-bottom: 0.5rem; 
            display: flex;
            align-items: center;
        }
        label i {
            margin-right: 8px;
            color: #192338;
        }
        label span { 
            color: #ef4444; /* Merah untuk tanda bintang */
            margin-left: 4px;
        }
        input, textarea, select { 
            width: 100%; 
            padding: 12px 15px; 
            border: 2px solid #D9E1F1; /* Border Lavender */
            border-radius: 10px; 
            font-size: 1rem; 
            font-family: inherit;
            color: #192338;
            transition: border-color 0.3s;
        }
        textarea { 
            min-height: 120px; 
            resize: vertical; 
        }
        input:focus, textarea:focus, select:focus { 
            outline: none; 
            border-color: #8FB3E2; /* Border fokus Jordy Blue */
            box-shadow: 0 0 0 3px rgba(143, 179, 226, 0.4);
        }
        .error-text { 
            color: #ef4444; 
            font-size: 0.85rem; 
            margin-top: 0.5rem; 
        }
        
        /* Buttons */
        .btn-group { 
            display: flex; 
            gap: 15px; 
            margin-top: 2rem; 
        }
        .btn { 
            padding: 14px 30px; 
            border-radius: 10px; 
            font-size: 1.1rem; 
            font-weight: bold; 
            cursor: pointer; 
            text-decoration: none; 
            display: inline-flex; 
            align-items: center;
            text-align: center;
            transition: all 0.3s ease;
        }
        .btn i {
            margin-right: 8px;
        }
        .btn-primary { 
            /* Gradien tombol primary */
            background: linear-gradient(135deg, #8FB3E2 0%, #31487A 100%); 
            color: white; 
            border: none;
            flex-grow: 1; 
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(49, 72, 122, 0.3);
        }
        .btn-secondary { 
            background: #606C7B; /* Abu-abu gelap */
            color: white; 
            border: none;
        }
        .btn-secondary:hover {
            background: #4b5563;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1><i class="fa-solid fa-edit"></i> Edit Lowongan</h1>
    </nav>

    <div class="container">
        <div class="card">
            <form action="{{ route('perusahaan.lowongan.perbarui', $lowongan->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="posisi"><i class="fa-solid fa-user-tie"></i> Posisi <span>*</span></label>
                    <input type="text" name="posisi" id="posisi" value="{{ old('posisi', $lowongan->posisi) }}" required>
                    @error('posisi')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="tipe"><i class="fa-solid fa-tag"></i> Tipe Lowongan <span>*</span></label>
                    <select name="tipe" id="tipe" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="magang" {{ old('tipe', $lowongan->tipe) == 'magang' ? 'selected' : '' }}>Magang</option>
                        <option value="kerja" {{ old('tipe', $lowongan->tipe) == 'kerja' ? 'selected' : '' }}>Kerja</option>
                    </select>
                    @error('tipe')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="lokasi"><i class="fa-solid fa-map-marker-alt"></i> Lokasi <span>*</span></label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $lowongan->lokasi) }}" required>
                    @error('lokasi')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="batas_akhir"><i class="fa-solid fa-calendar-times"></i> Batas Akhir Pendaftaran <span>*</span></label>
                    <input type="date" name="batas_akhir" id="batas_akhir" value="{{ old('batas_akhir', $lowongan->batas_akhir->format('Y-m-d')) }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                    @error('batas_akhir')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi"><i class="fa-solid fa-file-alt"></i> Deskripsi Pekerjaan <span>*</span></label>
                    <textarea name="deskripsi" id="deskripsi" required>{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="persyaratan"><i class="fa-solid fa-check-double"></i> Persyaratan <span>*</span></label>
                    <textarea name="persyaratan" id="persyaratan" required>{{ old('persyaratan', $lowongan->persyaratan) }}</textarea>
                    @error('persyaratan')<div class="error-text">{{ $message }}</div>@enderror
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
                    <a href="{{ route('perusahaan.lowongan.detail', $lowongan->id) }}" class="btn btn-secondary"><i class="fa-solid fa-times"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>