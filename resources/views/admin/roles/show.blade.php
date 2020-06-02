@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Role' => route('admin.roles.index'),
        'Lihat' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('role_manage')
        {!! cui()->toolbar_delete(route('admin.roles.destroy', $role->id), $role->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus data ini?') !!}
        {!! cui()->toolbar_btn(route('admin.roles.edit', $role->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('admin.roles.create'), 'cil-plus', 'Tambah') !!}
    @endcan
    @can('role_view')
        {!! cui()->toolbar_btn(route('admin.roles.index'), 'cil-list', 'List Program Studi') !!}
    @endcan
@stop
@section('content')

<div class="card">
    <div class="card-header font-weight-bold">
        <i class="cil-zoom"></i> Lihat Role
    </div>

    <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2">
                    <strong>{{ trans('cruds.role.fields.id') }}</strong>
                </div>
                <div class="col-sm-10">
                {{ $role->id }}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <strong>{{ trans('cruds.role.fields.title') }}</strong>
                </div>
                <div class="col-sm-10">
                {{ $role->title }}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <strong>{{ trans('cruds.role.fields.permissions') }}</strong>
                </div>
                <div class="col-sm-10">
                    @foreach($role->permissions as $key => $permissions)
                        <span class="label label-info">{{ $permissions->title }}</span>
                    @endforeach
                </div>
            </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#roles_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="roles_users">
            @includeIf('admin.roles.relationships.rolesUsers', ['users' => $role->rolesUsers])
        </div>
    </div>
</div>

@endsection
