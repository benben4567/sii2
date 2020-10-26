<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPelaksanaan extends Model
{
    protected $fillable = [
        'jenis_pelaksanaan',
        'kebutuhan_konf',
        'dibuat_oleh',
        'diedit_oleh',
        'status'
    ];

    public function wo()
    {
        return $this->belongsTo(Wo::class);
    }
}
