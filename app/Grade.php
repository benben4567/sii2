<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'kelompokgrade_id',
        'grade',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
