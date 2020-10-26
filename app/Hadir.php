<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hadir extends Model
{
    protected $fillable = [
        'keterangan',
        'status'
    ];

    public function detailpenjadwalanpeserta()
    {
        return $this->belongsTo(DetailPenjadwalanPeserta::class);
    }
}
