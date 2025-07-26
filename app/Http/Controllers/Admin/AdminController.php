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


class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $admin = DB::table('admins')->where('username', $username)->first();

        if ($admin && Hash::check($password, $admin->password)) {
        }

        if ($admin) {
            session(['admin_logged_in' => true]);
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return view('auth.logout-close');
    }


    public function index()
    {
        $jumlahWarga = Warga::count();
        $jumlahBerita = News::count();

        return view('admin.dashboard', [
            'jumlahWarga' => Warga::count(),
            'jumlahBerita' => News::count(),
            'jumlahJadwal' => JadwalKegiatan::count(),
            'jumlahPerangkat' => PerangkatDusun::count()
        ]);    }
}
