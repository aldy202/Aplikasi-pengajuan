<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsumenMeminjam extends Model
{
    use HasFactory;

    protected $table = 'konsumen_meminjams';

    protected $fillable = [
        'konsumen_id',
        'kendaraan_id',
        'data_pinjaman_id',
        'status_id',
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function dataPinjaman()
    {
        return $this->belongsTo(DataPinjaman::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    public function uploadDokumen()
    {
        return $this->hasMany(UploadDokumen::class);
    }
}
