<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas';
    protected $fillable = [
        'nama',
        'slip_gaji',
        'data_riwayat',
        'rincian_gaji',
    ];
}
