<?php

namespace App\Http\Controllers\Admin;

use App\Fakultum;
use App\Http\Controllers\Controller;
use App\Jurnal;
use App\JurnalSkema;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class JurnalSkemaController extends Controller
{
    public function index(){

        abort_if(Gate::denies('reviewer_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalSkemas = JurnalSkema::all();

        return view('admins.jurnals.skemas.index', compact('jurnalSkemas'));
    }

    public function create(){
        abort_if(Gate::denies('reviewer_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $units = Fakultum::all()->pluck('nama', 'id')->toArray();
        $units = array_merge([0 => 'LPPM (Universitas Andalas)'], $units);

        return view('admins.jurnals.skemas.create', compact('units'));
    }

    public function store(Request $request){
        abort_if(Gate::denies('reviewer_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'nama' => 'required',
            'insentif' => 'required',
            'jumlah_reviewer' => 'required|integer'
        ]);

        if(empty($request->unit_id)){
            $request->unit_id = null;
        }

        $skema = new JurnalSkema();
        $skema->nama = $request->nama;
        $skema->unit_id = $request->unit_id;
        $skema->insentif = $request->insentif;
        $skema->jumlah_reviewer = $request->jumlah_reviewer;

        if($skema->save()){
            return redirect()->route('admin.jurnal-skemas.show', $skema->id);
        }

        return redirect()->back()->withErrors(['message' => 'Tidak bisa menyimpan data skema']);
    }

    public function show(JurnalSkema $jurnalSkema){
        abort_if(Gate::denies('reviewer_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admins.jurnals.skemas.show',[
            'skema' => $jurnalSkema
        ]);
    }

    public function edit(JurnalSkema $jurnalSkema){
        abort_if(Gate::denies('reviewer_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $units = Fakultum::all()->pluck('nama', 'id')->toArray();
        $units = array_merge([0 => 'LPPM (Universitas Andalas)'], $units);

        return view('admins.jurnals.skemas.edit', compact('units', 'jurnalSkema'));
    }

    public function update(Request $request, JurnalSkema $jurnalSkema){
        abort_if(Gate::denies('reviewer_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'nama' => 'required',
            'insentif' => 'required',
            'jumlah_reviewer' => 'required|integer'
        ]);

        if(empty($request->unit_id)){
            $request->unit_id = null;
        }

        $jurnalSkema->nama = $request->nama;
        $jurnalSkema->unit_id = $request->unit_id;
        $jurnalSkema->insentif = $request->insentif;
        $jurnalSkema->jumlah_reviewer = $request->jumlah_reviewer;

        if($jurnalSkema->save()){
            return redirect()->route('admin.jurnal-skemas.show', $jurnalSkema->id);
        }

        return redirect()->back()->withErrors(['message' => 'Tidak bisa menyimpan data skema']);

    }

    public function destroy(Request $request, JurnalSkema $jurnalSkema){
        if($jurnalSkema->delete()){
            return redirect()->route('admin.jurnal-skemas.index');
        }
    }


}
