<?php

namespace App\Http\Controllers\Admin;

use App\Dosen;
use App\Http\Controllers\Controller;

class LuaranPenelitianDosenController extends Controller
{
    public function index()
    {
        $researchers = Dosen::all()->pluck('nama_nidn', 'id');
        $dosen_id = null;
        $results = null;

        return view('admins.monitorings.dosens.index', compact(
            'researchers',
            'dosen_id',
            'results'
        ));
    }
}
