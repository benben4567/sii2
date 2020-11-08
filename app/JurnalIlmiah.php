<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalIlmiah extends Model
{
    protected $table = 'jurnalilmiahs';
    protected $fillable = [
        'judul',
        'tingkatan',
        'file_jurnal_ilmiah',
        'file_abstrak',
        'lembaga_penyelenggara',
        'tanggal_selesai',
        'tanggal_presentasi'
    ];
}
