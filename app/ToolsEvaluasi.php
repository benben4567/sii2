<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolsEvaluasi extends Model
{
    protected $table = 'toolsevaluasis';
    protected $fillable = [
        'warning_id',
        'toolsevaluasi_sebelum',
        'toolsevaluasi_new'
    ];
}
