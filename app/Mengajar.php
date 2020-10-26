<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    protected $fillable = [
        'instruktur_id',
        'judul_id',
        'tempat_mengajar',
        'tgl_mulai',
        'tgl_selesai'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }
}
