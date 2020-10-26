<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'jurusan',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
