@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Skema' => route('admin.jurnal-skemas.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('ref_skema_manage')
        {!! cui()->toolbar_btn(route('admin.jurnal-skemas.create'), 'cil-plus', 'Tambah Skema') !!}
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-header font-weight-bold">
            List Skema Usulan Insentif Publikasi Jurnal
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-outline table-striped table-hover datatable datatable-RefSkema"
                       style="width: 100%">
                    <thead class="thead-light">
                    <tr>
                        <th>
                            Nama Skema
                        </th>
                        <th style="width: 80px">
                            Unit
                        </th>
                        <th style="width: 100px">
                            Insentif
                        </th>
                        <th style="width: 80px" class="text-center">
                            Jumlah Reviewer
                        </th>
                        <th style="width: 80px" class="text-center">
                            <i class="cil-options"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jurnalSkemas as $key => $jurnalSkema)
                        <tr data-entry-id="{{ $jurnalSkema->id }}" >
                            <td>
                                {{ $jurnalSkema->nama ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalSkema->nama_unit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalSkema->insentif ? format_rupiah($jurnalSkema->insentif) : '' }}
                            </td>
                            <td>
                                {{ $jurnalSkema->jumlah_reviewer ?? '' }}
                            </td>
                            <td class="text-center">
                                @can('ref_skema_view')
                                    {!! cui()->btn_view(route('admin.jurnal-skemas.show', [$jurnalSkema->id])) !!}
                                @endcan

                                @can('ref_skema_manage')
                                    {!! cui()->btn_edit(route('admin.jurnal-skemas.edit', [$jurnalSkema->id])) !!}
                                    {!! cui()->btn_delete(route('admin.jurnal-skemas.destroy', [$jurnalSkema->id]), "Anda yakin akan menghapus data Skema ini?") !!}
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[2, 'desc']],
                pageLength: 100,
            });
            $('.datatable-RefSkema:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
