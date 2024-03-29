<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MonitoringLuaranExport;
use App\Exports\ProposalDosenExport;
use App\Http\Controllers\Controller;
use App\Output;
use App\OutputSkema;
use App\Penelitian;
use App\PenelitianOutput;
use App\Pengabdian;
use App\RefSkema;
use App\Usulan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringLuaranController extends Controller
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
        return view('admins.monitorings.luarans.index', compact('tahuns', 'tahun', 'skemas', 'skema_id', 'results'));
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
                    ->whereHas('usulan', function ($query){
                        $query->where('status_usulan', Usulan::STATUS_ACCEPTED);
                    })
                    ->get();
                break;
            case Usulan::PENGABDIAN:
                $outputs = OutputSkema::with('output')
                    ->where('skema_id', $request->skema_id)
                    ->get();
                $results = Pengabdian::with('outputs')
                    ->where('tahun', $request->tahun)
                    ->where('skema_id', $request->skema_id)
                    ->whereHas('usulan', function ($query){
                        $query->where('status_usulan', Usulan::STATUS_ACCEPTED);
                    })
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
        return view('admins.monitorings.luarans.index', compact('tahuns', 'tahun', 'skemas', 'skema_id', 'skema', 'results', 'outputs'));
    }

    public function export(Request $request){

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
                    ->whereHas('usulan', function ($query){
                        $query->where('status_usulan', Usulan::STATUS_ACCEPTED);
                    })
                    ->get();
                break;
            case Usulan::PENGABDIAN:
                $outputs = OutputSkema::with('output')
                    ->where('skema_id', $request->skema_id)
                    ->get();
                $results = Pengabdian::with('outputs')
                    ->where('tahun', $request->tahun)
                    ->where('skema_id', $request->skema_id)
                    ->whereHas('usulan', function ($query){
                        $query->where('status_usulan', Usulan::STATUS_ACCEPTED);
                    })
                    ->get();
                break;
        }

        return Excel::download(new MonitoringLuaranExport($request->tahun, $skema, $results, $outputs), 'luaran-'.$skema->nama.'-'.$request->tahun.'.xlsx');
    }
}
