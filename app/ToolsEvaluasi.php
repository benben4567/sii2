<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolsEvaluasi extends Model
{
    protected $table = 'toolsevaluasis';
    protected $fillable = [
        'judul_id',
        'instruktur_id',
        'toolsevaluasi_sebelum',
        'toolsevaluasi_new'
    ];
}
