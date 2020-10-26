<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    protected $fillable = [
        'instruktur_id',
        'tempat_magang',
        'tema_magang',
        'tgl_mulai',
        'tgl_selesai',
        'nama_file'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
