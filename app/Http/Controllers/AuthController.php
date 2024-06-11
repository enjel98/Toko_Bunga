<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('content.auth.login');
    }

    public function verify(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean("remember"))){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function register()
    {
        return view('content.register.index');
    }

    public function registerProceed(Request $request)
    {
        #tugas buat validasi
        #kondisi semua data ada
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::query()->where('email', $email)->first();
        if ($user !== null) {
            #email sudah digunakan, tidak boleh mendaftar lagi
            return back()->with('gagal', 'Tidak mendaftar menggunakan email yang sama.');
        }
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->is_active = 0;
        $user->token_activation = Str::random(50);
        $user->save();
        #kirim email.
        #Mail::to($user->email)->queue(new RegisterMail($user));
        return redirect()->route('login')->with('success', 'Registrasi Berhasil, cek email anda untuk aktivasi');
    }

    public function registerVerify($token)
    {
        #get user by token
        $user = User::query()->where('token_activation', $token)->first();
        if ($user === null) {
            return redirect('/login')->with('success', 'Token tidak ditemukan');
        }
        #user ada
        $user->token_activation = null;
        $user->is_active = 1;
        $user->save();
        return redirect('/login')->with('success', 'Aktivasi Berhasil, anda sudah bisa login');
    }
}