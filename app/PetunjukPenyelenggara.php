<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetunjukPenyelenggara extends Model
{
    protected $fillable = [
        'warning_id',
        'petunjukpenyelenggara_sebelum',
        'petunjukpenyelenggara_new'
    ];
}
