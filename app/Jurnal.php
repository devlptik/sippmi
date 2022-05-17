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

    public function skema()
    {
        return $this->belongsTo(JurnalSkema::class, 'jurnal_skema_id');
    }
}
