<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidangs';
    protected $fillable = [
        'instruktur_id',
        'nama_sertifikasi',
        'tgl_pelaksanaan',
        'batas_sertifikasi',
        'nama_file'
    ];
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
