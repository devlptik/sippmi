<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalPeriode extends Model
{
    protected $dates = ['tgl_mulai_reg', 'tgl_akhir_reg'];
}
