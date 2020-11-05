<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SifatDiklat extends Model
{
    protected $table = "sifatdiklats";
    protected $fillable = [
        'kode_sifat_diklat',
        'sifat_diklat',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->hasMany(Judul::class, 'sifatdiklat_id');
    }
}
