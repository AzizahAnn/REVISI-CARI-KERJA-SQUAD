<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController
{
    public function show()
    {
        try {
            $user = auth()->user();
            
            if ($user->peran === 'pelamar') {
                $user->load('pelamar');
            } elseif ($user->peran === 'perusahaan') {
                $user->load('perusahaan');
            }
            
            return view('profile.show', compact('user'));
            
        } catch (\Exception $e) {
            \Log::error('Show profile error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat profil');
        }
    }
    
    public function edit()
    {
        try {
            $user = auth()->user();
            
            if ($user->peran === 'pelamar') {
                $user->load('pelamar');
            } elseif ($user->peran === 'perusahaan') {
                $user->load('perusahaan');
            }
            
            return view('profile.edit', compact('user'));
            
        } catch (\Exception $e) {
            \Log::error('Edit profile form error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat membuka form edit');
        }
    }
    
    public function update(Request $request)
    {
        try {
            $user = auth()->user();
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable|string|max:15',
            ]);
            
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            
            if ($user->peran === 'pelamar' && $user->pelamar) {
                $user->pelamar->update([
                    'nama_lengkap' => $request->name,
                    'no_telp' => $request->phone,
                ]);
            } elseif ($user->peran === 'perusahaan' && $user->perusahaan) {
                $user->perusahaan->update([
                    'no_telp' => $request->phone,
                ]);
            }
            
            \Log::info('Profil di-update', ['user_id' => $user->id]);
            
            return back()->with('success', 'Profil berhasil diperbarui!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Update profile error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengupdate profil');
        }
    }
    
    public function updatePassword(Request $request)
    {
        try {
            $user = auth()->user();
            
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|string|min:6|confirmed',
            ]);
            
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Password lama tidak sesuai');
            }
            
            $user->update(['password' => Hash::make($request->new_password)]);
            
            \Log::info('Password di-update', ['user_id' => $user->id]);
            
            return back()->with('success', 'Password berhasil diperbarui!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Update password error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengupdate password');
        }
    }
    
    public function updateAvatar(Request $request)
    {
        try {
            $request->validate(['avatar' => 'required|image|max:2048']);
            
            $user = auth()->user();
            
            if ($user->avatar && \Storage::exists('public/' . $user->avatar)) {
                \Storage::delete('public/' . $user->avatar);
            }
            
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            
            $user->update(['avatar' => $avatarPath]);
            
            \Log::info('Avatar di-update', ['user_id' => $user->id]);
            
            return back()->with('success', 'Foto profil berhasil diperbarui!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Update avatar error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengupdate foto profil');
        }
    }
}