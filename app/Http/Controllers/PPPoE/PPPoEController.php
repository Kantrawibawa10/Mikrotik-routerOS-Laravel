<?php

namespace App\Http\Controllers\PPPoE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\RouterosAPI;

class PPPoEController extends Controller
{
    public function index()
    {

        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {
            $profile = $API->comm('/ppp/profile/print');
            $secret = $API->comm('/ppp/secret/print');
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }

        $data = [
            'totalsecret' => count($secret),
            'secret' => $secret,
            'profile' => $profile,
        ];

        return view('pppoe.secret', $data);
    }


    public function store(Request $request)
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        $request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

        if ($API->connect($ip, $user, $pass)) {
            $API->comm('/ppp/secret/add', [
                'name' => $request['user'],
                'password' => $request['password'],
                'service' => $request['service'] == '' ? 'any' : $request['service'],
                'profile' => $request['profile'] == '' ? 'default' : $request['profile'],
                'local-address' => $request['localaddress'] == '' ? '0.0.0.0' : $request['localaddress'],
                'remote-address' => $request['remoteaddress'] == '' ? '0.0.0.0' : $request['remoteaddress'],
                'comment' => $request['comment'] == '' ? '' : $request['comment'],
            ]);

            // dd($request->all());

            toast('Selamat anda Berhasil menambahkan secret PPPoE','success');
            return redirect()->route('pppoe.secret');
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }



    public function edit($id)
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {

            $getuser = $API->comm('/ppp/secret/print', [
                "?.id" => '*' . $id,
            ]);

            $secret = $API->comm('/ppp/secret/print');
            $profile = $API->comm('/ppp/profile/print');

            $data = [
                'user' => $getuser[0],
                'secret' => $secret,
                'profile' => $profile,
            ];

            return view('pppoe.edit', $data);
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }


    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {
            $API->comm("/ppp/secret/set", [
                '.id' => $request['id'],
                'name' => $request['user'] == '' ? '' : $request['user'],
                'password' => $request['password'] == '' ? '' : $request['password'],
                'service' => $request['service'] == '' ? '' : $request['service'],
                'profile' => $request['profile'] == '' ? '' : $request['profile'],
                'local-address' => $request['localaddress'] == '' ? '' : $request['localaddress'],
                'remote-address' => $request['remoteaddress'] == '' ? '' : $request['remoteaddress'],
                'disabled' => $request['disabled'] == '' ? '' : $request['disabled'],
                'comment' => $request['comment'] == '' ? '' : $request['comment'],
            ]);

            toast('Selamat anda Berhasil mengupdate secret PPPoE','success');
            return redirect()->route('pppoe.secret');
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }

    public function nonaktif(Request $request)
    {
        // dd($request->all());

        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {
            $API->comm("/ppp/secret/set", [
                '.id' => $request['id'],
                'disabled' => $request['disabled'] == '' ? '' : $request['disabled'],
            ]);

            toast('Secret PPPoE disabled Berhasil di lakukan','success');
            return redirect()->route('pppoe.secret');
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }


    public function delete($id)
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {

            $API->comm('/ppp/secret/remove', [
                '.id' => '*' . $id
            ], );

            toast('Anda telah menghapus secret PPPoE ','info');
            return redirect()->route('pppoe.secret');
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }
}
