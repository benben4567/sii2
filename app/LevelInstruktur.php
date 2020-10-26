<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelInstruktur extends Model
{
    protected $fillable = [
        'level_instruktur',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
