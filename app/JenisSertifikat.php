<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSertifikat extends Model
{
    protected $fillable = [
        'jenis_sertifikat',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }
}
