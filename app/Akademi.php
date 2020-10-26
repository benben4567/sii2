<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akademi extends Model
{
    protected $fillable = [
        'kode_akademi',
        'akademi',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }
}
