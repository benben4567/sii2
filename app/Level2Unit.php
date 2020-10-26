<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level2Unit extends Model
{
    protected $fillable = [
        'level1unit_id',
        'kode_unit_level2',
        'unit_level2',
        'detailwo_id',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
