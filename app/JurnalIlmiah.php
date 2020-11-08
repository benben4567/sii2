<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalIlmiah extends Model
{
    protected $table = 'jurnalilmiahs';
    protected $fillable = [
        'instruktur_id',
        'judul_id',
        'tingkatan',
        'file_jurnal_ilmiah',
        'file_abstrak',
        'lembaga_penyelenggara',
        'tanggal_submit',
        'tanggal_presentasi'
    ];
}
