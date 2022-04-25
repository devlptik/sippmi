<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class JurnalPeriodeController extends Controller
{
    public function create(JurnalSkema $jurnalSkema){
        return view('admins.jurnals.periodes.create', compact('jurnalSkema'));
    }
}
