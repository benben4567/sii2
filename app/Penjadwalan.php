<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    protected $fillable = [
        'wo_id',
        'kelas_id',
        'penyelenggaraan_id',
        'jumlah_peserta',
        'angkatan',
        'realisasi',
        'waktu_realisasi',
        'direalisasi_oleh',
        'tanggal_oleh_realisasi',
        'tanggal_selesai_realisasi',
        'konf_kelas',
        'dikond_kelas_oleh',
        'waktu_kond_kelas',
        'sinkronasi_konf_kelas',
        'sinkronasi_materi',
        'level_approval',
        'no_surat_pemanggilan',
        'waktu_tanggal_surat_pemanggilan',
        'open',
        'open_tambah_instruktur',
        'jumlah_instruktur_tambahan',
        'status_action_learning',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'ket_peserta',
        'id_penjadwalan_itn'
    ];

    public function detailpenjadwalanpeserta()
    {
        return $this->belongsTo(DetailPenjadwalanPeserta::class);
    }

    public function wo()
    {
        return $this->hasOne(Wo::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
