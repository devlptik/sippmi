<?php

namespace App\Http\Controllers\Admin;

use App\Dosen;
use App\Http\Controllers\Controller;
use App\OutputSkema;
use App\RefSkema;
use App\Usulan;
use Illuminate\Http\Request;

class LuaranPenelitianDosenController extends Controller
{
    public function index()
    {
        $researchers = Dosen::all()->pluck('nama_nidn', 'id');
        $dosen_id = null;
        $penelitians = null;

        return view('admins.monitorings.dosens.index', compact(
            'researchers',
            'dosen_id',
            'penelitians'
        ));
    }

    public function store(Request $request)
    {
        $request->validate(['dosen_id' => 'required']);
        $dosen_id = $request->dosen_id;
        $researchers = Dosen::all()->pluck('nama_nidn', 'id');

        $dosen = Dosen::find($dosen_id);
        $penelitians = Usulan::leftJoin("usulan_anggota", function ($join) {
            $join->on("usulan_anggota.usulan_id", "=", "usulans.id");
        })
            ->leftJoin("penelitians", function ($join) {
                $join->on("penelitians.id", "=", "usulans.id");
            })
            ->leftJoin("ref_skemas", function ($join) {
                $join->on("ref_skemas.id", "=", "penelitians.skema_id");
            })
            ->select(
                "penelitians.id",
                "penelitians.judul",
                "penelitians.skema_id",
                "penelitians.tahun",
                "penelitians.biaya",
                "usulan_anggota.jabatan",
                "ref_skemas.nama as skema")
            ->where("usulans.status_usulan", "=", 3)
            ->where("usulans.jenis_usulan", "=", 'P')
            ->where("usulan_anggota.dosen_id", "=", $dosen->id)
            ->orderBy('penelitians.tahun', 'DESC')
            ->get();

        foreach ($penelitians as $penelitian) {
            $outputs = OutputSkema::leftJoin("outputs", function($join){
                $join->on("outputs.id", "=", "output_skemas.output_id");
            })
                ->leftJoin("penelitian_outputs", function($join) use ($penelitian) {
                    $join->on("penelitian_outputs.output_skema_id", "=", "output_skemas.id")
                        ->where("penelitian_outputs.penelitian_id", "=", $penelitian->id);
                })
                ->select("outputs.luaran", "output_skemas.required", "penelitian_outputs.filename")
                ->where("output_skemas.skema_id", $penelitian->skema_id)
                ->get();

            $penelitian->outputs = $outputs;
        }

        return view('admins.monitorings.dosens.index', compact('dosen', 'penelitians', 'researchers', 'dosen_id'));
    }


}
