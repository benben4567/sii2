<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'role_id',
        'level1unit_id',
        'level2unit_id',
        'level3unit_id',
        'jeniskelamin_id',
        'pendidikan_id',
        'jurusan_id',
        'grade_id',
        'jenjangjabatan_id',
        'udiklat_id',
        'nip',
        'nama',
        'jabatan',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
        'password',
        'no_hp',
        'email',
        'waktu_login_terkahir',
        'dibuat_oleh',
        'diedit_oleh',
        'status',
        'id_peserta_lama',
        'id_instruktur_lama',
        'profesi1',
        'profesi2'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }


    public function level1unit()
    {
        return $this->hasOne(Level1Unit::class);
    }

    public function level2unit()
    {
        return $this->hasOne(Level2Unit::class);
    }

    public function level3unit()
    {
        return $this->hasOne(Level3Unit::class);
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    public function jenjangjabatan()
    {
        return $this->hasMany(JenjangJabatan::class);
    }

    public function udiklat()
    {
        return $this->hasOne(Udiklat::class);
    }

    public function warning()
    {
        return $this->hasMany(Instruktur::class);
    }

    public function detailpenjadwalanpeserta()
    {
        return $this->belongsTo(DetailPenjadwalanPeserta::class);
    }
}
