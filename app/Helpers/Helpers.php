<?php

use App\Models\BKM;
use App\Models\BKMP;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Lokasi;
use App\Models\Pelapor;
use App\Models\Pengaduan;
use App\Models\Perda;
use App\Models\Petugas;


function pelapor()
{
    return Pelapor::get();
}

function petugas()
{
    return Petugas::get();
}

function lokasi()
{
    return Lokasi::get();
}

function pengaduan()
{
    return Pengaduan::get();
}


function perda()
{
    return Perda::get();
}
