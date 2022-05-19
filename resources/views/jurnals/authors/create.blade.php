@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Jurnal' => route('jurnals.index'),
        'Author' => route('jurnals.show', [$jurnal->id])
    ]) !!}
@endsection

@section('toolbar')
    @can('ref_skema_view')
        {!! cui()->toolbar_btn(route('jurnals.index'), 'cil-list', 'List Usulan') !!}
        {!! cui()->toolbar_btn(route('jurnals.show', [$jurnal->id]), 'cil-eye', 'Detail Jurnal' ) !!}
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Detail Usulan Insentif Jurnal</strong>
        </div>

        <div class="card-body">
            @include('jurnals._info')
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            {{ html()->form('POST', route('jurnals.store'))->acceptsFiles()->open() }}

            <div class="card-body">
                @include('jurnals._form')
            </div>

            {{ html()->form()->close() }}

        </div>
    </div>
@endsection
