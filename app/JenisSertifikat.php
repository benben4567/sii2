<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSertifikat extends Model
{
    protected $table = 'jenissertifikats';
    protected $fillable = [
        'jenis_sertifikat',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function judul()
    {
        return $this->hasMany(Judul::class, 'jenissertifikat_id');
    }
}
