<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RouterosAPI;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {
            $hotspotactive = $API->comm('/ip/hotspot/active/print');
            $resource = $API->comm('/system/resource/print');
            $secret = $API->comm('/ppp/secret/print');
            $secretactive = $API->comm('/ppp/active/print');
            $interface = $API->comm('/interface/ethernet/print');
            $routerboard = $API->comm('/system/routerboard/print');
            $identity = $API->comm('/system/identity/print');

        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }

        $data = [
            'totalsecret' => count($secret),
            'totalhotspot' => count($hotspotactive),
            'hotspotactive' => count($hotspotactive),
            'secretactive' => count($secretactive),
            'cpu' => $resource[0]['cpu-load'],
            'uptime' => $resource[0]['uptime'],
            'version' => $resource[0]['version'],
            'interface' => $interface,
            'boardname' => $resource[0]['board-name'],
            'freememory' => $resource[0]['free-memory'],
            'freehdd' => $resource[0]['free-hdd-space'],
            'model' => $routerboard[0]['model'],
            'identity' => $identity[0]['name'],
        ];

        return view('dashboard', $data);
    }


    public function cpu()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {
            $cpu = $API->comm('/system/resource/print');

        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }

        $data = [
            'cpu' => $cpu['0']['cpu-load'],
        ];

        return view('realtime.cpu', $data);
    }

    public function uptime()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {
            $uptime = $API->comm('/system/resource/print');

        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }

        $data = [
            'uptime' => $uptime['0']['uptime'],
        ];

        return view('realtime.uptime', $data);
    }


    public function traffic($traffic)
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug = false;

        if ($API->connect($ip, $user, $pass)) {
            $traffic = $API->comm('/interface/monitor-traffic', array(
                'interface' => $traffic,
                'once' => '',
            )
            );

            $rx = $traffic[0]['rx-bits-per-second'];
            $tx = $traffic[0]['tx-bits-per-second'];

        } else {
            toast('Session tidak ditemukan','warning');
            return redirect()->route('login');
        }

        $data = [
            'rx' => $rx,
            'tx' => $tx,
        ];

        return view('realtime.traffic', $data);
    }

    public function report()
    {
        $report = Report::latest()->limit('2')->get();

        return view('realtime.report', compact('report'));
    }
}
error_reporting(0);
