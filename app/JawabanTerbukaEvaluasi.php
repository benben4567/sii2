<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanTerbukaEvaluasi extends Model
{
    protected $fillable = [
        'detailpenjadwalanpeserta_id',
        'pernyataanevaluasi_id',
        'komentar'
    ];

    public function detailpenjadwalanpeserta()
    {
        return $this->hasMany(DetailPenjadwalanPeserta::class);
    }

    public function pernyataanevaluasi()
    {
        return $this->hasOne(PernyataanEvaluasi::class);
    }
}
