<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyusun extends Model
{
    protected $fillable = [
        'instruktur_id',
        'file_penyusun',
        'judul_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'pendidikan_formal',
        'file_bukti_karyatulis'
    ];

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
