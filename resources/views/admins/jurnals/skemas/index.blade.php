@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Skema' => route('admin.jurnal-skemas.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('output_view')
        {!! cui()->toolbar_btn(route('admin.jurnal-periodes.index'), 'cil-list', 'Periode Skema') !!}
    @endcan
    @can('ref_skema_manage')
        {!! cui()->toolbar_btn(route('admin.jurnal-skemas.create'), 'cil-plus', 'Tambah Skema') !!}
    @endcan
@endsection

@section('content')

@endsection
