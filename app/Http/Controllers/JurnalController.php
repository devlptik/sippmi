<?php

namespace App\Http\Controllers;

use App\Jurnal;
use App\JurnalAnggota;
use App\JurnalPeriode;
use App\JurnalSkema;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class JurnalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_id = auth()->user()->id;
        $anggotas = JurnalAnggota::where('dosen_id', $user_id)
            ->get()
            ->pluck('jurnal_id')
            ->toArray();
        $jurnals = Jurnal::whereIn('id', $anggotas)
            ->orWhere('pengusul_id', $user_id)
            ->get();

        return view('jurnals.index', compact('jurnals'));
    }

    public function create(JurnalSkema $jurnalSkema)
    {
        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periodes = JurnalPeriode::where('tgl_mulai_reg', '<=', Carbon::now()->toDateString())
            ->where('tgl_akhir_reg', '>=', Carbon::now()->toDateString())
            ->where('jurnal_skema_id', $jurnalSkema->id)
            ->get();

        return view('jurnals.create', [
            'skema' => $jurnalSkema,
            'periodes' => $periodes->pluck('periode_terbit', 'id')
        ]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'judul' => 'required',
            'abstract' => 'required',
            'jurnal_skema_id' => 'required|integer',
            'volume' => 'required',
            'nomor' => 'required',
            'doi' => 'required',
            'tgl_terbit' => 'required|date',
            'jurnal_periode_id' => 'required|integer',
            'nama_jurnal' => 'required',
            'issn' => 'required',
        ]);

        $periode = JurnalPeriode::find($request->jurnal_periode_id);
        if($periode->periode_mulai >= $request->tgl_terbit || $periode->periode_akhir <= $request->tgl_terbit){
            session()->flash('flash_danger', 'Artikel jurnal ini tidak bisa diklaim di periode ini');
            return redirect()->back()->withInput();
        }

        $jurnal = new Jurnal();
        $jurnal->judul = $request->judul;
        $jurnal->abstract = $request->abstract;
        $jurnal->jurnal_skema_id = $request->jurnal_skema_id;
        $jurnal->pengusul_id = auth()->user()->id;
        $jurnal->status_usulan = Jurnal::STATUS_DRAFT;
        $jurnal->luaran_id = 1;
        $jurnal->volume = $request->volume;
        $jurnal->nomor = $request->nomor;
        $jurnal->hal_awal = $request->hal_awal;
        $jurnal->hal_akhir = $request->hal_akhir;
        $jurnal->doi = $request->doi;
        $jurnal->tgl_terbit = $request->tgl_terbit;
        $jurnal->jurnal_periode_id = $request->jurnal_periode_id;
        $jurnal->link = $request->link;
        $jurnal->nama_jurnal = $request->nama_jurnal;
        $jurnal->issn = $request->issn;
        $jurnal->cakupan_bidang = $request->cakupan_bidang;
        $jurnal->alamat = $request->alamat;
        $jurnal->impact_factor = $request->impact_factor;
        $jurnal->h_index = $request->h_index;

        if($jurnal->save()){
            $this->addFile($jurnal, $request, 'file_artikel', config('sippmi.path.jurnal.artikel'));
            return redirect()->route('jurnals.authors.create', [$jurnal]);
        }
        return redirect()->back()->withInput();
    }

    public function show(Jurnal $jurnal)
    {
        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('jurnals.show', compact('jurnal'));
    }

    public function edit(Jurnal $jurnal)
    {
        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalSkema = $jurnal->skema;

        $periodes = JurnalPeriode::where('tgl_mulai_reg', '<=', Carbon::now())
            ->where('tgl_akhir_reg', '>=', Carbon::now())
            ->where('jurnal_skema_id', $jurnalSkema->id)
            ->get();

        return view('jurnals.edit', [
            'jurnal' => $jurnal,
            'skema' => $jurnalSkema,
            'periodes' => $periodes
        ]);
    }

    public function update(Request $request, Jurnal $jurnal)
    {
        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'judul' => 'required',
            'abstract' => 'required',
            'volume' => 'required',
            'nomor' => 'required',
            'doi' => 'required',
            'tgl_terbit' => 'required|date',
            'jurnal_periode_id' => 'required|integer',
            'nama_jurnal' => 'required',
            'issn' => 'required',
        ]);

        $periode = JurnalPeriode::find($request->jurnal_periode_id);
        if($periode->periode_mulai >= $request->tgl_terbit || $periode->periode_akhir <= $request->tgl_terbit){
            session()->flash('flash_danger', 'Artikel jurnal ini tidak bisa diklaim di periode ini');
            return redirect()->back()->withError();
        }

        $jurnal->judul = $request->judul;
        $jurnal->abstract = $request->abstract;
        $jurnal->luaran_id = 1;
        $jurnal->volume = $request->volume;
        $jurnal->nomor = $request->nomor;
        $jurnal->hal_awal = $request->hal_awal;
        $jurnal->hal_akhir = $request->hal_akhir;
        $jurnal->doi = $request->doi;
        $jurnal->tgl_terbit = $request->tgl_terbit;
        $jurnal->jurnal_periode_id = $request->jurnal_periode_id;
        $jurnal->link = $request->link;
        $jurnal->file_artikel = $request->file_artikel;
        $jurnal->nama_jurnal = $request->nama_jurnal;
        $jurnal->issn = $request->issn;
        $jurnal->cakupan_bidang = $request->cakupan_bidang;
        $jurnal->alamat = $request->alamat;
        $jurnal->impact_factor = $request->impact_factor;
        $jurnal->h_index = $request->h_index;

        if($jurnal->save()){
            return redirect()->route('journals.index');
        }
        return redirect()->back()->withError();
    }

    public function destroy(Jurnal $jurnal)
    {
        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($jurnal->delete()){
            return redirect()->route('jurnals.index');
        }
        return redirect()->back()->withInput();
    }

    public function submit(Request $request, Jurnal $jurnal){

        abort_if(Gate::denies('jurnal_user_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnal->status_usulan = Jurnal::STATUS_SUBMITTED;
        if($jurnal->save()){
            return redirect()->route('jurnals.index');
        }
        return redirect()->back()->withInput();
    }
}
