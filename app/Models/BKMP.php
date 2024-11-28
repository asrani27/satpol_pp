<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKMP extends Model
{
    use HasFactory;
    protected $table = 'nilai_bkmp';
    protected $guarded = ['id'];
}
