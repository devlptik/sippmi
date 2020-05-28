@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Fakultas' => route('admin.fakulta.index'),
        'Tambah' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('fakultum_view')
        {!! cui()->toolbar_btn(route('admin.fakulta.index'), 'cil-list', 'List Fakultas') !!}
    @endcan
@stop
@section('content')
    <div class="row">
        <div class="col-sm-8">

            {{ html()->form('POST', route('admin.fakulta.store'))->class('form')->open() }}

                <div class="card">
                    <div class="card-header">
                        <i class="cil-plus"></i><strong>Tambah Data Fakultas</strong>
                    </div>

                    <div class="card-body">
                        @include('admin.fakulta._form')
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </div>

            {{ html()->form()->close() }}
        </div>
    </div>

@endsection
