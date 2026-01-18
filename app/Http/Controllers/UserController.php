<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->map(function ($user) {
            // Determine if user is online (active within last 10 seconds)
            $lastActivity = $user->last_activity ? Carbon::parse($user->last_activity) : null;
            $isOnline = $lastActivity && $lastActivity->diffInSeconds(now()) <= 10;
            
            $user->is_online = $isOnline;
            $user->status = $isOnline ? 'Online' : 'Offline';
            
            return $user;
        });
        
        return view('accounts.index', compact('users'));
    }

    public function show(User $user)
    {
        // Determine if user is online
        $lastActivity = $user->last_activity ? Carbon::parse($user->last_activity) : null;
        $isOnline = $lastActivity && $lastActivity->diffInSeconds(now()) <= 10;
        
        $user->is_online = $isOnline;
        $user->status = $isOnline ? 'Online' : 'Offline';
        
        return view('accounts.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('accounts.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username,' . $user->id . '|min:3|max:20',
            'level' => 'required|in:administrator,petugas',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'username.min' => 'Username minimal 3 karakter',
            'level.required' => 'Level harus dipilih',
            'level.in' => 'Level tidak valid',
            'profile_photo.image' => 'File harus berupa gambar',
            'profile_photo.mimes' => 'Format gambar harus JPG, PNG, atau GIF',
            'profile_photo.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Handle image upload
        if ($request->hasFile('profile_photo')) {
            // Delete old image if exists
            if ($user->profile_photo && file_exists(public_path($user->profile_photo))) {
                unlink(public_path($user->profile_photo));
            }

            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/users'), $filename);
            $validated['profile_photo'] = 'img/users/' . $filename;
        }

        $user->update($validated);

        return redirect()->route('accounts.show', $user)->with('success', 'Akun berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        // Delete profile photo if exists
        if ($user->profile_photo && file_exists(public_path($user->profile_photo))) {
            unlink(public_path($user->profile_photo));
        }

        $user->delete();

        return redirect()->route('accounts.index')->with('success', 'Akun berhasil dihapus');
    }

    // Petugas Profile Methods
    public function petugasProfile()
    {
        $user = auth()->user();
        return view('petugas.profile', compact('user'));
    }

    public function petugasUpdateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|unique:users,username,' . $user->id . '|min:3|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ], [
            'name.required' => 'Nama harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'username.min' => 'Username minimal 3 karakter',
            'profile_photo.image' => 'File harus berupa gambar',
            'profile_photo.mimes' => 'Format gambar harus JPG, PNG, atau GIF',
            'profile_photo.max' => 'Ukuran gambar maksimal 2MB',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Handle image upload
        if ($request->hasFile('profile_photo')) {
            // Delete old image if exists
            if ($user->profile_photo && file_exists(public_path($user->profile_photo))) {
                unlink(public_path($user->profile_photo));
            }

            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/users'), $filename);
            $validated['profile_photo'] = 'img/users/' . $filename;
        }

        // Handle password
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('petugas.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
