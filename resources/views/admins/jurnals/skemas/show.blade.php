@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Skema' => route('admin.jurnal-skemas.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('ref_skema_manage')
        {!! cui_toolbar_btn(route('admin.jurnal-skemas.index'), 'cil-list', 'List Skema' ) !!}
        {!! cui_toolbar_btn(route('admin.jurnal-skemas.edit',[$skema]), 'cil-pencil', 'Edit Skema') !!}
        {!! cui_toolbar_btn(route('admin.jurnal-skemas.destroy',[$skema]), 'cil-trash', 'Hapus Skema') !!}
    @endcan
@endsection

@section('content')
    <div class="col">
        <div class="row">
            <div class="col-sm-6">

                <div class="card">

                    <div class="card-body">

                        <h4>{{ $skema->nama }}</h4>

                        <hr>

                        <!-- Static Field for Unit Id -->
                        <div class="form-group">
                            <div class="form-label">Unit Sumber Pendanaan</div>
                            <div>{{ $skema->nama_unit }}</div>
                        </div>


                        <!-- Static Field for Insentif -->
                        <div class="form-group">
                            <div class="form-label">Besaran Insentif</div>
                            <div>{{ $skema->insentif }}</div>
                        </div>

                        <!-- Static Field for Jumlah Reviewer -->
                        <div class="form-group">
                            <div class="form-label">Jumlah Reviewer</div>
                            <div>{{ $skema->jumlah_reviewer }}</div>
                        </div>


                    </div>
                </div>


            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>

@endsection
