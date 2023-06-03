<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip' => 'required',
            'user' => 'required',
        ]);

        $ip = $request->post('ip');
        $user = $request->post('user');
        $pass = $request->post('pass');

        $data = [
            'ip' => $ip,
            'user' => $user,
            'pass' => $pass,
        ];

        $request->session()->put($data);
        toast('Anda berhasil login','success');
        return redirect()->route('dashboard');
    }

}
