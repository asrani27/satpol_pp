<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::paginate(10);

        return view('admin.siswa.index', compact('data'));
    }
    public function create()
    {
        return view('admin.siswa.create');
    }

    public function delete($id)
    {
        $data = Siswa::find($id)->delete();
        return back();
    }

    public function edit($id)
    {
        $data = Siswa::find($id);

        return view('admin.siswa.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Siswa::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/siswa');
    }

    public function store(Request $req)
    {
        $checkNIS = Siswa::where('nis', $req->nis)->first();
        if ($checkNIS === null) {
            Siswa::create($req->all());
            Session::flash('success', 'Berhasil Di Simpan');
        } else {
            Session::flash('error', 'NIS sudah ada');
        }
        return redirect('/data/siswa');
    }
}
