<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toefl extends Model
{
    protected $table = 'toefls';
    protected $fillable = [
        'skor',
        'tipe',
        'lembaga_penyelenggara',
        'masa_berlaku',
        'file_sertifikat'
    ];
}
