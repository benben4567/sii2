<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetunjukInstruktur extends Model
{
    protected $table = 'petunjukinstrukturs';
    protected $fillable = [
        'warning_id',
        'petunjukinstruktur_sebelum',
        'petunjukinstruktur_new'
    ];
}
