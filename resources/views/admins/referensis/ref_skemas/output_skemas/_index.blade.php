<div class="card">
    <div class="card-header">
        <strong><i class="cil-short-text"></i> Output Skema</strong>
    </div>

    <div class="card-body">
        <div>
            <div class="row">
                <div class="col-sm-6">
                    <strong>Output</strong>
                </div>
                <div class="col-sm-3 text-center">
                    <strong>Wajib</strong>
                </div>
                <div class="col-sm-3 text-center">
                    <strong>Aksi</strong>
                </div>
            </div>

            @foreach($refSkema->outputs as $output)
                <div class="row">
                    <div class="col-sm-6">
                        {{ $output->luaran }}
                    </div>
                    <div class="col-sm-3 text-center">
                        @if($output->pivot->required)
                            Ya
                        @else
                            Tidak
                        @endif
                    </div>
                    <div class="col-sm-3 text-center">
                        {!! cui_btn_edit(route('admin.output-skemas.edit', [$skema->id, $output->pivot->id])) !!}
                        {!! cui_btn_delete(route('admin.output-skemas.destroy', [$skema->id, $output->pivot->id]), 'Anda yakin akan menghapus pertanyaan ini?') !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('admin.output-skemas.create', [$skema->id]) }}" class="btn btn-sm btn-primary">Tambah Skema</a>
    </div>

</div>
