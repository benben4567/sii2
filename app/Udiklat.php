<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Udiklat extends Model
{
    protected $fillable = [
        'kode_udiklat',
        'udiklat',
        'jabatan',
        'nama',
        'path_ttd',
        'nosurat',
        'alamat_surat',
        'alamat_surat_jalan',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'id_udiklat_lama'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
