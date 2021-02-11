@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Plotting Reviewer' => route('admin.plotting-reviewers.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.plotting-reviewers.rekapitulasi'), 'cil-spreadsheet', 'Rekapitulasi') !!}
@endsection

@section('content')
    <div class="col">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">

                        @include('admins.reviews.plottings.filter')
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

