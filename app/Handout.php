<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handout extends Model
{
    protected $fillable = [
        'warning_id',
        'handout_sebelum',
        'handout_new'
    ];
}
