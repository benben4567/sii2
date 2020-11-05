<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $fillable = [
        'warning_id',
        'instruktur_id',
        'tujuan',
        'syarat_peserta',
        'skp',
        'metode',
        'lingkup',
        'strategi',
        'level',
        'sertifikat',
        'referensi'
    ];

    public function warnings()
    {
        return $this->hasMany(Warning::class);
    }

    public function instruktur()
    {
        return $this->hasMany(Instruktur::class);
    }
}
