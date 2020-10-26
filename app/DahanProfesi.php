<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DahanProfesi extends Model
{
    protected $fillable = [
        'pohonprofesi_id',
        'kode_dahan_profesi',
        'dahan_profesi',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'id_dahan_profesi_lama',
        'id_dahan_profesi_lama',
        'kode_dahan_profesi_lama',
        'dahan_profesi_lama'
    ];

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }
}
