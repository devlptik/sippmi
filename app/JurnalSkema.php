<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalSkema extends Model
{
    //

    public function unit(){
        return $this->belongsTo(Fakultum::class, 'unit_id');
    }

    public function periodes()
    {
        return $this->hasMany(JurnalPeriode::class, 'jurnal_skema_id');
    }

    public function getNamaUnitAttribute(){
        if(empty($this->unit_id)){
            return 'LPPM Universitas Andalas';
        }
        return $this->unit->nama;
    }
}
