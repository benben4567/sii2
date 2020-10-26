<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $fillable = [
        'pendidikan',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
