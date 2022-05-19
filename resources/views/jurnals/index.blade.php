@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Jurnal' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('jurnal_user_manage')
        {!! cui_toolbar_btn(route('usulan-jurnals.create'), 'cil-plus', 'Tambah Usulan Insentif Jurnal') !!}
    @endcan
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Daftar Usulan Insentif Jurnal</strong>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>
                            Skema
                        </th>
                        <th>
                            Periode
                        </th>
                        <th>
                            Judul Artikel
                        </th>
                        <th>
                            Link
                        </th>
                        <th>
                            Status
                        </th>
                        <th class="text-center">
                            &nbsp;Aksi
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($jurnals as $key => $jurnal)
                        <tr data-entry-id="{{ $jurnal->id }}">
                            <td>{{ optional($jurnal->skema)->nama }}</td>
                            <td>{{ optional($jurnal->periode)->nama }}</td>
                            <td>{{ $jurnal->judul }}</td>
                            <td>
                                <a href="{{ $jurnal->link }}" target="_blank" class="btn btn-link"><i class="fa fa-file-pdf-o"></i> </a>
                            </td>
                            <td class="text-center">
                                <h5>
                                    {{ \App\Jurnal::STATUS_LABEL[$jurnal->status]}}
                                </h5>
                            </td>
                            <td class="text-center">
                                {!! cui()->btn_view(route('jurnal.show', $jurnal->id)) !!}
                                @if(!$jurnalj->isDecided())
                                    @if($jurnal->pengusul_id == auth()->user()->id)
                                        {!! cui()->btn_edit(route('jurnals.edit', $jurnal->id)) !!}
                                        {!! cui()->btn_delete(route('jurnals.destroy', $jurnal->id), trans('global.areYouSure')) !!}
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <h5>Belum ada data usulan insentif jurnal</h5>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
