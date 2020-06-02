@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Permission' => route('admin.permissions.index'),
        'Lihat' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('permission_manage')
        {!! cui()->toolbar_delete(route('admin.permissions.destroy', $permission->id), $permission->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus data ini?') !!}
        {!! cui()->toolbar_btn(route('admin.permissions.edit', $permission->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('admin.permissions.create'), 'cil-plus', 'Tambah') !!}
    @endcan
    @can('permission_view')
        {!! cui()->toolbar_btn(route('admin.permissions.index'), 'cil-list', 'List Permission') !!}
    @endcan
@stop
@section('content')

<div class="card">
    <div class="card-header font-weight-bold">
        <i class="cil-zoom"></i> Lihat Permission
    </div>

    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-2">
                <strong>{{ trans('cruds.permission.fields.id') }}</strong>
            </div>
            <div class="col-sm-10">
            {{ $permission->id }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <strong>{{ trans('cruds.permission.fields.title') }}</strong>
            </div>
            <div class="col-sm-10">
            {{ $permission->title }}
            </div>
        </div>
    </div>
</div>


@endsection
