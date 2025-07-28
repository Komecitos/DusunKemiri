<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Warga;
use App\Models\News;
use App\Models\PerangkatDusun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard'); 
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }


    public function logout()
    {
        session()->forget('admin_logged_in');
        return view('home');
    }


    public function index()
    {
        $jumlahWarga = Warga::count();
        $jumlahBerita = News::count();
        $jumlahJadwal = JadwalKegiatan::count();
        $jumlahPerangkat = PerangkatDusun::count();

        return view('admin.dashboard', compact(
            'jumlahWarga',
            'jumlahBerita',
            'jumlahJadwal',
            'jumlahPerangkat'
        ));
    }
}
