<h4>{{ $skema->nama }}</h4>
<h4><small>Tahun : {{ $tahun }}</small></h4>

<table class="table table-outline">
    <thead>
    <tr>
        <th>Pengusul</th>
        <th>Judul</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{ $result->ketua->first->nama->nama }}</td>
            <td>{!! trim($result->judulSimple) !!}</td>
            <td class="text-center">
                <h5>
                    <span class="badge badge-{!! $result->statusTextColor !!}">
                        {{ $result->statusText }}
                    </span>
                </h5>
            </td>
            <td>
                {{ html()->form('POST', route('admin.proposal-seleksi.accept',[ $result->id]))->open() }}

                {{ html()->hidden('tahun', $tahun)->id('tahun') }}

                {{ html()->hidden('skema_id', $skema_id)->id('skema_id') }}

                {{ html()->hidden('usulan_id', $result->id) }}

                <button type="submit" class="block btn btn-success ml-sm-2">
                    <i class="cil-check-circle"></i>
                </button>

                {{ html()->form()->close() }}
                {{ html()->form('POST', route('admin.proposal-seleksi.reject', [$result->id]))->open() }}

                {{ html()->hidden('tahun', $tahun)->id('tahun') }}

                {{ html()->hidden('skema_id', $skema_id)->id('skema_id') }}

                {{ html()->hidden('usulan_id', $result->id) }}

                <button type="submit" class="block btn btn-danger ml-sm-2">
                    <i class="cil-x-circle"></i>
                </button>

                {{ html()->form()->close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
