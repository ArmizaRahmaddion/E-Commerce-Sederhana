<?php

namespace App\Http\Controllers;

use App\Models\tbproduk;
use App\Models\tbpesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class Authcontroller extends Controller
{
    public function login()
    {
        return view("LoginOrRegist");
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Cek login valid
        if (Auth::attempt($credentials)) {
            // Menyimpan informasi pengguna dalam sesi
            $request->session()->put('user', Auth::user());
            $request->session()->regenerate();

            // Arahkan admin ke dashboard
            if (Auth::user()->role_id == 1) {
                Session::flash('success', 'Login berhasil! Selamat datang, ' . Auth::user()->username . '!');
                Alert::success('Login Success', 'Welcome Back Admin');
                return redirect('admindashboard');
            }
            // Tambahkan SweetAlert untuk notifikasi login sukses
            Session::flash('success', 'Login berhasil! Selamat datang, ' . Auth::user()->username . '!');
            // Arahkan pengguna lain ke halaman utama
            Alert::success('Login Success', 'Selamat Datang Di Ogani');
            return redirect('/layoutuser/index');
        }


        // Tambahkan SweetAlert untuk notifikasi login gagal
        Session::flash('error', 'Login gagal! Username atau password tidak valid.');
        return redirect('/login');
    }

    public function register()
    {

        return view("LoginOrRegist");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login'); // Redirect to login page after logout
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        // Hash the password before storing it
        $validated['password'] = Hash::make($request->password);

        // Add default role_id
        $validated['role_id'] = 2;

        // Create the user with the provided data
        $user = new User();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'];
        $user->role_id = $validated['role_id'];
        $user->save();

        // Flash success message to the session
        Session::flash('status', 'success');
        Session::flash('message', 'Pendaftaran berhasil. Tunggu persetujuan Admin');

        // Redirect to the register page
        return redirect('/login');
    }
}