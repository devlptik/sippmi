<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Jurnal;
use App\JurnalAnggota;
use App\Prodi;
use Illuminate\Http\Request;

class JurnalAuthorController extends Controller
{

    public function create(Jurnal $jurnal)
    {
        $anggotas = $jurnal->anggotas()->where('tipe', 1)->pluck('dosen_id', 'dosen_id')->toArray();
        $dosens = Dosen::whereNotIn('id',$anggotas)
            ->get()
            ->pluck('nama_nidn', 'id');
        $prodis = Prodi::pluck('nama','nama');
        $anggotas = $jurnal->anggotas;

        return view('jurnals.authors.create', compact('jurnal', 'anggotas', 'dosens', 'prodis'));
    }

    public function store(Request $request, Jurnal $jurnal)
    {
        $anggota = new JurnalAnggota();
        $anggota->jurnal_id = $jurnal->id;
        $anggota->no_urut = $request->no_urut;

        if($request->tipe == JurnalAnggota::TYPE_DOSEN){
           $anggota->tipe = 1;
           $anggota->dosen_id = $request->get('dosen_id');
        }else {
            $anggota->tipe = 2;
            $anggota->nama = $request->get('nama');
            $anggota->identifier = $request->identifier;
            $anggota->unit = $request->unit;
        }
        if( $anggota->save())
            return redirect()->route('jurnals.authors.create', [$jurnal->id]);

        return redirect()->back()->withInput();
    }


    public function destroy(Request $request, Jurnal $jurnal, JurnalAnggota  $author)
    {
        $author->delete();
        return back();
    }
}
