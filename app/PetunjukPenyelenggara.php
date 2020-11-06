<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetunjukPenyelenggara extends Model
{
    protected $table = 'petunjukpenyelenggaras';
    protected $fillable = [
        'judul_id',
        'instruktur_id',
        'petunjukpenyelenggara_sebelum',
        'petunjukpenyelenggara_new'
    ];
}
