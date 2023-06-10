<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\API;
use App\Models\Config;

class APIController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function waconf()
    {
        try {
            $data = [
                'api' => API::where('setting', 'WA_API')->first(),
                'domain' => Config::where('setting', 'WA_API')->where('name_config', 'domainAPI_WA')->first(),
                'phone' => Config::where('setting', 'WA_API')->where('name_config', 'wa_API_phone')->first(),
                'phonecs' => Config::where('setting', 'WA_API')->where('name_config', 'wa_API_phone_cs')->first(),
                'notif1' => Config::where('setting', 'WA_API')->where('name_config', 'notif1')->first(),
                'notif2' => Config::where('setting', 'WA_API')->where('name_config', 'notif2')->first(),
                'notif3' => Config::where('setting', 'WA_API')->where('name_config', 'notif3')->first(),
            ];

            return view('setting.waconf', $data);
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.500');
        }
    }


    public function set(Request $request)
    {
        $request->validate([
            'setting' => 'required',
            'api' => 'required',
        ]);

        $set = new API();
        $set->setting = "WA_API";
        $set->save();
        $set = API::where('setting', 'WA_API')->first();
        $set->api = $request['api'];
        $set->description = $request['description'] == '' ? 'Belum ada deskripsi' : $request['description'];
        $set->save();

        if (is_array($request->name_config)) {
            foreach ($request->name_config as $key => $name_config) {
                $set = Config::updateOrCreate(
                    ['name_config' => $name_config],
                    [
                        'value' => $request->value[$key],
                        'setting' => $request->setting[$key],
                    ]
                );
            }
        } else {
            toast('Maaf konfigurasi API Whatsaap gagal di lakukan', 'error');
            return redirect()->back();
        }

        if ($set) {
            toast('Konfigurasi API Whatsaap berhasil di lakukan','success');
            return redirect()->back();
        } else {
            toast('Maaf konfigurasi API Whatsaap gagal di lakukan', 'error');
            return redirect()->back();
        }
    }


    public function doku()
    {
        try {
            $data = [
                'secret' => API::where('setting', 'DOKU_API')->first(),
                'client' => Config::where('setting', 'DOKU_API')->where('name_config', 'client_DOKU')->first(),
            ];

            return view('setting.doku', $data);
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.500');
        }
    }


    public function setdoku(Request $request)
    {
        $request->validate([
            'setting' => 'required',
            'value' => 'required',
        ]);

        // SK-EeaNUaKrr4SFEDJWSCXi
        $set = new API();
        $set->setting = "DOKU_API";
        $set->save();
        $set = API::where('setting', 'DOKU_API')->first();
        $set->api = $request['api'];
        $set->description = $request['description'] == '' ? 'Belum ada deskripsi' : $request['description'];
        $set->save();

        if (is_array($request->name_config)) {
            foreach ($request->name_config as $key => $name_config) {
                $set = Config::updateOrCreate(
                    ['name_config' => $name_config],
                    [
                        'value' => $request->value[$key],
                        'setting' => $request->setting[$key],
                    ]
                );
            }
        } else {
            toast('Maaf konfigurasi API DOKU gagal di lakukan', 'error');
            return redirect()->back();
        }

        if ($set) {
            toast('Konfigurasi API DOKU berhasil di lakukan','success');
            return redirect()->back();
        } else {
            toast('Maaf konfigurasi API DOKU gagal di lakukan', 'error');
            return redirect()->back();
        }
    }

    public function gmaps()
    {
        try {
            // $data = [
            //     'secret' => API::where('setting', 'DOKU_API')->first(),
            //     'client' => Config::where('setting', 'DOKU_API')->where('name_config', 'client_DOKU')->first(),
            // ];
            return view('setting.gmaps');
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.500');
        }
    }
}
