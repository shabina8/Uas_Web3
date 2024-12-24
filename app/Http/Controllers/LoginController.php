<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjam;
use App\Models\Penulis;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function dashboard() {
        $total_karyawan = Staff::count();
        $total_member = Anggota::count();
        $total_Kategori = Kategori::count();
        $total_penulis = Penulis::count();
        $total_buku = Buku::count();
        $total_peminjam = Peminjam::count();
        return view('pages.dashboard', compact('total_karyawan', 'total_member', 'total_Kategori', 'total_penulis','total_buku','total_peminjam'));
    }
    public function login(Request $request) {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password'=> 'required' 
         ], [
            'email.required' => 'Kolom Email tidak boleh kosong.',
            'password.required' => 'Kolom Password tidak boleh kosong.',
        ]);


         if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            if ($user->role === 'Admin' || $user->role === 'Karyawan') {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with('wrong', 'Role tidak Ditemukan !');
            }
        } else {
            return redirect('/')->with('wrong', 'Email dan password tidak tersedia');
        }
    }

    public function logout() {
        if (Auth::check()) {
            $role = Auth::user()->role;
    
           if ($role === 'Admin' || $role === 'Karyawan') {
                Auth::logout();
            }
        } 
        return redirect('/');
    }
}