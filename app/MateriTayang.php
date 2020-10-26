<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriTayang extends Model
{
    protected $fillable = [
        'warning_id',
        'materitayang_sebelum',
        'materitayang_new'
    ];
}
