@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Jurnal' => route('jurnals.index'),
        'Usulan' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('jurnals.index'), 'cil-list', 'List Usulan Insentif Jurnal' ) !!}
@endsection

@section('content')
    <div class="col">
        <div class="row">

            <div class="col-sm-8">

                <div class="card">

                    {{ html()->form('POST', route('jurnals.store'))->acceptsFiles()->open() }}

                    <div class="card-header font-weight-bold">
                        <i class="cil-plus"></i> Tambah Usulan Insentif Jurnal
                    </div>

                    <div class="card-body">
                        @include('jurnals._form')
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-info" type="submit">
                            Tambah Usulan
                        </button>
                    </div>

                    {{ html()->form()->close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
