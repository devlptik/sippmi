<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jurnal;
use App\JurnalPeriode;
use App\JurnalSkema;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index()
    {
        $skemaCollections = JurnalSkema::all();
        $skemas = $skemaCollections->pluck('nama', 'id');
        $skema = $skemaCollections[0];
        $skema_id = $skema->id;

        if($skemas== null) {
            $periodes = ['' => '--- Pilih skema terlebih dahulu ---'];
        }else{
            $periodes = JurnalPeriode::where('jurnal_skema_id', $skema->id)
                ->get()
                ->pluck('periode_terbit', 'id');
        }

        return view('admins.jurnals.index', compact(
            'skemas', 'periodes', 'skema_id'
        ));
    }

    public function filter(Request $request){

        $request->validate([
            'jurnal_skema_id' => 'required',
            'periode_id' => 'required',
        ]);

        $jurnals = Jurnal::where('jurnal_skema_id', $request->get('jurnal_skema_id'))
            ->where('jurnal_periode_id', $request->get('periode_id'))
            ->get();

        $skemaCollections = JurnalSkema::all();
        $skemas = $skemaCollections->pluck('nama', 'id');
        $skema = JurnalSkema::find($request->get('jurnal_skema_id'));
        $skema_id = $skema->id;

        if($skemas== null) {
            $periodes = ['' => '--- Pilih skema terlebih dahulu ---'];
        }else{
            $periodes = JurnalPeriode::where('jurnal_skema_id', $skema->id)
                ->get()
                ->pluck('periode_terbit', 'id');
        }

        return view('admins.jurnals.index', compact(
            'jurnals', 'skemas', 'periodes', 'skema_id'
        ));
    }
}
