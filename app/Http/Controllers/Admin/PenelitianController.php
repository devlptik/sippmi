<?php

namespace App\Http\Controllers\Admin;

use App\Dosen;
use App\Exports\PenelitianExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPenelitianRequest;
use App\Http\Requests\StorePenelitianRequest;
use App\Http\Requests\UpdatePenelitianRequest;
use App\KodeRumpun;
use App\Penelitian;
use App\PenelitianAnggotum;
use App\PrnFokus;
use App\Prodi;
use App\RefSkema;
use App\RipTahapan;
use App\Usulan;
use App\UsulanAnggotum;
use Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PenelitianController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('penelitian_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penelitians = Penelitian::all();

        $tahun_penelitians = Penelitian::selectRaw('distinct(tahun) as tahun')
            ->get()
            ->pluck('tahun', 'tahun');
        $skema_penelitians = RefSkema::where('jenis_usulan', Usulan::PENELITIAN)
            ->get()
            ->pluck('nama', 'id');

        return view('admin.penelitians.index',
            compact('penelitians', 'skema_penelitians', 'tahun_penelitians'));
    }

    public function filter(Request $request)
    {
        abort_if(Gate::denies('penelitian_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahun = request('tahun');
        $skema = request('skema');

        if ($request->has('export')) {
            if (!empty($skema)) {
                $skema_name = RefSkema::findOrFail($skema)->nama;
                $filename = 'penelitian-' . $skema_name . '-' . $tahun . '.xlsx';
            } else {
                $filename = 'penelitian-all-' . $tahun . '.xlsx';
            }
            return Excel::download(new PenelitianExport($skema, $tahun), $filename);
        }

        $query = Penelitian::whereNotNull('created_at');

        if (!empty($tahun)) {
            $query = Penelitian::where('tahun', $tahun);
        }

        if (!empty($skema)) {
            $query->where('skema_id', $skema);
        }
        $penelitians = $query->get();

        $tahun_penelitians = Penelitian::selectRaw('distinct(year(created_at)) as tahun')
            ->get()
            ->pluck('tahun', 'tahun');
        $skema_penelitians = RefSkema::where('jenis_usulan', Usulan::PENELITIAN)
            ->get()
            ->pluck('nama', 'id');

        return view('admin.penelitians.index',
            compact('penelitians', 'skema_penelitians', 'tahun_penelitians', 'tahun', 'skema'));
    }

    public function create()
    {
        abort_if(Gate::denies('penelitian_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dosens = Dosen::all()->pluck('nama', 'id');

        $skemas = RefSkema::where('jenis_usulan', Usulan::PENELITIAN)
//            ->whereAvailable()
            ->get()
            ->pluck('nama', 'id');

        $prnFokus = PrnFokus::pluck('nama', 'id')
            ->prepend(trans('global.pleaseSelect'), '');

        $kode_rumpuns = KodeRumpun::where('level', 3)
            ->get()
            ->pluck('rumpun_ilmu', 'id');

        $prodis = Prodi::all()
            ->pluck('fakultas_prodi', 'id');

        $tahun = range(2015, date('Y'));
        $tahuns = [];
        foreach ($tahun as $k => $v){
            $tahuns[$v] = $v;
        }

        $status_usulans = Usulan::STATUS_USULAN;
        $usulan = null;

        return view('admin.penelitians.create', compact('skemas', 'kode_rumpuns', 'prodis', 'prnFokus', 'dosens', 'status_usulans', 'usulan', 'tahuns'));
    }

    public function store(Request $request)
    {

        abort_if(Gate::denies('penelitian_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usulan = new Usulan();
        $usulan->pengusul_id = $request->get('pengusul_id');
        $usulan->status_usulan = $request->get('status_usulan');
        $usulan->jenis_usulan = 'P';
        $usulan->save();

        $penelitian = new Penelitian();
        $penelitian->id = $usulan->id;
        $penelitian->kode_rumpun_id = null;
        $penelitian->prodi_id = $request->get('prodi_id');
        $penelitian->judul = $request->get('judul');
        $penelitian->skema_id = $request->get('skema_id');
        $penelitian->tahapan_id = null;
        $penelitian->fokus_id = $request->get('fokus_id');
        $penelitian->ringkasan_eksekutif = $request->get('ringkasan_eksekutif');
        $penelitian->biaya = $request->get('biaya');
        $penelitian->status_penelitian = null;
        $penelitian->multi_tahun = $request->get('multi_tahun');
        $penelitian->tahun = $request->get('tahun');
        $penelitian->save();

        $this->addFile($penelitian, $request, 'file_pengesahan', config('sippmi.path.pengesahan'));
        $this->addFile($penelitian, $request, 'file_proposal', config('sippmi.path.proposal'));
        $this->addFile($penelitian, $request, 'file_cv', config('sippmi.path.cv'));

        $anggota = new UsulanAnggotum();
        $anggota->tipe = PenelitianAnggotum::DOSEN;
        $anggota->usulan_id = $usulan->id;
        $anggota->dosen_id = $request->get('pengusul_id');
        $anggota->jabatan = PenelitianAnggotum::KETUA;
        $anggota->save();

        return redirect()->route('admin.penelitian.anggota.create', [$penelitian->id]);
    }

    public function edit(Penelitian $penelitian)
    {
        abort_if(Gate::denies('penelitian_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usulan = Usulan::findOrFail($penelitian->id);

        $dosens = Dosen::all()->pluck('nama', 'id');

        $skemas = RefSkema::where('jenis_usulan', Usulan::PENELITIAN)
//            ->whereAvailable()
            ->get()
            ->pluck('nama', 'id');

        $prnFokus = PrnFokus::pluck('nama', 'id')
            ->prepend(trans('global.pleaseSelect'), '');

        $kode_rumpuns = KodeRumpun::where('level', 3)
            ->get()
            ->pluck('rumpun_ilmu', 'id')
            ->prepend(trans('global.pleaseSelect'), '');

        $prodis = Prodi::all()
            ->pluck('fakultas_prodi', 'id')
            ->prepend(trans('global.pleaseSelect'), '');

        $status_usulans = Usulan::STATUS_USULAN;

        $tahun = range(2015, date('Y'));
        $tahuns = [];
        foreach ($tahun as $k => $v){
            $tahuns[$v] = $v;
        }

        return view('admin.penelitians.edit', compact('penelitian', 'skemas', 'kode_rumpuns', 'prodis', 'prnFokus', 'dosens', 'status_usulans', 'usulan', 'tahuns'));
    }

    public function update(UpdatePenelitianRequest $request, Penelitian $penelitian)
    {
        $penelitian->update($request->all());

        $this->addFile($penelitian, $request, 'file_pengesahan', config('sippmi.path.pengesahan'));
        $this->addFile($penelitian, $request, 'file_proposal', config('sippmi.path.proposal'));
        $this->addFile($penelitian, $request, 'file_cv', config('sippmi.path.cv'));

        return redirect()->route('admin.penelitian.anggota.create', [$penelitian->id]);
    }

    public function show(Penelitian $penelitian)
    {
        abort_if(Gate::denies('penelitian_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penelitian->load('skema', 'kode_rumpun', 'prodi', 'tahapan');

        return view('admin.penelitians.show', compact('penelitian'));
    }

    public function destroy(Penelitian $penelitian)
    {
        abort_if(Gate::denies('penelitian_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penelitian->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenelitianRequest $request)
    {
        Penelitian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('penelitian_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Penelitian();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
