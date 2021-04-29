@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Penelitian' => route('admin.penelitians.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.penelitians.index'), 'icon-list', 'List Penelitian') !!}
@endsection

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endsection

@section('content')
    <div class="card">
        <form method="POST" action="{{ route("admin.penelitians.store") }}" enctype="multipart/form-data">
            <div class="card-header">
                Tambah Data Penelitian
            </div>

            <div class="card-body">
                @csrf

                @include('admin.penelitians._form')

            </div>
            <div class="card-footer">
                <button class="btn btn-danger" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>

@endsection
