<?php

namespace App\Http\Controllers\Admin;

use App\Fakultum;
use App\Http\Controllers\Controller;
use App\JurnalSkema;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class JurnalSkemaController extends Controller
{
    public function index(){

        abort_if(Gate::denies('reviewer_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admins.jurnals.skemas.index');
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
        return view('admins.jurnals.skemas.show',[
            'skema' => $jurnalSkema
        ]);
    }


}
