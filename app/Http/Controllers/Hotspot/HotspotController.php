<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\RouterosAPI;

class HotspotController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {

            $hotspotuser = $API->comm('/ip/hotspot/user/print');
            $server = $API->comm('/ip/hotspot/print');
            $profile = $API->comm('/ip/hotspot/user/profile/print');


            $data = [
                'totalhotspotuser' => count($hotspotuser),
                'hotspotuser' => $hotspotuser,
                'server' => $server,
                'profile' => $profile,
            ];

            return view('hotspot.user', $data);
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }


    public function store(Request $request)
    {
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

            $API->comm('/ip/hotspot/user/add', [
                'name' => $request['user'],
                'password' => $request['password'],
                'server' => $request['server']  == '' ? '' : $request['server'],
                'profile' => $request['profile'] == '' ? 'default' : $request['profile'],
                'limit-uptime' => $request['timelimit'] == '' ? '0' : $request['timelimit'],
                'comment' => $request['comment'] == '' ? '' : $request['comment'],
            ]);

            Alert::success('Success', 'Selamat anda Berhasil menambhakan user Hotspot');
            return redirect('hotspot/users');

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
            $getuser = $API->comm('/ip/hotspot/user/print', array(
                "?.id" => '*' . $id,
            ));
            $server = $API->comm('/ip/hotspot/print');
            $profile = $API->comm('/ip/hotspot/user/profile/print');

            $data = [
                'user' => $getuser[0],
                'server' => $server,
                'profile' => $profile,
            ];

            return view('hotspot.edit', $data);

        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }



    public function update(Request $request)
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {

            $API->comm("/ip/hotspot/user/set", [
                ".id" => $request['id'],
                'name' => $request['user'],
                'password' => $request['password'],
                'server' => $request['server'],
                'profile' => $request['profile'],
                'disabled' => $request['disabled'],
                'limit-uptime' => $request['timelimit'] == '' ? '0' : $request['timelimit'],
                'comment' => $request['comment'] == '' ? '' : $request['comment'],
            ]);

            Alert::success('Success', 'Selamat anda Berhasil mengupdate user Hotspot');
            return redirect('hotspot/users');
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

            $API->comm('/ip/hotspot/user/remove', [
                '.id' => '*' . $id
            ], );

            Alert::success('Success', 'Selamat anda Berhasil menghapus User Hotspot');
            return redirect('hotspot/users');
        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }
    }


}
