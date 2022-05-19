<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    const STATUS_DRAFT = 0;
    const STATUS_SUBMITTED = 10;
    const STATUS_REVIEWING = 20;
    const STATUS_REVIEWED = 30;
    const STATUS_REJECTED = 40;
    const STATUS_ACCEPTED = 50;

    const STATUS_LABEL = [
        self::STATUS_DRAFT => 'Draft',
        self::STATUS_SUBMITTED => 'Submit',
        self::STATUS_REVIEWING => 'Sedang direview',
        self::STATUS_REVIEWED => 'Telah direview',
        self::STATUS_REJECTED => 'Ditolak',
        self::STATUS_ACCEPTED => 'Diterima'
    ];

    public function skema()
    {
        return $this->belongsTo(JurnalSkema::class, 'jurnal_skema_id');
    }

    public function anggotas()
    {
        return $this->hasMany(JurnalAnggota::class, 'jurnal_id');
    }
}
