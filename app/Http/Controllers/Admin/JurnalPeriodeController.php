<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jurnal;
use App\JurnalPeriode;
use App\JurnalSkema;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class JurnalPeriodeController extends Controller
{
    public function create(JurnalSkema $jurnalSkema)
    {
        abort_if(Gate::denies('ref_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admins.jurnals.periodes.create', [
            'skema' => $jurnalSkema
        ]);
    }

    public function store(Request $request, JurnalSkema $jurnalSkema)
    {
        abort_if(Gate::denies('ref_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'nama' => 'required',
            'periode_mulai' => 'required|date',
            'periode_akhir' => 'required|date',
            'tgl_mulai_reg' => 'required|date',
            'tgl_akhir_reg' => 'required|date'
        ]);

        $jurnalPeriode = new JurnalPeriode();
        $jurnalPeriode->jurnal_skema_id = $request->jurnal_skema_id;
        $jurnalPeriode->nama = $request->nama;
        $jurnalPeriode->periode_mulai = $request->periode_mulai;
        $jurnalPeriode->periode_akhir = $request->periode_akhir;
        $jurnalPeriode->tgl_mulai_reg = $request->tgl_mulai_reg;
        $jurnalPeriode->tgl_akhir_reg = $request->tgl_akhir_reg;

        if($jurnalPeriode->save()){
            return redirect()->route('admin.jurnal-skemas.show', $request->jurnal_skema_id);
        }

        return redirect()->back()->withError();
    }

    public function edit(JurnalSkema $jurnalSkema, JurnalPeriode $periode)
    {
        abort_if(Gate::denies('ref_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admins.jurnals.periodes.edit', [
            'skema' => $jurnalSkema,
            'periode' => $periode
        ]);

    }

    public function update(Request $request, JurnalSkema $jurnalSkema, JurnalPeriode $periode)
    {
        abort_if(Gate::denies('ref_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'nama' => 'required',
            'periode_mulai' => 'required|date',
            'periode_akhir' => 'required|date',
            'tgl_mulai_reg' => 'required|date',
            'tgl_akhir_reg' => 'required|date'
        ]);

        $periode->nama = $request->nama;
        $periode->periode_mulai = $request->periode_mulai;
        $periode->periode_akhir = $request->periode_akhir;
        $periode->tgl_mulai_reg = $request->tgl_mulai_reg;
        $periode->tgl_akhir_reg = $request->tgl_akhir_reg;

        if($periode->save()){
            return redirect()->route('admin.jurnal-skemas.show', $request->jurnal_skema_id);
        }
        return redirect()->back()->withError();
    }

    public function destroy(Request $request, JurnalSkema $jurnalSkema, JurnalPeriode $periode)
    {
        abort_if(Gate::denies('ref_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($periode != null){
            $periode->delete();
            return redirect()->route('admin.jurnal-skemas.show', $jurnalSkema->id);
        }
        return redirect()->back()->withError();
    }

    public function data(JurnalSkema $jurnalSkema){
        abort_if(Gate::denies('ref_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periodes = JurnalPeriode::where('jurnal_skema_id', $jurnalSkema->id)
            ->get()
            ->pluck('periode_terbit', 'id')
            ->toArray();

        return \response()->json($periodes);
    }
}

