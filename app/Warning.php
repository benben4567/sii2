<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    protected $fillable = [
        'instruktur',
        'judul_id',
        'aspek',
        'informasi_pendukung'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function silabus()
    {
        return $this->belongsTo(Silabus::class);
    }

    public function handout()
    {
        return $this->belongsTo(Handout::class);
    }

    public function materitayang()
    {
        return $this->belongsTo(MateriTayang::class);
    }

    public function petunjukinstruktur()
    {
        return $this->belongsTo(PetunjukInstruktur::class);
    }

    public function petunjukpenyelenggara()
    {
        return $this->belongsTo(PetunjukPenyelenggara::class);
    }

    public function toolsevaluasi()
    {
        return $this->belongsTo(ToolsEvaluasi::class);
    }

    public function petunjukpraktik()
    {
        return $this->belongsTo(PetunjukPraktik::class);
    }
}
