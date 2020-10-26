<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenjangJabatan extends Model
{
    protected $fillable = [
        'jenjang_jabatan',
        'urut',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
