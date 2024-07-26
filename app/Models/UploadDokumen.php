<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadDokumen extends Model
{
    use HasFactory;

    protected $table = 'upload_dokumens';

    protected $fillable = [
        'konsumen_meminjam_id',
        'file_path',
    ];

    public function konsumenMeminjam()
    {
        return $this->belongsTo(KonsumenMeminjam::class);
    }
}
