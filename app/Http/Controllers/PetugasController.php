<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
{

    public function index()
    {
        $data = Petugas::paginate(10);
        return view('admin.petugas.index', compact('data'));
    }
    public function create()
    {
        return view('admin.petugas.create');
    }

    public function delete($id)
    {
        $data = Petugas::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Petugas::find($id);

        return view('admin.petugas.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Petugas::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/petugas');
    }

    public function store(Request $req)
    {
        Petugas::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/petugas');
    }
}
