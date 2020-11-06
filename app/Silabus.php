<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silabus extends Model
{
    protected $table = 'silabus';
    protected $fillable = [
        'judul_id',
        'instruktur_id',
        'bahasan',
        'hasil_pelatihan',
        'kriteria_penilaian',
        'metode_penilaian',
        'waktu',
        'referensi'
    ];

    public function warning()
    {
        return $this->belongsTo(Warning::class);
    }
}
