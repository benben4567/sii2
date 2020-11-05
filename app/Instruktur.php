<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    protected $fillable = [
        'peserta_id',
        'udiklat_id',
        'tipeinstruktur_id',
        'levelinstruktur_id',
        'no_ktp',
        'no_npwp',
        'no_rekening',
        'atas_nama_rekening',
        'bank',
        'waktu_buat',
        'diedit_oleh',
        'status',
        'id_instruktur_lama'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function peserta()
    {
        return $this->hasOne(Peserta::class);
    }

    public function udiklat()
    {
        return $this->hasOne(Udiklat::class);
    }

    public function tipeinstruktur()
    {
        return $this->hasOne(TipeInstruktur::class);
    }

    public function levelinstruktur()
    {
        return $this->hasOne(LevelInstruktur::class);
    }

    public function magang()
    {
        return $this->hasMany(Magang::class);
    }

    public function narasumber()
    {
        return $this->hasOne(Narasumber::class);
    }

    public function penyusun()
    {
        return $this->hasOne(Penyusun::class);
    }

    public function mengajar()
    {
        return $this->hasMany(Mengajar::class);
    }

    public function pendalamanmateri()
    {
        return $this->hasMany(Pendalaman_Materi::class);
    }

    public function sertifikasiBidang()
    {
        return $this->hasMany(Sertifikasi_Bidang::class);
    }

    public function kelompokgrade()
    {
        return $this->hasOne(KelompokGrade::class);
    }

    public function warnings()
    {
        return $this->hasMany(Warning::class);
    }
}
