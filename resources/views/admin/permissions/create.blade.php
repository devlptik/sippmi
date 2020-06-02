@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Permission' => route('admin.permissions.index'),
        'Tambah' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('permission_view')
        {!! cui()->toolbar_btn(route('admin.permissions.index'), 'cil-list', 'List Permission') !!}
    @endcan
@stop
@section('content')

<div class="row">
        <div class="col-sm-8">

            {{ html()->form('POST', route('admin.permissions.store'))->class('form')->open() }}

                <div class="card">
                    <div class="card-header">
                        <i class="cil-plus"></i><strong>Tambah Data Permission</strong>
                    </div>

                    <div class="card-body">
                        @include('admin.permissions._form')
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