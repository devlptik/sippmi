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
                <div class="row">
                    <div class="col-md-6">
                        {{ html()->form('POST', route('admin.proposal-seleksi.accept',[ $result->id]))->open() }}

                        {{ html()->hidden('tahun', $tahun)->id('tahun') }}

                        {{ html()->hidden('skema_id', $skema_id)->id('skema_id') }}

                        {{ html()->hidden('usulan_id', $result->id) }}

                        {{ html()->submit('Terima')->class('btn btn-success ml-sm-2 pull-left') }}

                        {{ html()->form()->close() }}
                    </div>
                    <div class="col-md-6">
                        {{ html()->form('POST', route('admin.proposal-seleksi.reject', [$result->id]))->open() }}

                        {{ html()->hidden('tahun', $tahun)->id('tahun') }}

                        {{ html()->hidden('skema_id', $skema_id)->id('skema_id') }}

                        {{ html()->hidden('usulan_id', $result->id) }}

                        {{ html()->submit('Tolak')->class('btn btn-danger ml-sm-2 pull-right') }}

                        {{ html()->form()->close() }}
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
