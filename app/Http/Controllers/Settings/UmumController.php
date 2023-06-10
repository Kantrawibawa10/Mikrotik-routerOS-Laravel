<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Umum;

class UmumController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function confapp()
    {
        try {
            $data = [
                'name' => Umum::where('setting', 'Config')->where('name_config', 'conf_perusahaan')->first(),
                'alamat' => Umum::where('setting', 'Config')->where('name_config', 'conf_alamat')->first(),
                'phone' => Umum::where('setting', 'Config')->where('name_config', 'conf_phone')->first(),
                'remind_inv' => Umum::where('setting', 'Config')->where('name_config', 'remind_inv')->first(),
            ];

            return view('setting.umum', $data);
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.500');
        }
    }

    public function setumum(Request $request)
    {
        if (is_array($request->name_config)) {
            foreach ($request->name_config as $key => $name_config) {
                $set = Umum::updateOrCreate(
                    ['name_config' => $name_config],
                    [
                        'value' => $request->value[$key],
                        'setting' => $request->setting[$key],
                    ]
                );
            }
        } else {
            toast('Maaf konfigurasi Profile Perusahaan gagal di lakukan', 'error');
            return redirect()->back();
        }

        if ($set) {
            toast('Konfigurasi Profile Perusahaan berhasil di lakukan','success');
            return redirect()->back();
        } else {
            toast('Maaf konfigurasi Profile Perusahaan gagal di lakukan', 'error');
            return redirect()->back();
        }
    }

    public function tempinv()
    {
        try {
            $data = [
                'logo_inv' => Umum::where('setting', 'Invoice')->where('name_config', 'Logo_INV')->first(),
                'name' => Umum::where('setting', 'Config')->where('name_config', 'conf_perusahaan')->first(),
                'alamat' => Umum::where('setting', 'Config')->where('name_config', 'conf_alamat')->first(),
                'phone' => Umum::where('setting', 'Config')->where('name_config', 'conf_phone')->first(),
            ];

            return view('setting.tempinv', $data);
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.500');
        }
    }

    public function setinv(Request $request)
    {
        if($request->value == '')
        {
            $imageName = "logo.png";
        }
        else{
            $logo = $request->value;
            $imageName = $logo->hashName();
            $logo->move('invoice', $imageName);
        }


        $set = Umum::updateOrCreate([
            'name_config' => $request['name_config'],
            'setting' => $request['setting'],
            'value' => $imageName,
        ]);


        if ($set) {
            toast('Konfigurasi Profile Perusahaan berhasil di lakukan','success');
            return redirect()->back();
        } else {
            toast('Maaf konfigurasi Profile Perusahaan gagal di lakukan', 'error');
            return redirect()->back();
        }
    }
}
