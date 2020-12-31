<?php

namespace App\Http\Controllers;

use App\Pengabdian;
use App\PengabdianOutput;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\OutputSkema;

class PengabdianOutputController extends Controller
{
    public function show($pengabdian_id, $output_skema_id){
        $pengabdian = Pengabdian::find($pengabdian_id);
        $output_skema = OutputSkema::find($output_skema_id);

        return view('pengabdians.outputs.create', compact('pengabdian', 'output_skema'));
    }

    public function store(Request $request, $pengabdian_id){
        $output_skema_id = $request->get('output_skema_id');
        $output_skema = OutputSkema::find($output_skema_id);

        $request->validate([
            'filename' => 'required|mimes:'.$output_skema->mime
        ]);

        $pengabdian_output = new PengabdianOutput();
        $pengabdian_output->pengabdian_id = $pengabdian_id;
        $pengabdian_output->output_skema_id = $output_skema_id;
        $pengabdian_output->filename = 'temp';
        $pengabdian_output->tanggal_upload = Carbon::now()->toDateString();
        $pengabdian_output->save();

        $this->addFile($pengabdian_output, $request, 'filename', config('sippmi.path.luaran'));

        return redirect()->route('pengabdians.show', $pengabdian_id);
    }

    public function destroy(Request $request, $pengabdian_id, $pengabdian_output_id)
    {
        $pengabdian_output = PengabdianOutput::find($pengabdian_output_id);

        $folder = config('sippmi.path.luaran');
        $filename = $pengabdian_output->filename;

        $oldFile = storage_path('app/public/'.$folder . '/' . $filename);
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }

        $pengabdian_output->delete();
        return redirect()->route('pengabdians.show', $pengabdian_id);

    }

}
