<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;
    protected $table = 'konsumens';

    protected $fillable = [
        'nama',
        'nik',
        'tanggal_lahir',
        'status_perkawinan',
        'data_pasangan',
    ];

    public function pinjaman()
    {
        return $this->hasMany(KonsumenMeminjam::class);
    }
}
