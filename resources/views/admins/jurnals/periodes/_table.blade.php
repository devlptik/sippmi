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
