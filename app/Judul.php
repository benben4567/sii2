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
        return $this->belongsTo(JenisDiklat::class, 'jenisdiklat_id');
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
        return $this->belongsTo(Penyelenggaraan::class, 'penyelenggaraan_id');
    }

    public function jenisSertifikat()
    {
        return $this->belongsTo(JenisSertifikat::class, 'jenissertifikat_id');
    }

    public function penanggungJawab()
    {
        return $this->belongsTo(PenanggungJawab::class, 'penanggungjawab_id');
    }

    public function dahanprofesi()
    {
        return $this->belongsTo(DahanProfesi::class);
    }

    public function akademi()
    {
        return $this->belongsTo(Akademi::class);
    }

    public function warnings()
    {
        return $this->hasMany(Warning::class);
    }
}
