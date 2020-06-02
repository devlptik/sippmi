@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Role' => route('admin.roles.index'),
        'Create' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('permission_view')
        {!! cui()->toolbar_btn(route('admin.roles.index'), 'cil-list', 'List Role') !!}
    @endcan
@stop
@section('content')
    <div class="row">
        <div class="col-sm-8">

            {{ html()->form('POST', route('admin.roles.store'))->class('form')->open() }}

                <div class="card">
                    <div class="card-header">
                        <i class="cil-plus"></i><strong>Tambah Data Role</strong>
                    </div>

                    <div class="card-body">
                        @include('admin.roles._form')
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
