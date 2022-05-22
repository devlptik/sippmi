<table class="table">
    <thead>
    <tr>
        <th>
            Luaran
        </th>
        <th>
            Aksi
        </th>
    </tr>
    </thead>
    @foreach($outputs as $output)
        <tr>
            <td>
                {{ $output->luaran }} @if($output->required) (Wajib) @endif
                <br>
                @if(empty($output->filename))
                    -
                @else
                    <a href="{{ Storage::url('luaran/'.$output->filename) }}" class="btn btn-link btn-sm">Download</a>
                @endif
            </td>
            <td>
                @if(empty($output->filename))
                    <a href="{{ route('pengabdian.output.show', [$output->pengabdian_id, $output->output_skema_id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> </a>
                @else
                    {!! cui()->btn_delete(route('pengabdian.output.destroy', [$output->pengabdian_id, $output->pengabdian_output_id]), 'Anda yakin akan menghapus file ini?') !!}
                @endif
            </td>
        </tr>
    @endforeach
</table>
