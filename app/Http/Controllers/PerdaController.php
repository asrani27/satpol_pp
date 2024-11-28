<?php

namespace App\Http\Controllers;

use App\Models\Perda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerdaController extends Controller
{

    public function index()
    {
        $data = Perda::paginate(10);
        return view('admin.perda.index', compact('data'));
    }
    public function create()
    {
        return view('admin.perda.create');
    }

    public function delete($id)
    {
        $data = Perda::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Perda::find($id);

        return view('admin.perda.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Perda::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/perda');
    }

    public function store(Request $req)
    {
        Perda::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/perda');
    }
}
