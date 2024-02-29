<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('sesi/index');
    }

    function login(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha'  => 'required'
        ], [
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
            'captcha.required' =>  'Captcha harus diisi.',
        ]);

        $infoLogin = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($infoLogin)) {
            return redirect('user')->with('success', 'Berhasil login.');
        } else {
            return redirect('sesi')->withErrors('Username dan password tidak valid.');
        }
    }

    function logout()
    {
        Auth::logout();

        return redirect('sesi')->with('success', 'Anda sudah logout.');
    }
}
