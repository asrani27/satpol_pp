<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TindakanController extends Controller
{
    public function index()
    {
        $data = Tindakan::paginate(10);
        return view('admin.tindakan.index', compact('data'));
    }
    public function create()
    {
        return view('admin.tindakan.create');
    }

    public function delete($id)
    {
        $data = Tindakan::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Tindakan::find($id);

        return view('admin.tindakan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        Tindakan::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/tindakan');
    }

    public function store(Request $req)
    {
        Tindakan::create($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/superadmin/tindakan');
    }
}
