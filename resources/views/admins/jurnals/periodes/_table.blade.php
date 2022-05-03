<div class="table-responsive">
    <table class=" table table-outline table-striped table-hover"
           style="width: 100%">
        <thead class="thead-light">
        <tr>
            <th>
                Nama
            </th>
            <th>
                Periode Terbit
            </th>
            <th>
                Periode Pengusulan
            </th>
            @can('ref_skema_manage')
                <th style="width: 80px" class="text-center">
                    <i class="cil-options"></i>
                </th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($periodes as $key => $periode)
            <tr data-entry-id="{{ $periode->id }}">
                <td>
                    {{ $periode->nama ?? '' }}
                </td>
                <td>
                    {{ $periode->periode_mulai ?? '' }}
                    <br><strong>s/d</strong><br>
                    {{ $periode->periode_akhir }}
                </td>
                <td>
                    {{ $periode->tgl_mulai_reg->toDateString() ?? "-" }}
                    <br><strong>s/d</strong><br>
                    {{ $periode->tgl_akhir_reg->toDateString() ?? "-" }}
                </td>
                @can('ref_skema_manage')
                    <td class="text-center">
                        {!! cui()->btn_edit(route('admin.jurnal-periodes.edit', [$skema->id, $periode->id])) !!}
                        {!! cui()->btn_delete(route('admin.jurnal-periodes.destroy', [$skema->id, $periode->id]), "Anda yakin akan menghapus data Periode Skema ini?") !!}
                    </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
