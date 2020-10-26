<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjadwalanPeserta extends Model
{
    protected $fillable = [
        'id_wo_migrasi',
        'penjadwalan_id',
        'peserta_id',
        'detailwo_id',
        'level1unit_id',
        'gradenilai_id',
        'unit_level_1',
        'konf_kehadiran',
        'dikonf_kehadiran_oleh',
        'waktu_dikonf_kehadiran',
        'hadir',
        'nilai',
        'lulus',
        'waktu_buat',
        'diedit_oleh',
        'status',
        'id_detail_penjadwalan_peserta_lama',
        'id_evaluasi_kesesuaian_penjadwalan',
        'id_penjadwalan_itn'
    ];

    public function jawabanterbukaevaluasi()
    {
        return $this->belongsTo(JawabanTerbukaEvaluasi::class);
    }

    public function jawabantertutupevaluasi()
    {
        return $this->belongsTo(JawabanTertutupEvaluasi::class);
    }

    public function penjadwalan()
    {
        return $this->hasMany(Penjadwalan::class);
    }

    public function peserta()
    {
        return $this->hasOne(Peserta::class);
    }

    public function level1unit()
    {
        return $this->hasOne(Level1Unit::class);
    }

    public function detailwo()
    {
        return $this->hasOne(DetailWo::class);
    }

    public function gradenilai()
    {
        return $this->hasOne(GradeNilai::class);
    }

    public function hadir()
    {
        return $this->hasOne(Hadir::class);
    }
}
