@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui_breadcrumb([
        'Home' => route('admin.home'),
        'Monitoring Luaran' => '#'
    ]) !!}
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <strong><i class="fa fa-filter"></i> Filter</strong>
        </div>

        <div class="card-body">
            @include('admins.seleksi.hasil._form')
        </div>
    </div>

    @if($results)
        <div class="card">

            <div class="card-body">

                @include('admins.seleksi.hasil._table')
            </div>

        </div>
    @endif

@endsection
