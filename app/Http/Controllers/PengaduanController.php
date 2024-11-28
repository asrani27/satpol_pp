<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengaduanController extends Controller
{
    public function index()
    {
        $data = Pengaduan::paginate(10);
        return view('admin.pengaduan.index', compact('data'));
    }
    public function create()
    {
        return view('admin.pengaduan.create');
    }

    public function delete($id)
    {
        $data = Pengaduan::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Pengaduan::find($id);

        return view('admin.pengaduan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Pengaduan::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/pengaduan');
    }

    public function store(Request $req)
    {
        Pengaduan::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/pengaduan');
    }
}
