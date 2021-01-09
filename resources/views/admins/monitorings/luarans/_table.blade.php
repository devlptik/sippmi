<h4>{{ $skema->nama }}</h4>
<h4><small>Tahun : {{ $tahun }}</small></h4>

<table class="table table-outline">
    <thead>
    <tr>
        <th>Pengusul</th>
        <th>Judul</th>
        @foreach($outputs as $output)
            <th>{{ $output->output->luaran }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{ $result->ketua->first->nama->nama }}</td>
            <td>{!! trim($result->judulSimple) !!}</td>
            @foreach($outputs as $output)
                @php
                    $output_result = $result->outputs->where('output_skema_id', $output->id)->first();
                @endphp
                @if($output_result != null)
                    <td>
                        <a href="{{ Storage::url('luaran/'.$output_result->filename) }}" target="_blank" class="btn btn-primary">
                            <i class="cil cil-check"></i>
                        </a>
                    </td>
                @else
                    <td>
                        <button disabled class="btn btn-outline-danger">
                            <i class="cil cil-x"></i>
                        </button>
                    </td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
