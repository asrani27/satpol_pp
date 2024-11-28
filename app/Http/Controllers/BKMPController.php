<?php

namespace App\Http\Controllers;

use App\Models\BKMP;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BKMPController extends Controller
{
    public function wp()
    {
        try {
            $data = Siswa::where('jenis', 'BKMP')->get()->map(function ($item) {
                foreach (kbkmp() as $k) {
                    $item[str_replace(' ', '', $k->nama)] = nilaibkmp($item->id, $k->id);
                    $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                    if ($k->tipe === 'COST') {
                        if (nilaibkmp($item->id, $k->id) === 0) {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkmp($item->id, $k->id), (float)$k->bobot);
                        }
                    } else {
                        $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkmp($item->id, $k->id), (float)$k->bobot);
                    }
                }

                return $item;
            });
            $data = $data->map(function ($item) {
                $scoreAttributes = collect($item->toArray())->filter(function ($value, $key) {
                    return strpos($key, 'Score') !== false;  // Mengecek apakah 'Score' ada dalam nama kunci
                });
                $item->si = $scoreAttributes->reduce(function ($carry, $item) {
                    return $carry * $item;  // Mengalikan nilai yang ada
                }, 1);
                return $item;
            });

            $sum_si = $data->sum('si');

            $data = $data->map(function ($item) use ($sum_si) {
                $item->vi = $item->si / $sum_si;
                return $item;
            });

            return view('admin.bkmp.wp', compact('data'));
        } catch (\Throwable $th) {
            Session::flash('error', 'Nilai BKMP tidak boleh 0');
            return back();
        }
    }

    public function hasil()
    {
        try {
            $data = Siswa::where('jenis', 'BKMP')->get()->map(function ($item) {
                foreach (kbkmp() as $k) {
                    $item[str_replace(' ', '', $k->nama)] = nilaibkmp($item->id, $k->id);
                    $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                    if ($k->tipe === 'COST') {
                        if (nilaibkmp($item->id, $k->id) === 0) {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkmp($item->id, $k->id), (float)$k->bobot);
                        }
                    } else {
                        $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkmp($item->id, $k->id), (float)$k->bobot);
                    }
                }

                return $item;
            });
            $data = $data->map(function ($item) {
                $scoreAttributes = collect($item->toArray())->filter(function ($value, $key) {
                    return strpos($key, 'Score') !== false;  // Mengecek apakah 'Score' ada dalam nama kunci
                });
                $item->si = $scoreAttributes->reduce(function ($carry, $item) {
                    return $carry * $item;  // Mengalikan nilai yang ada
                }, 1);
                return $item;
            })->sortByDesc('vi')->values();

            $sum_si = $data->sum('si');

            $data = $data->map(function ($item) use ($sum_si) {
                $item->vi = $item->si / $sum_si;
                return $item;
            });

            return view('admin.bkmp.hasil', compact('data'));
        } catch (\Throwable $th) {
            Session::flash('error', 'Nilai BKMP tidak boleh 0');
            return back();
        }
    }

    public function index()
    {
        return view('admin.bkmp.index');
    }
    public function store(Request $req)
    {

        foreach ($req->kriteria_id as $key => $item) {

            $nilaibkm = BKMP::where('siswa_id', $req->siswa_id)->where('kriteria_id', $item)->first();

            if ($nilaibkm === null) {
                //new
                $n = new BKMP();
                $n->siswa_id = $req->siswa_id;
                $n->kriteria_id = $item;
                $n->nilai = str_replace(',', '', $req->nilai[$key]);
                $n->save();
            } else {
                $u = $nilaibkm;
                $u->nilai = str_replace(',', '', $req->nilai[$key]);
                $u->save();
            }
        }

        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/bkmp');
    }
}
