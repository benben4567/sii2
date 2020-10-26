<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokEvaluasi extends Model
{
    protected $fillable = [
        'nama_kelompok_evaluasi'
    ];

    public function pernyataanevaluasi()
    {
        return $this->belongsTo(PernyataanEvaluasi::class);
    }
}
