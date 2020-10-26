<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokGrade extends Model
{
    protected $fillable = [
        'kelompok_grade',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
