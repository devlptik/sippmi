@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Jurnal' => route('jurnals.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('jurnal_user_manage')
        {!! cui_toolbar_btn(route('jurnals.index'), 'cil-list', 'Usulan Insentif') !!}
        {!! cui_toolbar_btn(route('usulan-jurnals.create'), 'cil-plus', 'Tambah Usulan Insentif Jurnal') !!}
        {!! cui_toolbar_btn(route('jurnals.edit', [$jurnal->id]), 'cil-pencil', 'Edit Usulan Insentif') !!}
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

        <div class="card-footer">
            @if(!$jurnal->isSubmitted())
                {{ html()->form('POST', route('jurnals.submit', [$jurnal->id]))->acceptsFiles()->open() }}
                <input type="hidden" name="id" value="{{ $jurnal->id }}"/>
                <input type="submit" class="btn btn-submit" value="Submit Usulan"/>
                {{ html()->form()->close() }}
            @endif
        </div>
    </div>

@endsection

@section('scripts')

@endsection
