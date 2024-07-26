<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';

    protected $fillable = [
        'merk_kendaraan',
        'model_kendaraan',
        'tipe_kendaraan',
        'warna_kendaraan',
        'harga_kendaraan',
    ];

    public function pinjaman()
    {
        return $this->hasMany(KonsumenMeminjam::class);
    }
}
