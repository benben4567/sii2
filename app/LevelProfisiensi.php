<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelProfisiensi extends Model
{
    protected $table = 'levelprofisiensis';
    protected $fillable = [
        'kode_level_profisiensi',
        'level_profisiensi',
        'jenis_profisiensi',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->hasMany(Judul::class);
    }

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
