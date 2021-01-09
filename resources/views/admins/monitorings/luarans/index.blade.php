@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui_breadcrumb([
        'Home' => route('admin.home'),
        'Monitoring Luaran' => '#'
    ]) !!}
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <strong><i class="fa fa-filter"></i> Filter</strong>
        </div>

        <div class="card-body">
            @include('admins.monitorings.luarans._form')
        </div>
    </div>

    @if($results)
        <div class="card">

            <div class="card-body">

                {{ html()->form('POST', route('admin.monitoring-luaran.export'))->open() }}

                {{ html()->hidden('tahun', $tahun)->id('tahun') }}

                {{ html()->hidden('skema_id', $skema_id)->id('skema_id') }}

                {{ html()->submit('Export')->class('btn btn-primary ml-sm-2 pull-right') }}

                {{ html()->form()->close() }}

                @include('admins.monitorings.luarans._table')
            </div>

        </div>
    @endif

@endsection
