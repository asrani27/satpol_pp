<?php

namespace App\Http\Controllers;

use App\Models\Pelapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PelaporController extends Controller
{

    public function index()
    {
        $data = Pelapor::paginate(10);
        return view('admin.pelapor.index', compact('data'));
    }
    public function create()
    {
        return view('admin.pelapor.create');
    }

    public function delete($id)
    {
        $data = Pelapor::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Pelapor::find($id);

        return view('admin.pelapor.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Pelapor::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/pelapor');
    }

    public function store(Request $req)
    {
        Pelapor::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/pelapor');
    }
}
