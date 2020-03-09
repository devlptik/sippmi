<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutputRequest;
use App\Http\Requests\StoreOutputRequest;
use App\Http\Requests\UpdateOutputRequest;
use App\JenisUsulan;
use App\Output;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutputController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('output_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputs = Output::all();

        return view('admin.outputs.index', compact('outputs'));
    }

    public function create()
    {
        abort_if(Gate::denies('output_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenis_usulans = JenisUsulan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.outputs.create', compact('jenis_usulans'));
    }

    public function store(StoreOutputRequest $request)
    {
        $output = Output::create($request->all());

        return redirect()->route('admin.outputs.index');
    }

    public function edit(Output $output)
    {
        abort_if(Gate::denies('output_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenis_usulans = JenisUsulan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $output->load('jenis_usulan');

        return view('admin.outputs.edit', compact('jenis_usulans', 'output'));
    }

    public function update(UpdateOutputRequest $request, Output $output)
    {
        $output->update($request->all());

        return redirect()->route('admin.outputs.index');
    }

    public function show(Output $output)
    {
        abort_if(Gate::denies('output_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $output->load('jenis_usulan', 'outputOutputSkemas');

        return view('admin.outputs.show', compact('output'));
    }

    public function destroy(Output $output)
    {
        abort_if(Gate::denies('output_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $output->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutputRequest $request)
    {
        Output::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
