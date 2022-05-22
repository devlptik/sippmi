<?php

namespace App\Http\Controllers;

use App\JurnalPeriode;
use App\JurnalSkema;
use Carbon\Carbon;

class JurnalUsulanController extends Controller
{
    public function create()
    {
        $periodes = JurnalPeriode::where('tgl_mulai_reg','<=',Carbon::now()->toDateString())
            ->where('tgl_akhir_reg', '>=', Carbon::now()->toDateString())
            ->get()
            ->pluck('jurnal_skema_id')
            ->toArray();
        $skemas = JurnalSkema::whereIn('id', $periodes)->get();

        return view('jurnals.usulans.create', compact('skemas'));
    }
}
