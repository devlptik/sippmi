<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OutputSkema;
use App\Penelitian;
use App\Pengabdian;
use App\RefSkema;
use App\Usulan;
use Illuminate\Http\Request;

class ProposalSeleksiController extends Controller
{
    public function index()
    {
        $tahun = date('Y');
        $tahuns = [];
        for ($i = 2020; $i <= $tahun; $i++) {
            $tahuns[$i] = $i;
        }

        $skemas = RefSkema::all()->pluck('nama', 'id');
        $skema_id = null;
        $results = null;
        return view('admins.seleksi.hasil.index', compact('tahuns', 'tahun', 'skemas', 'skema_id', 'results'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'skema_id' => 'required'
        ]);

        //1. Ambil jenis usulan
        $results = collect([]);
        $outputs = collect([]);

        $skema = RefSkema::find($request->skema_id);
        switch ($skema->jenis_usulan) {
            case Usulan::PENELITIAN:
                $outputs = OutputSkema::with('output')
                    ->where('skema_id', $request->skema_id)
                    ->get();
                $results = Penelitian::with('outputs')
                    ->where('tahun', $request->tahun)
                    ->where('skema_id', $request->skema_id)
                    ->get();
                break;
            case Usulan::PENGABDIAN:
                $outputs = OutputSkema::with('output')
                    ->where('skema_id', $request->skema_id)
                    ->get();
                $results = Pengabdian::with('outputs')
                    ->where('tahun', $request->tahun)
                    ->where('skema_id', $request->skema_id)
                    ->get();
                break;
        }

        $tahun = $request->tahun;
        $tahuns = [];
        for ($i = 2020; $i <= $tahun; $i++) {
            $tahuns[$i] = $i;
        }

        $skemas = RefSkema::all()->pluck('nama', 'id');
        $skema_id = $request->skema_id;
        return view('admins.seleksi.hasil.index', compact('tahuns', 'tahun', 'skemas', 'skema_id', 'skema', 'results', 'outputs'));
    }

    public function search($tahun, $skema_id)
    {
        //1. Ambil jenis usulan
        $results = collect([]);
        $outputs = collect([]);

        $skema = RefSkema::find($skema_id);
        switch ($skema->jenis_usulan) {
            case Usulan::PENELITIAN:
                $outputs = OutputSkema::with('output')
                    ->where('skema_id', $skema_id)
                    ->get();
                $results = Penelitian::with('outputs')
                    ->where('tahun', $tahun)
                    ->where('skema_id', $skema_id)
                    ->get();
                break;
            case Usulan::PENGABDIAN:
                $outputs = OutputSkema::with('output')
                    ->where('skema_id', $skema_id)
                    ->get();
                $results = Pengabdian::with('outputs')
                    ->where('tahun', $tahun)
                    ->where('skema_id', $skema_id)
                    ->get();
                break;
        }

        $tahuns = [];
        for ($i = 2020; $i <= $tahun; $i++) {
            $tahuns[$i] = $i;
        }

        $skemas = RefSkema::all()->pluck('nama', 'id');
        return view('admins.seleksi.hasil.index', compact('tahuns', 'tahun', 'skemas', 'skema_id', 'skema', 'results', 'outputs'));
    }

    public function accept(Request $request, $id){
        $request->validate([
            'skema_id' => 'required',
            'tahun' => 'required'
        ]);
        $usulan = Usulan::find($id);
        $usulan->status_usulan = Usulan::STATUS_ACCEPTED;
        if($usulan->save()){
            notify('success', 'Diterima', 'Usulan penelitian/pengabdian diterima');
        }
        return redirect()->route('admin.proposal-seleksi.search', [$request->tahun, $request->skema_id]);
    }

    public function reject(Request $request, $id){
        $request->validate([
            'skema_id' => 'required',
            'tahun' => 'required'
        ]);
        $usulan = Usulan::find($id);
        $usulan->status_usulan = Usulan::STATUS_REJECTED;
        if($usulan->save()){
            notify('success', 'Diterima', 'Usulan penelitian/pengabdian diterima');
        }
        return redirect()->route('admin.proposal-seleksi.search', [$request->tahun, $request->skema_id]);
    }
}
