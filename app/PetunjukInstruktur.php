<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetunjukInstruktur extends Model
{
    protected $table = 'petunjukinstrukturs';
    protected $fillable = [
        'judul_id',
        'instruktur_id',
        'petunjukinstruktur_sebelum',
        'petunjukinstruktur_new'
    ];
}
