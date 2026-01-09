@extends('layouts.app') @section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header"><h4>Edit Profil</h4></div>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf @method('PUT')
            <div class="card-body">
                @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
                @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

                <div class="mb-3">
                    <label>Nama Akun</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>

                @if($user->peran === 'pelamar')
                    <div class="mb-3">
                        <label>Nomor Identitas</label>
                        <input type="text" name="no_identitas" class="form-control" value="{{ old('no_identitas', $user->pelamar->no_identitas) }}">
                    </div>
                    <div class="mb-3">
                        <label>Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', $user->pelamar->bidang_keahlian) }}">
                    </div>
                    <div class="mb-3">
                        <label>Telepon</label>
                        <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $user->pelamar->no_telp) }}">
                    </div>
                @elseif($user->peran === 'perusahaan')
                    <div class="mb-3">
                        <label>Alamat Kantor</label>
                        <textarea name="alamat" class="form-control">{{ old('alamat', $user->perusahaan->alamat) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $user->perusahaan->deskripsi) }}</textarea>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection