@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Program Studi' => route('admin.prodis.index'),
        'Edit' => '#'
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

            {{ html()->modelForm($prodi, 'PUT', route('admin.prodis.update', [$prodi->id]))->class('form')->open() }}

                <div class="card">

                    <div class="card-header">
                        <strong>Edit Data Prodi</strong>
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

            {{ html()->closeModelForm() }}
        </div>
    </div>
@endsection
