<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';

    protected $fillable = [
        'nama_status',
    ];

    public function pinjaman()
    {
        return $this->hasMany(KonsumenMeminjam::class);
    }
}
