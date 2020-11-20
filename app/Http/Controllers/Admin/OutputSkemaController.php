<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutputSkemaRequest;
use App\Http\Requests\StoreOutputSkemaRequest;
use App\Http\Requests\UpdateOutputSkemaRequest;
use App\Output;
use App\OutputSkema;
use App\RefSkema;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutputSkemaController extends Controller
{


    public function create($refSkema_id)
    {
        abort_if(Gate::denies('output_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputs = Output::all()->pluck('luaran', 'id');
        $refSkema = RefSkema::find($refSkema_id);

        return view('admins.referensis.ref_skemas.output_skemas.create', compact('outputs','refSkema_id', 'refSkema'));
    }

    public function store(StoreOutputSkemaRequest $request, $refSkema_id)
    {
        $outputSkema = OutputSkema::create($request->all()+['skema_id' => $refSkema_id]);

        return redirect()->route('admin.ref-skemas.show',[$refSkema_id]);
    }

    public function edit($refSkema_id, OutputSkema $outputSkema)
    {
        abort_if(Gate::denies('output_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputs = Output::all()->pluck('luaran', 'id');
        $refSkema = RefSkema::find($refSkema_id);

        return view('admins.referensis.ref_skemas.output_skemas.edit', compact('outputs', 'refSkema', 'outputSkema', 'refSkema_id'));
    }

    public function update(UpdateOutputSkemaRequest $request,$refSkema_id, OutputSkema $outputSkema)
    {
        $outputSkema->output_id = $request->get('output_id');
        $outputSkema->field = $request->get('field');
        $outputSkema->mime = $request->get('mime');
        if($request->has('required')){
            $outputSkema->required = true;
        }else{
            $outputSkema->required = false;
        }
        $outputSkema->save();

        return redirect()->route('admin.ref-skemas.show', [$refSkema_id]);
    }


    public function destroy($refSkema_id, OutputSkema $outputSkema)
    {
        abort_if(Gate::denies('output_skema_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputSkema->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutputSkemaRequest $request, $refSkema_id)
    {
        OutputSkema::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
