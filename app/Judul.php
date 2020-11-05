<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    protected $fillable = [
        'jenisdiklat_id',
        'sifatdiklat_id',
        'levelprofisiensi_id',
        'penanggungjawab_id',
        'penyelengggaraan_id',
        'jenissertifikat_id',
        'dahanprofesi_id',
        'akademi_id',
        'kode_judul',
        'nama_judul',
        'tahun_terbit',
        'status_refreshment',
        'angkatan',
        'deskripsi',
        'durasi_hari',
        'aktif',
        'kepemilikan',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'kode_judul_lama',
        'id_dahan_profesi_lama'
    ];

    public function mengajar()
    {
        return $this->hasMany(Mengajar::class);
    }

    public function penyusun()
    {
        return $this->hasOne(Penyusun::class);
    }

    public function setOptionsAttribute($aspek)
    {
        $this->attributes['aspek'] = json_encode($aspek);
    }

    //Batch 2
    public function jenisdiklat()
    {
        return $this->belongsTo(JenisDiklat::class);
    }

    public function sifatdiklat()
    {
        return $this->belongsTo(SifatDiklat::class, 'sifatdiklat_id');
    }

    public function levelprofisiensi()
    {
        return $this->belongsTo(LevelProfisiensi::class);
    }

    public function penyelenggaraan()
    {
        return $this->hasOne(Penyelenggaraan::class);
    }

    public function jenisSertifikat()
    {
        return $this->hasOne(JenisSertifikat::class);
    }

    public function penanggungJawab()
    {
        return $this->hasMany(PenanggungJawab::class);
    }

    public function dahanprofesi()
    {
        return $this->belongsTo(DahanProfesi::class);
    }

    public function akademi()
    {
        return $this->hasOne(Akademi::class);
    }

    public function warnings()
    {
        return $this->hasMany(Warning::class);
    }
}
