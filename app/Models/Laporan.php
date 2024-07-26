<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';

    protected $fillable = [
        'konsumen_meminjam_id',
    ];

    public function konsumenMeminjam()
    {
        return $this->belongsTo(KonsumenMeminjam::class);
    }
}
