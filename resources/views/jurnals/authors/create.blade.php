@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Jurnal' => route('jurnals.index'),
        'Author' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('jurnal_user_manager')
        {!! cui_toolbar_btn(route('jurnals.index'), 'icon-list', 'List Usulan Jurnal') !!}
    @endcan
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>Kelola Author Jurnal</strong>
        </div>

        <div class="card-body">

            @include('jurnals._info')

            <!-- DOSEN -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <strong>Author</strong>
                </label>
                <div class="col-sm-10">

                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                Nama / NIP
                            </th>
                            <th class="text-center">
                                NIDN
                            </th>
                            <th scope="col" class="text-center">Prodi</th>
                            <th scope="col" class="text-center">Dosen</th>
                            <th scope="col" class="text-center">Jabatan</th>
                            <th scope="col" class="text-center">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form method="POST"
                              action="{{ route("jurnals.author.store", [$jurnal->id]) }}"
                              enctype="multipart/form-data"
                              class="form form-inline">
                            @csrf
                            <tr>
                                <td colspan="3">
                                    <select
                                        class="custom-select select2 my-1 mr-sm-2 {{ $errors->has('dosen') ? 'is-invalid' : '' }}"
                                        name="dosen_id" id="dosen_id">

                                        @foreach($dosens as $id => $dosen)
                                            <option
                                                value="{{ $id }}" {{ old('dosen_id') == $id ? 'selected' : '' }}>{{ $dosen }}</option>
                                        @endforeach

                                    </select>
                                </td>
                                <td>
                                    <select name="no_urut">
                                        @foreach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 1] as $no_urut)
                                            <option
                                                value="{{ $no_urut }}" {{ old('no_urut') == $no_urut ? 'selected' : '' }}>{{ $no_urut }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td colspan="2">
                                    <button class="btn btn-danger btn-block" type="submit">Tambah Penulis</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($jurnal->anggotas->filter(function ($value,$key){return $value->tipe == 1;}) as $anggota)
                            <tr>
                                <td>
                                    {{ optional($anggota->dosen)->nama }} <br>
                                    <small><em>{{ optional($anggota->dosen)->nip }}</em></small>
                                </td>
                                <td>
                                    {{ optional($anggota->dosen)->nidn }}
                                </td>
                                <td>
                                    {{ optional($anggota->dosen->prodi)->nama }}
                                </td>
                                <td class="text-center">
                                    @if(isset($anggota->jabatan))
                                        {{ \App\PenelitianAnggotum::JABATAN_SELECT[$anggota->jabatan] }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($penelitian->owner != $anggota->dosen_id)
                                        {!! cui()->btn_delete(route('penelitian.anggota.destroy', [$penelitian->id, $anggota->id]), trans('global.areYouSure')) !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
{{--            form mahasiswa--}}
            <div class="form-group row">
                <label for="file_proposal" class="col-sm-2 col-form-label">
                    <strong>Mahasiswa</strong>
                </label>
                <div class="col-sm-10">

                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                Nama
                            </th>
                            <th scope="col" class="text-center">NIM</th>
                            <th scope="col" class="text-center">Prodi</th>
                            <th scope="col" class="text-center">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form method="POST"
                              action="{{ route("penelitian.anggota-mahasiswa.store", [$penelitian->id]) }}"
                              enctype="multipart/form-data"
                              class="form form-inline">
                            @csrf
                            <tr>
                                <td>
                                    {!! html()->text('nama')->placeholder('Nama Mahasiswa')->class(['form-control']) !!}
                                </td>
                                <td>
                                    {!! html()->text('identifier')->placeholder('NIM')->class(['form-control']) !!}
                                </td>
                                <td>
                                    <select
                                        class="custom-select select2 my-1 mr-sm-2 {{ $errors->has('unit') ? 'is-invalid' : '' }}"
                                        name="unit" id="unit">

                                        @foreach($prodis as $id => $prodi)
                                            <option
                                                value="{{ $prodi }}" {{ old('unit') == $id ? 'selected' : '' }}>{{ $prodi }}</option>
                                        @endforeach

                                    </select>
                                </td>
                                <td colspan="2">
                                    <button class="btn btn-danger btn-block" type="submit">Tambah Anggota</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($penelitian->usulan->anggotas->filter(function ($value,$key){return $value->tipe == 2;}) as $anggota)
                            <tr>
                                <td>
                                    {{ optional($anggota)->nama }}
                                </td>
                                <td>
                                    {{ optional($anggota)->identifier }}
                                </td>
                                <td>
                                    {{ optional($anggota)->unit }}
                                </td>
                                <td>
{{--                                    {{ optional($anggota->dosen->prodi)->nama }}--}}
                                </td>
                                <td class="text-center">
                                    @if($penelitian->owner != $anggota->dosen_id)
                                        {!! cui()->btn_delete(route('penelitian.anggota.destroy', [$penelitian->id, $anggota->id]), trans('global.areYouSure')) !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('penelitians.eksekutif', $penelitian) }}" class="btn btn-danger">Kembali</a>
            <a href="{{ route('penelitians.review', $penelitian->id) }}" class="btn btn-primary">Selanjutnya</a>
        </div>
    </div>


@endsection
