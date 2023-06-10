<?php

namespace App\Http\Controllers\ODP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ODP;

class ODPController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        try {
            $data = [
                'odp' => ODP::latest()->get(),
            ];

            return view('odp.index', $data);
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.maintenece');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'maps' => 'required',
        ]);

        $id = ODP::latest()->max('id');
        $no = $id + 1;
        $kode = 'ODP'.sprintf("%05s", $no);

        $insert = new ODP();
        $insert->kode_odp = $kode;
        $insert->name = $request['name'];
        $insert->provinsi = $request['provinsi'];
        $insert->kabupaten = $request['kabupaten'];
        $insert->kecamatan = $request['kecamatan'];
        $insert->desa = $request['desa'];
        $insert->alamat = $request['alamat'];
        $insert->maps = $request['maps'];
        $insert->description = $request['comment'];
        $insert->id_users_add = $request['user_add'];
        $insert->save();

        // dd($insert);

        if ($insert) {
            toast('Selamat Data ODP|POP Berhasil ditambahkan', 'success');
            return redirect()->route('ODP.index');
        } else {
            toast('Maaf Data ODP|POP Berhasil ditambahkan', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $data = [
            'edit' => ODP::Where('id', $id)->first(),
            ];

            return view('odp.edit', $data);
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.maintenece');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat' => 'required',
            'maps' => 'required',
        ]);

        $update = ODP::find($request['id']);
        $update->id = $request['id'];
        $update->name = $request['name'];
        $update->provinsi = $request['provinsi'];
        $update->kabupaten = $request['kabupaten'];
        $update->kecamatan = $request['kecamatan'];
        $update->desa = $request['desa'];
        $update->alamat = $request['alamat'];
        $update->maps = $request['maps'];
        $update->description = $request['comment'];
        $update->id_users_add = $request['user_add'];
        $update->save();

        // dd($insert);

        if ($update) {
            toast('Selamat anda Berhasil mengupdate data ODP|POP','success');
            return redirect()->route('ODP.index');
        } else {
            toast('Maaf Data ODP|POP gagal diupdate', 'error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $delete = ODP::find($id)->delete();

        if ($delete) {
            toast('Anda telah menghapus data ODP|POP ','info');
            return redirect()->back();
        } else {
            toast('Maaf Data ODP|POP gagal dihapus', 'error');
            return redirect()->back();
        }
    }
}
