@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Skema' => route('admin.ref-skemas.index'),
        'Detail Skema' => route('admin.ref-skemas.index',[$refSkema->id]),
        'Add Output Skema' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('ref_skema_view')
        {!! cui_toolbar_btn(route('admin.ref-skemas.show',[$refSkema->id]), 'icon-eye', trans('global.show').' '.trans('cruds.refSkema.title_singular') ) !!}
    @endcan
@endsection

@section('content')
    <div class="col">
        <div class="row">
            <div class="col-sm-6">

                <div class="card">

                    <div class="card-header font-weight-bold">
                        {{ trans('global.show') }} {{ trans('cruds.refSkema.title') }}
                    </div>

                    <div class="card-body">

                        <h4>{{ $refSkema->nama }}</h4>

                        <hr>

                        <!-- Static Field for Jenis Usulan -->
                        <div class="form-group">
                            <div class="form-label">Jenis Usulan</div>
                            <div>{{ App\RefSkema::JENIS_USULAN_SELECT[$refSkema->jenis_usulan] ?? '' }}</div>
                        </div>


                        <!-- Static Field for Jangka Waktu -->
                        <div class="form-group">
                            <div class="form-label">Jangka Waktu</div>
                            <div>{{ $refSkema->jangka_waktu }}</div>
                        </div>

                        <!-- Static Field for Sumber Dana -->
                        <div class="form-group">
                            <div class="form-label">Sumber Dana</div>
                            <div>{{ $refSkema->sumber_dana }}</div>
                        </div>

                        <!-- Static Field for Biaya -->
                        <div class="form-group">
                            <div class="form-label">Biaya</div>
                            <div> {{ format_rupiah($refSkema->biaya_minimal) }} s/d {{ format_rupiah($refSkema->biaya_maksimal) }}</div>
                        </div>

                        <!-- Static Field for Jumlah Peneliti (termasuk Ketua) -->
                        <div class="form-group">
                            <div class="form-label">Jumlah Peneliti (termasuk Ketua)</div>
                            <div>{{ $refSkema->anggota_min }} s/d {{ $refSkema->anggota_max }}</div>
                        </div>

                        <!-- Static Field for Jumlah Anggota Mahasiswa  -->
                        <div class="form-group">
                            <div class="form-label">Jumlah Anggota Mahasiswa</div>
                            <div>{{ $refSkema->mahasiswa_min }} s/d {{ $refSkema->mahasiswa_max }}</div>
                        </div>

                        <!-- Static Field for Tanggal Submit Proposal -->
                        <div class="form-group">
                            <div class="form-label">Tanggal Submit Proposal</div>
                            <div>{{ $refSkema->tanggal_mulai }} s/d {{ $refSkema->tanggal_selesai }}</div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        {{ trans('global.create') }} {{ trans('cruds.outputSkema.title_singular') }}
                    </div>

                    <div class="card-body">

                        {{ html()->modelForm($outputSkema, 'PUT', route('admin.output-skemas.update',[$refSkema->id, $outputSkema->id]))->open() }}

                        @include('admins.referensis.ref_skemas.output_skemas._form')

                        {{ html()->closeModelForm() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
