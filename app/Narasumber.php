<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Narasumber extends Model
{
    protected $fillable = [
        'instruktur_id',
        'judul_id',
        'pengalaman_bidang',
        'pendidikan_formal',
        'file_pendidikan_formal',
        'file_sertifikat_pembelajaran',
    ];

    public function judul()
    {
        return $this->hasMany(Judul::class);
    }

    public function mengajars()
    {
        return $this->hasMany(Mengajar::class);
    }

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
