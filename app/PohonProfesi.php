<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PohonProfesi extends Model
{
    protected $fillable = [
        'kode_pohon_profesi',
        'pohon_profesi',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'id_pohon_profesi_lama',
        'kode_pohon_profesi',
        'pohon_profesi_lama'
    ];
}
