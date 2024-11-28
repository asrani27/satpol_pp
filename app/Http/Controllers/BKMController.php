<?php

namespace App\Http\Controllers;

use App\Models\BKM;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class BKMController extends Controller
{
    public function wp()
    {
        try {
            $data = Siswa::where('jenis', 'BKM')->get()->map(function ($item) {
                foreach (kbkm() as $k) {
                    $item[str_replace(' ', '', $k->nama)] = nilaibkm($item->id, $k->id);
                    $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                    if ($k->tipe === 'COST') {
                        if (nilaibkm($item->id, $k->id) === 0) {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkm($item->id, $k->id), (float)$k->bobot);
                        }
                    } else {
                        $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkm($item->id, $k->id), (float)$k->bobot);
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

            return view('admin.bkm.wp', compact('data'));
        } catch (\Throwable $th) {
            Session::flash('error', 'Nilai BKM tidak boleh 0');
            return back();
        }
    }
    public function hasil()
    {
        try {
            $data = Siswa::where('jenis', 'BKM')->get()->map(function ($item) {
                foreach (kbkm() as $k) {
                    $item[str_replace(' ', '', $k->nama)] = nilaibkm($item->id, $k->id);
                    $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                    if ($k->tipe === 'COST') {
                        if (nilaibkm($item->id, $k->id) === 0) {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkm($item->id, $k->id), (float)$k->bobot);
                        }
                    } else {
                        $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkm($item->id, $k->id), (float)$k->bobot);
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
            })->sortByDesc('vi')->values();

            return view('admin.bkm.hasil', compact('data'));
        } catch (\Throwable $th) {
            Session::flash('error', 'Nilai BKM tidak boleh 0');
            return back();
        }
    }
    public function index()
    {
        $data = BKM::paginate(10);
        return view('admin.bkm.index', compact('data'));
    }
    public function create()
    {
        return view('admin.bkm.create');
    }

    public function delete($id)
    {
        $data = BKM::find($id)->delete();
        return back();
    }

    public function edit($id)
    {
        $data = BKM::find($id);

        return view('admin.bkm.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        BKM::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/data/bkm');
    }

    public function store(Request $req)
    {

        foreach ($req->kriteria_id as $key => $item) {

            $nilaibkm = BKM::where('siswa_id', $req->siswa_id)->where('kriteria_id', $item)->first();

            if ($nilaibkm === null) {
                //new
                $n = new BKM();
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
        return redirect('/data/bkm');
    }
}
