<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    //
    public function skema()
    {
        return $this->belongsTo(JurnalSkema::class, 'jurnal_skema_id');
    }
}
