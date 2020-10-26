<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPernyataanEvaluasi extends Model
{
    protected $fillable = [
        'jenis_pernyataan_evaluasi'
    ];

    public function pernyataanevaluasi()
    {
        return $this->belongsTo(PernyataanEvaluasi::class);
    }
}
