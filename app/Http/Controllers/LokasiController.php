<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LokasiController extends Controller
{

    public function index()
    {
        $data = Lokasi::paginate(10);
        return view('admin.lokasi.index', compact('data'));
    }
    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function delete($id)
    {
        $data = Lokasi::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Lokasi::find($id);

        return view('admin.lokasi.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Lokasi::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/lokasi');
    }

    public function store(Request $req)
    {
        Lokasi::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/lokasi');
    }
}
