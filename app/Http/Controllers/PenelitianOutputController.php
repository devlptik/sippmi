<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Penelitian;
use App\OutputSkema;
use App\PenelitianOutput;

class PenelitianOutputController extends Controller
{
    public function show($penelitian_id, $output_skema_id){
        $penelitian = Penelitian::find($penelitian_id);
        $output_skema = OutputSkema::find($output_skema_id);

        return view('penelitians.outputs.create', compact('penelitian', 'output_skema'));
    }

    public function store(Request $request, $penelitian_id){
        $output_skema_id = $request->get('output_skema_id');
        $output_skema = OutputSkema::find($output_skema_id);

        $request->validate([
            'filename' => 'required|mimes:'.$output_skema->mime
        ]);

        $penelitian_output = new PenelitianOutput();
        $penelitian_output->penelitian_id = $penelitian_id;
        $penelitian_output->output_skema_id = $output_skema_id;
        $penelitian_output->filename = 'temp';
        $penelitian_output->tanggal_upload = Carbon::now()->toDateString();
        $penelitian_output->save();

        $this->addFile($penelitian_output, $request, 'filename', config('sippmi.path.luaran'));

        return redirect()->route('penelitians.show', $penelitian_id);
    }

    public function destroy(Request $request, $penelitian_id, $penelitian_output_id)
    {
        $penelitian_output = PenelitianOutput::find($penelitian_output_id);

        $folder = config('sippmi.path.luaran');
        $filename = $penelitian_output->filename;

        $oldFile = storage_path('app/public/'.$folder . '/' . $filename);
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }

        $penelitian_output->delete();
        return redirect()->route('penelitians.show', $penelitian_id);

    }

}
