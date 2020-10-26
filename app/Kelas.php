<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = [
        'udiklat_id',
        'kode_kelas',
        'kelas',
        'kapasitas',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function penjadwalan()
    {
        return $this->belongsTo(Penjadwalan::class);
    }
}
