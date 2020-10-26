<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PernyataanEvaluasi extends Model
{
    protected $fillable = [
        'jenispernyataabevaluasi_id',
        'kelompokevaluasi_id',
        'pernyataan_Evaluasi',
        'flag',
        'flaglearning',
        'flagiht',
        'flagict'
    ];

    public function jawabanterbukaevaluasi()
    {
        return $this->belongsTo(JawabanTerbukaEvaluasi::class);
    }

    public function jenispernyataanevaluasi()
    {
        return $this->hasOne(JenisPernyataanEvaluasi::class);
    }

    public function kelompokevaluasi()
    {
        return $this->hasOne(KelompokEvaluasi::class);
    }
}
