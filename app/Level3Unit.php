<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level3Unit extends Model
{
    protected $fillable = [
        'level2unit_id',
        'kode_unit_level3',
        'unit_level3',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
