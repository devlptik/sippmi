@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Pengabdian' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('manage_pengabdian_user')
        {!! cui_toolbar_btn(route('pengabdians.index'), 'icon-list', 'List Pengabdian') !!}
    @endcan
@endsection


@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <strong>Informasi Detail Usulan pengabdian</strong>
                </div>

                <div class="card-body">

                    @include('pengabdians._detail')

                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">
                            <strong>Peneliti</strong>
                        </label>
                        <div class="col-sm-10">
                            @include('pengabdians.anggota._info')
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">
                            <strong>Mahasiswa</strong>
                        </label>
                        <div class="col-sm-10">
                            @include('pengabdians.anggota._mahasiswa')
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-2">
                            <strong>Ringkasan Eksekutif</strong>
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
            <div class="card border-warning mb-3">
                <div class="card-header">
                    <strong>Komentar/Peringatan</strong>
                </div>

                <div class="card-body text-warning">
                    @include('admin.usulanKomentars.index')
                </div>

            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <strong>Luaran Pengabdian</strong>
                </div>

                <div class="card-body">
                    @if($outputs->count() > 1)
                        @include('pengabdians.outputs._index')
                    @endif
                </div>
            </div>
        </div>

    </div>

@endsection
