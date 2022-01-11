@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Pengabdian' => route('admin.pengabdians.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('pengabdian_manage')
        {!! cui_toolbar_btn(route('admin.pengabdians.index'), 'icon-list', trans('global.list').' '.trans('cruds.pengabdian.title_singular') ) !!}
        {!! cui_toolbar_btn(route('admin.pengabdians.edit',[$pengabdian->id]), 'icon-pencil', trans('global.edit').' '.trans('cruds.pengabdian.title_singular') ) !!}
        {!! cui_toolbar_btn(route('admin.pengabdians.destroy',[$pengabdian->id]), 'icon-trash', trans('global.delete').' '.trans('cruds.pengabdian.title_singular') ) !!}
    @endcan
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <strong>Informasi Detail Usulan Pengabdian</strong>
                </div>

                <div class="card-body">

                    @include('pengabdians._detail')

                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">
                            <strong>Pengabdi</strong>
                        </label>
                        <div class="col-sm-10">
                            @include('pengabdians.anggota._info')
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-2">
                            <strong>Ringkasan</strong>
                        </div>
                        <div class="col-sm-10">
                            {!! $pengabdian->ringkasan_eksekutif_simple !!}
                        </div>
                    </div>
                </div>

                <div class="card-footer">


                </div>
            </div>
        </div>

        <div class="col-sm-4">
            @can('usulan_komentar_view')
                <div class="card border-warning mb-3">
                    <div class="card-header">
                        <strong>Komentar/Peringatan</strong>
                    </div>

                    <div class="card-body text-warning">
                        @include('admin.usulanKomentars._form')
                        <hr>
                        @include('admin.usulanKomentars.index')
                    </div>

                </div>
            @endcan
        </div>

    </div>
@endsection
