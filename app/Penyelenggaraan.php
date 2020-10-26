<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyelenggaraan extends Model
{
    protected $fillable = [
        'kode_penyelenggaraan',
        'penyelenggaraan',
        'group_penyelenggaraan',
        'iht',
        'kodesertifikat',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }
}
