<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalPeriode extends Model
{

    protected const DATE_FORMAT = 'd F Y';

    protected $dates = ['tgl_mulai_reg', 'tgl_akhir_reg', 'periode_mulai', 'periode_akhir'];

    public function getPeriodeTerbitAttribute(){
        return $this->nama. ' ( terbit '.
            $this->periode_mulai->format(self::DATE_FORMAT).
            ' s/d '.
            $this->periode_akhir->format(self::DATE_FORMAT).' )';
    }
}
