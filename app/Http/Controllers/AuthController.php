<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['login' => 'Username atau password salah'])->withInput();
        }

        Auth::login($user);
        
        // Redirect based on user level
        if ($user->level === 'petugas') {
            return redirect()->route('dashboard-petugas');
        }
        
        return redirect()->route('dashboard');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users|min:3|max:20',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|in:administrator,petugas',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'username.min' => 'Username minimal 3 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'level.required' => 'Level harus dipilih',
            'level.in' => 'Level tidak valid',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/users'), $filename);
            $profilePhotoPath = 'img/users/' . $filename;
        }

        $user = User::create([
            'name' => $request->username,
            'username' => $request->username,
            'email' => $request->username . '@cashier.local',
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'profile_photo' => $profilePhotoPath,
        ]);

        Auth::login($user);
        
        // Redirect based on user level
        if ($user->level === 'petugas') {
            return redirect()->route('dashboard-petugas');
        }
        
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
