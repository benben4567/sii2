<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendalamanMateri extends Model
{
    protected $fillable = [
        'instruktur_id',
        'materi_id',
        'tgl_mulai',
        'tgl_selesai',
        'penyelenggara'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
