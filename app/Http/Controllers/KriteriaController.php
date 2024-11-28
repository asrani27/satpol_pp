<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{

    public function index()
    {
        $data = Kriteria::paginate(10);
        return view('admin.kriteria.index', compact('data'));
    }
    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function delete($id)
    {
        $data = Kriteria::find($id)->delete();
        return back();
    }

    public function edit($id)
    {
        $data = Kriteria::find($id);

        return view('admin.kriteria.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Kriteria::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/kriteria');
    }

    public function store(Request $req)
    {
        Kriteria::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/kriteria');
    }
}
