<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetunjukPraktik extends Model
{
    protected $fillable = [
        'warning_id',
        'petunjukpraktik_sebelum',
        'petunjukpraktik_new'
    ];
}
