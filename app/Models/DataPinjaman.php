<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPinjaman extends Model
{
    use HasFactory;

    protected $table = 'data_pinjamen';

    protected $fillable = [
        'asuransi',
        'down_payment',
        'lama_kredit',
        'angsuran_per_bulan',
    ];

    public function pinjaman()
    {
        return $this->hasMany(KonsumenMeminjam::class);
    }
}
