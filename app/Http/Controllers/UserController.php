<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $data = User::orderBy('id', 'DESC')->paginate(10);
        return view('admin.user.index', compact('data'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function edit($id)
    {
        $data = User::find($id);

        return view('admin.user.edit', compact('data'));
    }
    public function delete($id)
    {
        if (Auth::user()->id == $id) {
            Session::flash('error', 'Tidak bisa di hapus, karena sedang digunakan');
            return back();
        } else {
            if (User::find($id)->username == 'admin') {
                Session::flash('error', 'Akun ini tidak dapat di hapus');
            } else {
                $data = User::find($id)->delete();
                Session::flash('success', 'Berhasil Dihapus');
            }
            return back();
        }
    }
    public function store(Request $req)
    {
        $checkUser = User::where('username', $req->username)->first();
        $role = Role::where('name', $req->role)->first();
        if ($checkUser == null) {
            if ($req->password1 != $req->password2) {
                Session::flash('error', 'Password Tidak Sama');
                return back();
            } else {
                $n = new User();
                $n->name = $req->name;
                $n->username = $req->username;
                $n->password = bcrypt($req->password1);
                $n->save();

                $n->roles()->attach($role);
                Session::flash('success', 'Berhasil Disimpan, Password : ' . $req->password1);
                return redirect('/superadmin/user');
            }
        } else {
            Session::flash('error', 'Username ini sudah pernah di input');
            return back();
        }
    }
    public function update(Request $req, $id)
    {
        $role = Role::where('name', $req->role)->first();
        $data = User::find($id);
        if ($req->password1 == null) {
            //update tanpa password

            $data->name = $req->name;
            $data->save();
            $data->roles()->sync($role);
            Session::flash('success', 'Berhasil Diupdate');
            return redirect('/superadmin/user');
        } else {
            // update beserta password
            if ($req->password1 != $req->password2) {
                Session::flash('error', 'Password Tidak Sama');
                return back();
            } else {

                $data->password = bcrypt($req->password1);
                $data->name = $req->name;
                $data->save();
                $data->roles()->sync($role);
                Session::flash('success', 'Berhasil Diupdate, password : ' . $req->password1);
                return redirect('/superadmin/user');
            }
        }
    }
}
