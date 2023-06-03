<?php

namespace App\Http\Controllers\Tiang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tiang;

class TiangController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'tiang' => Tiang::latest()->get(),
            ];

            return view('tiang.index', $data);
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

        $id = Tiang::latest()->max('id');
        $no = $id + 1;
        $kode = 'Tiang'.sprintf("%05s", $no);

        $insert = new Tiang();
        $insert->kode_tiang = $kode;
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
            toast('Selamat Data Tiang Berhasil ditambahkan', 'success');
            return redirect()->route('tiang.index');
        } else {
            toast('Maaf Data Tiang Berhasil ditambahkan', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $data = [
            'edit' => Tiang::Where('id', $id)->first(),
            ];

            return view('tiang.edit', $data);
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

        $update = Tiang::find($request['id']);
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
            toast('Selamat anda Berhasil mengupdate data Tiang','success');
            return redirect()->route('tiang.index');
        } else {
            toast('Maaf Data Tiang gagal diupdate', 'error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $delete = Tiang::find($id)->delete();

        if ($delete) {
            toast('Anda telah menghapus data Tiang ','info');
            return redirect()->back();
        } else {
            toast('Maaf Data Tiang gagal dihapus', 'error');
            return redirect()->back();
        }
    }
}
