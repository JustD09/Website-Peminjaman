<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = [
        'nama_nasabah',
        'kelengkapan_tunjangan',
        'tanggungan',
        'pekerjaan',
        'total_potongan',
        'total_tunjangan',
        'hasil',
        'status',
    ];
}
