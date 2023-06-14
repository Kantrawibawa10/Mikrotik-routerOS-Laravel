<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest'])->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $ip = '103.134.245.11';
        $user = 'april';
        $pass = 'jayaselaluwng';

        $data = [
            'ip' => $ip,
            'user' => $user,
            'pass' => $pass,
        ];

        $request->session()->put($data);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'invalid login details');
        }

        return redirect()->route('dashboard');

    }

}
