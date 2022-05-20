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
        self::STATUS_SUBMITTED => 'Telah Submit',
        self::STATUS_REVIEWING => 'Sedang direview',
        self::STATUS_REVIEWED => 'Telah direview',
        self::STATUS_REJECTED => 'Ditolak',
        self::STATUS_ACCEPTED => 'Diterima'
    ];

    const STATUS_COLORS = [
        self::STATUS_DRAFT => 'secondary',
        self::STATUS_SUBMITTED => 'primary',
        self::STATUS_REVIEWING => 'warning',
        self::STATUS_REVIEWED => 'info',
        self::STATUS_REJECTED => 'danger',
        self::STATUS_ACCEPTED => 'success'
    ];

    public function skema()
    {
        return $this->belongsTo(JurnalSkema::class, 'jurnal_skema_id');
    }

    public function anggotas()
    {
        return $this->hasMany(JurnalAnggota::class, 'jurnal_id');
    }

    public function periode()
    {
        return $this->belongsTo(JurnalPeriode::class, 'jurnal_periode_id');
    }

    public function getStatusTextAttribute()
    {
        if(array_key_exists($this->status_usulan, self::STATUS_LABEL)){
            return self::STATUS_LABEL[$this->status_usulan];
        }
        return '-';
    }

    public function getStatusColorAttribute()
    {
        if(array_key_exists($this->status_usulan, self::STATUS_LABEL)){
            return self::STATUS_COLORS[$this->status_usulan];
        }
        return 'light';
    }

    public function isSubmitted()
    {
        if($this->status_usulan >= self::STATUS_SUBMITTED){
            return true;
        }
        return false;
    }

    public function isDecided()
    {
        return in_array(optional($this->usulan)->status_usulan, [
            Usulan::STATUS_ACCEPTED,
            Usulan::STATUS_REJECTED
        ]);
    }
}
