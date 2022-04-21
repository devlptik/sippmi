<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class JurnalSkemaController extends Controller
{
    public function index(){
        return view('admins.jurnals.skemas.index');
    }
}
