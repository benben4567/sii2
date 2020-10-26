<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wo extends Model
{
    protected $fillable = [
        'id_relasi_lama',
        'judul_id',
        'udiklat_id',
        'jenispelaksanaan_id',
        'kelas_id',
        'penyelenggaraan_id',
        'jenissertifikat_id',
        'angkatan',
        'kode_judul',
        'kode_judul_lama',
        'nama_judul',
        'udiklat',
        'jenis_pelaksanaan',
        'kelas',
        'penyelenggaraan',
        'jenis_sertifikat',
        'tanggal_mulai',
        'tanggal_selesai',
        'tahun_pengajuan',
        'status_konf_ren',
        'waktu_konf_keu',
        'status_konf_keu',
        'dikonf_keu_oleh',
        'waktu_konf_keu',
        'status_approval',
        'alasan_ren_approval',
        'rule_peserta',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'id_penjadwalan_itn'
    ];

    public function penjadwalan()
    {
        return $this->belongsTo(Penjadwalan::class);
    }

    public function jenispelaksanaan()
    {
        return $this->hasOne(JenisPelaksanaan::class);
    }
}
