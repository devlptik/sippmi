@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Penelitian' => route('admin.penelitians.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.penelitians.index'), 'icon-list', 'List Penelitian') !!}
@endsection

@section('content')

    <div class="card">

        {{ html()->modelForm($penelitian, 'PUT', route('admin.penelitians.update', [$penelitian->id]))->acceptsFiles()->open() }}

        <div class="card-header">
            Edit Usulan Penelitian
        </div>

        <div class="card-body">

            @include('admin.penelitians._form')

        </div>

        <div class="card-footer">
            <button class="btn btn-primary" type="submit">
                Simpan
            </button>
        </div>

        {{ html()->closeModelForm() }}

    </div>
@endsection

