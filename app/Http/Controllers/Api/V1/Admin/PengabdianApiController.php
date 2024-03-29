<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePengabdianRequest;
use App\Http\Requests\UpdatePengabdianRequest;
use App\Http\Resources\Admin\PengabdianResource;
use App\Pengabdian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengabdianApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pengabdian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengabdianResource(Pengabdian::with(['skema', 'prodi', 'kode_rumpun', 'created_by'])->get());
    }

    public function store(StorePengabdianRequest $request)
    {
        $pengabdian = Pengabdian::create($request->all());

        if ($request->input('file_proposal', false)) {
            $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_proposal')))->toMediaCollection('file_proposal');
        }

        if ($request->input('file_lembaran_pengesahan', false)) {
            $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_lembaran_pengesahan')))->toMediaCollection('file_lembaran_pengesahan');
        }

        if ($request->input('file_laporan_kemajuan', false)) {
            $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_laporan_kemajuan')))->toMediaCollection('file_laporan_kemajuan');
        }

        if ($request->input('file_laporan_keuangan', false)) {
            $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_laporan_keuangan')))->toMediaCollection('file_laporan_keuangan');
        }

        if ($request->input('file_laporan_akhir', false)) {
            $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_laporan_akhir')))->toMediaCollection('file_laporan_akhir');
        }

        if ($request->input('file_logbook', false)) {
            $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_logbook')))->toMediaCollection('file_logbook');
        }

        if ($request->input('file_profile_pengabdian', false)) {
            $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_profile_pengabdian')))->toMediaCollection('file_profile_pengabdian');
        }

        return (new PengabdianResource($pengabdian))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pengabdian $pengabdian)
    {
        abort_if(Gate::denies('pengabdian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengabdianResource($pengabdian->load(['skema', 'prodi', 'kode_rumpun', 'created_by']));
    }

    public function update(UpdatePengabdianRequest $request, Pengabdian $pengabdian)
    {
        $pengabdian->update($request->all());

        if ($request->input('file_proposal', false)) {
            if (!$pengabdian->file_proposal || $request->input('file_proposal') !== $pengabdian->file_proposal->file_name) {
                $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_proposal')))->toMediaCollection('file_proposal');
            }
        } elseif ($pengabdian->file_proposal) {
            $pengabdian->file_proposal->delete();
        }

        if ($request->input('file_lembaran_pengesahan', false)) {
            if (!$pengabdian->file_lembaran_pengesahan || $request->input('file_lembaran_pengesahan') !== $pengabdian->file_lembaran_pengesahan->file_name) {
                $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_lembaran_pengesahan')))->toMediaCollection('file_lembaran_pengesahan');
            }
        } elseif ($pengabdian->file_lembaran_pengesahan) {
            $pengabdian->file_lembaran_pengesahan->delete();
        }

        if ($request->input('file_laporan_kemajuan', false)) {
            if (!$pengabdian->file_laporan_kemajuan || $request->input('file_laporan_kemajuan') !== $pengabdian->file_laporan_kemajuan->file_name) {
                $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_laporan_kemajuan')))->toMediaCollection('file_laporan_kemajuan');
            }
        } elseif ($pengabdian->file_laporan_kemajuan) {
            $pengabdian->file_laporan_kemajuan->delete();
        }

        if ($request->input('file_laporan_keuangan', false)) {
            if (!$pengabdian->file_laporan_keuangan || $request->input('file_laporan_keuangan') !== $pengabdian->file_laporan_keuangan->file_name) {
                $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_laporan_keuangan')))->toMediaCollection('file_laporan_keuangan');
            }
        } elseif ($pengabdian->file_laporan_keuangan) {
            $pengabdian->file_laporan_keuangan->delete();
        }

        if ($request->input('file_laporan_akhir', false)) {
            if (!$pengabdian->file_laporan_akhir || $request->input('file_laporan_akhir') !== $pengabdian->file_laporan_akhir->file_name) {
                $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_laporan_akhir')))->toMediaCollection('file_laporan_akhir');
            }
        } elseif ($pengabdian->file_laporan_akhir) {
            $pengabdian->file_laporan_akhir->delete();
        }

        if ($request->input('file_logbook', false)) {
            if (!$pengabdian->file_logbook || $request->input('file_logbook') !== $pengabdian->file_logbook->file_name) {
                $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_logbook')))->toMediaCollection('file_logbook');
            }
        } elseif ($pengabdian->file_logbook) {
            $pengabdian->file_logbook->delete();
        }

        if ($request->input('file_profile_pengabdian', false)) {
            if (!$pengabdian->file_profile_pengabdian || $request->input('file_profile_pengabdian') !== $pengabdian->file_profile_pengabdian->file_name) {
                $pengabdian->addMedia(storage_path('tmp/uploads/' . $request->input('file_profile_pengabdian')))->toMediaCollection('file_profile_pengabdian');
            }
        } elseif ($pengabdian->file_profile_pengabdian) {
            $pengabdian->file_profile_pengabdian->delete();
        }

        return (new PengabdianResource($pengabdian))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pengabdian $pengabdian)
    {
        abort_if(Gate::denies('pengabdian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengabdian->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
