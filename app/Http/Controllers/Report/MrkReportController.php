<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Report;
use function Symfony\Component\String\b;


class MrkReportController extends Controller
{
    public function index(Request $request)
    {
        $hari_ini = date("Y-m-d");
        $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));

        $report = Report::latest()->get();
        $view_tgl = "List data Mulai tanggal: $tgl_pertama, Sampai tanggal: $tgl_terakhir";

        return view('traffic.index', compact('report', 'view_tgl'));
    }

    public function search(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        // $report = Report::orderBy('created_at','desc')->whereBetween('created_at', [$tgl_awal, $tgl_akhir])->get();
        $report = Report::orderBy('created_at','desc')->whereDate('created_at', '>=', $tgl_awal)
        ->whereDate('created_at', '<=', $tgl_akhir)->get();

        $view_tgl = "List data Mulai tanggal: $tgl_awal, Sampai tanggal: $tgl_akhir";

        return view('traffic.index',compact('report', 'view_tgl'));
    }


    public function load()
    {
        $data = Report::orderBy('time','desc')->limit('20')->get();

        return view('realtime.load', compact('data'));
    }

    public function up(){

        $textup = new Report();
        $textup->text = '<font color=`ff0000`>Traffic Internet Melebihi Dari 50 Mbps</font>';
        $textup->save();

        return response()->json($textup, 200);
    }

    public function down(){

        $textup = new Report();
        $textup->text = 'Traffic Internet Stabil, Kurang Dari 50 Mbps';
        $textup->save();

        return response()->json($textup, 200);
    }
}
