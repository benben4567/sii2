<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisMateri extends Model
{
    protected $table = "jenismateris";
    protected $fillable = [
        'kode_jenis_materi',
        'jenis_materi',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
