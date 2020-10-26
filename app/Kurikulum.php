<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $fillable = [
        'warning_id',
        'tujuan',
        'syarat_peserta',
        'skp',
        'metode',
        'lingkup',
        'strategi',
        'level',
        'sertifikat',
        'referensi'
    ];
}
