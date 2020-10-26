<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'jenismateri_id',
        'kode_materi',
        'materi',
        'durasi',
        'nilai_minimum',
        'presentase_pembayaran',
        'status_action_learning',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'id_materi_lama'
    ];

    public function jenismateri()
    {
        return $this->hasOne(JenisMateri::class);
    }

    public function pendalamanmateri()
    {
        return $this->hasMany(PendalamanMateri::class);
    }
}
