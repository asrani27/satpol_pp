<?php

namespace App\Http\Controllers;

use App\Models\SM;
use App\Models\DPT;
use App\Models\Lurah;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pendaftar;
use App\Models\Tpermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function superadmin()
    {
        return view('admin.home');
    }
}
