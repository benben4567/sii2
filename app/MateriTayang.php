<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriTayang extends Model
{
    protected $table = 'materitayangs';
    protected $fillable = [
        'judul_id',
        'instruktur_id',
        'materitayang_sebelum',
        'materitayang_new'
    ];
}
