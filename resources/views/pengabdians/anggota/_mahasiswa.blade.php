<table class="table table-hover table-sm">
    <thead>
    <tr>
        <th scope="col" >
            Nama
        </th>
        <th >
            NIM
        </th>
        <th scope="col" >Prodi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pengabdian->usulan->anggotas->filter(function ($value,$key){return $value->tipe == 2;}) as $anggota)
        <tr>
            <td>
                {{ optional($anggota)->nama }} <br>
            </td>
            <td>
                {{ optional($anggota)->identifier }}
            </td>
            <td>
                {{ optional($anggota)->unit }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
