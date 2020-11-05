<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    protected $table = 'penanggungjawabs';
    protected $fillable = [
        'kode_penanggung_jawab',
        'penanggung_jawab',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->hasMany(Judul::class, 'penanggungjawab_id');
    }
}
