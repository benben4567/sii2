<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisDiklat extends Model
{
    protected $table = "jenisdiklats";
    protected $fillable = [
        'kode_jenis_diklat',
        'jenis_diklat',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->hasMany(Judul::class, 'jenisdiklat_id');
    }
}
