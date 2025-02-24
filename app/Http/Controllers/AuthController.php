<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    public function doRegist(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|numeric|min:11',
        ], [
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'phone_number' => $validatedData['phone_number'],
            'role' => 2,
            'balance' => 0,
        ]);
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }
    public function doLogin(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Coba login dengan email dan password
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            // Login berhasil
            $request->session()->regenerate(); // Mencegah session fixation
            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email'); // Agar email tetap terisi di form
    }
    public function doLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
    public function change_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ], [
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $password = $validatedData['password'];
        $user = User::findOrFail(Auth::id());
        $user->password = bcrypt($password);
        $user->save();

        return redirect()->route('profile')->with('success', 'password berhasil diubah');
    }
    public function add_address(Request $request)
    {
        $address = Address::create([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('profile')->with('success', 'Berhasil Menambahkan Alamat Baru');
    }
    public function del_address($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('profile')->with('success', 'Berhasil Menghapus Alamat Lama');
    }
}
