<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeNilai extends Model
{
    protected $fillable = [
        'grade_nilai',
        'nilai_minimum',
        'nilai_maksimum',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function detailpenjadwalanpeserta()
    {
        return $this->belongsTo(DetailPenjadwalanPeserta::class);
    }
}
