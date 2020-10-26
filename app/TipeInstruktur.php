<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeInstruktur extends Model
{
    protected $fillable = [
        'kode_tipe_instruktur',
        'tipe_instruktur',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
