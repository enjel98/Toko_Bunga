<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestingController extends Controller
{
    public function changePassword()
    {
        return view('content.user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);

        $user = Auth::user();

        if (password_verify($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return back()->with('berhasil', 'Password berhasil diubah');
        }

        return back()->withErrors(['old_password' => 'Password lama salah.'])->withInput();
    }
}
