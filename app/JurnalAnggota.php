<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalAnggota extends Model
{
    const TYPE_DOSEN = 1;
    const TYPE_MAHASISWA = 2;

    const TYPE_ANGGOTA = [
        self::TYPE_DOSEN => 'Dosen',
        self::TYPE_MAHASISWA => 'Anggota'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'jurnal_id');
    }
}
