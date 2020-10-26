<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class DetailWo extends Model
{
    protected $fillable = [
        'wo_id',
        'level1unit_id',
        'unit_level1',
        'jumlah_peserta',
        'status_konf_keu',
        'dikonf_keu_oleh',
        'waktu_buat',
        'diedit_oleh',
        'status',
        'id_penjadwalan_itn'
    ];

    public function detailpenjadwalanpeserta()
    {
        return $this->belongsTo(DetailPenjadwalanPeserta::class);
    }

    public function level1unit()
    {
        return $this->hasOne(Level1Unit::class);
    }
}
