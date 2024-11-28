<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $guarded = ['id'];

    public function pelapor()
    {
        return $this->belongsTo(Pelapor::class, 'pelapor_id');
    }
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
