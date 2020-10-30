<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materis";
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
        return $this->belongsTo("App\JenisMateri", "jenismateri_id");
    }

    public function pendalamanmateri()
    {
        return $this->hasMany(PendalamanMateri::class);
    }
}
