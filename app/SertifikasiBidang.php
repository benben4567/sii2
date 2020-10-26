<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikasi_Bidang extends Model
{
    protected $fillable = [
        'instruktur_id',
        'nama_instruktur',
        'tgl_pelaksanaan',
        'batas_sertifikasi',
        'nama_file'
    ];
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
