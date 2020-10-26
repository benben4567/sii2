<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'kode_role',
        'role',
        'deskripsi_role',
        'lihat_unit',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
