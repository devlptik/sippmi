<table class="table table-hover table-sm">
    <thead>
    <tr>
        <th>
            Jenis
        </th>
        <th scope="col">
            Nama <br>
            <small>NIP/NIM</small>
        </th>
        <th>
            NIDN
        </th>
        <th scope="col">Prodi</th>
        <th scope="col">Penulis Ke</th>
    </tr>
    </thead>
    <tbody>
    @foreach($jurnal->anggotas as $anggota)
        @if($anggota->tipe == 1)
            <tr>
                <td>Dosen</td>
                <td>
                    {{ optional($anggota->dosen)->nama }}<br>
                    <small>{{ optional($anggota->dosen)->nip }}</small>
                </td>
                <td>{{ optional($anggota->dosen)->nidn }}</td>
                <td>
                    {{ optional($anggota->dosen->prodi)->nama }}
                </td>
                <td>
                    {{ $anggota->no_urut }}
                </td>
            </tr>
        @else
            <tr>
                <td>Mahasiswa</td>
                <td>
                    {{ optional($anggota)->nama }}<br>
                    <small>{{ optional($anggota)->identifier }}</small>
                </td>
                <td>-</td>
                <td>
                    {{ $anggota->prodi }}
                </td>
                <td>
                    {{ $anggota->no_urut }}
                </td>
            </tr>

        @endif
    @endforeach
    </tbody>
</table>
