@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Program Studi' => route('admin.prodis.index'),
        'Tambah' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('prodi_view')
        {!! cui()->toolbar_btn(route('admin.prodis.index'), 'cil-list', 'List Program Studi') !!}
    @endcan
@stop
@section('content')
    <div class="row">
        <div class="col-sm-8">

            {{ html()->form('POST', route('admin.prodis.store'))->class('form')->open() }}

                <div class="card">
                    <div class="card-header">
                        <i class="cil-plus"></i><strong>Tambah Data Prodi</strong>
                    </div>

                    <div class="card-body">
                        @include('admin.prodis._form')
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
