<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level1Unit extends Model
{
    protected $fillable = [
        'udiklat_id',
        'kode_unit_level1',
        'unit_level1',
        'pln',
        'penerima_surat',
        'alamat_surat',
        'alamat_Surat_jalan',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function detailpenjadwalanpeserta()
    {
        return $this->belongsTo(DetailPenjadwalanPeserta::class);
    }

    public function detailwo()
    {
        return $this->belongsTo(DetailWo::class);
    }
}
