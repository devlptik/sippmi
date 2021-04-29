<?php

namespace App\Http\Controllers\Admin;

use App\Dosen;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPenelitianAnggotumRequest;
use App\Http\Requests\StorePenelitianAnggotumRequest;
use App\Http\Requests\UpdatePenelitianAnggotumRequest;
use App\Penelitian;
use App\PenelitianAnggotum;
use App\Prodi;
use App\RefSkema;
use App\UsulanAnggotum;
use Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PenelitianAnggotaController extends Controller
{


    public function create(Penelitian $penelitian)
    {
        $anggotas = $penelitian->usulan->anggotas()->tipe(1)->pluck('dosen_id', 'dosen_id')->toArray();
        $dosens = Dosen::whereNotIn('id',$anggotas)
            ->get()
            ->pluck('nama_nidn', 'id');
        $prodis = Prodi::pluck('nama','nama');

        return view('admin.penelitians.anggota.create ', compact('penelitian', 'dosens','prodis'));
    }

    public function store(Request $request,  Penelitian $penelitian)
    {
        $this->validate($request, UsulanAnggotum::$dosen_validation_rule);

        $anggota = new UsulanAnggotum();
        $anggota->tipe = 1;
        $anggota->usulan_id = $penelitian->id;
        $anggota->dosen_id = $request->get('dosen_id');
        $anggota->jabatan = 2;
        $anggota->save();

        return redirect()->route('admin.penelitian.anggota.create', [$penelitian]);
    }

    public function storem(Request $request, Penelitian $penelitian)
    {
        $this->validate($request, UsulanAnggotum::$mahasiswa_validation_rule);

        $anggota = new UsulanAnggotum();
        $anggota->tipe = 2;
        $anggota->nama = $request->nama;
        $anggota->usulan_id = $penelitian->id;
        $anggota->identifier = $request->identifier;
        $anggota->unit = $request->unit;
        $anggota->jabatan = 2;
        $anggota->save();

        return redirect()->back();
    }

    public function destroy(Request $request, Penelitian $penelitian, UsulanAnggotum $anggotum)
    {
        abort_if(Gate::denies('penelitian_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $anggotum->delete();
        return back();

    }

}
