@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Jurnal' => route('jurnals.index'),
        'Tambah Usulan' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('jurnal_user_manage')
        {!! cui_toolbar_btn(route('jurnals.index'), 'cil-list', 'List Usulan Insentif Jurnal') !!}
    @endcan
@endsection

@section('content')

    <div class="card">
        <div class="card-body">

            <h4>Daftar Skema Usulan Insentif yang Tersedia</h4>

            <table class="table table-borderless">
                @if($skemas->count() > 0)
                    @foreach($skemas as $skema)
                        <tr>
                            <td>
                                {{ $skema->nama }}
                            </td>
                            <td style="width: 200px">
                                <a href="{{ route('jurnals.create', [$skema->id]) }}"
                                   class="btn btn-info btn-small" >
                                    Submit Usulan
                                </a>
                            </td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <td class="text-center">
                            <h5 class="text-danger">
                                Belum ada skema usulan yang dibuka saat ini
                            </h5>
                        </td>
                    </tr>
                @endif
            </table>

        </div>
    </div>

@endsection

@section('scripts')

@endsection
