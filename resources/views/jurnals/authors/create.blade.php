@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Jurnal' => route('jurnals.index'),
        'Author' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('jurnal_user_manage')
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

            <hr>

            <!-- DOSEN -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <strong>Author (Dosen)</strong>
                </label>
                <div class="col-sm-10">

                    <form method="POST"
                          action="{{ route('jurnals.authors.store', [$jurnal->id]) }}"
                          enctype="multipart/form-data"
                          class="form form-inline">
                        @csrf
                        <input type="hidden" name="tipe" value="1">
                        <div class="form-group mb-2">
                            <label for="dosen_id" class="sr-only">Penulis #</label>
                            <select
                                class="custom-select select2 my-1 mr-sm-2 {{ $errors->has('dosen') ? 'is-invalid' : '' }}"
                                name="dosen_id" id="dosen_id">

                                @foreach($dosens as $id => $dosen)
                                    <option
                                        value="{{ $id }}" {{ old('dosen_id') == $id ? 'selected' : '' }}>{{ $dosen }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mb-2 ml-2">
                            <label for="no_urut" class="sr-only">Penulis #</label>
                            <select
                                class="custom-select"
                                name="no_urut" id="no_urut">
                                @foreach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 1] as $no_urut)
                                    <option
                                        value="{{ $no_urut }}" {{ old('no_urut') == $no_urut ? 'selected' : '' }}>{{ $no_urut }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-danger mb-2 ml-2" type="submit">Tambah Penulis</button>
                    </form>

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
                            <th scope="col" class="text-center">Author #</th>
                            <th scope="col" class="text-center">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($anggotas->filter(function ($value,$key){return $value->tipe == 1;}) as $anggota)
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
                                    {{ optional($anggota)->no_urut }}
                                </td>
                                <td class="text-center">
                                    @if($jurnal->pengusul_id != $anggota->dosen_id)
                                        {!! cui()->btn_delete(route('jurnals.authors.destroy', [$jurnal->id, $anggota->id]), trans('global.areYouSure')) !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <hr>

            <!-- FORM MAHASISWA -->
            <div class="form-group row">
                <label for="file_proposal" class="col-sm-2 col-form-label">
                    <strong>Author Mahasiswa</strong>
                </label>
                <div class="col-sm-10">

                    <form method="POST"
                          action="{{ route("jurnals.authors.store", [$jurnal->id]) }}"
                          enctype="multipart/form-data"
                          class="form form-inline">
                        @csrf
                        <input type="hidden" name="tipe" value="2" />

                        <div class="form-group mb-2">
                            <label for="nama" class="sr-only">Nama</label>
                            {!! html()->text('nama')->placeholder('Nama Mahasiswa')->class(['form-control']) !!}
                        </div>

                        <div class="form-group mb-2 ml-2">
                            <label for="identifier" class="sr-only">NIM</label>
                            {!! html()->text('identifier')->placeholder('NIM')->class(['form-control']) !!}
                        </div>

                        <div class="form-group mb-2 ml-2">
                            <label for="unit" class="sr-only">Penulis #</label>
                            <select
                                class="custom-select select2 my-1 mr-sm-2 {{ $errors->has('unit') ? 'is-invalid' : '' }}"
                                name="unit" id="unit">

                                @foreach($prodis as $id => $prodi)
                                    <option
                                        value="{{ $prodi }}" {{ old('unit') == $id ? 'selected' : '' }}>{{ $prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2 ml-2">
                            <label for="no_urut" class="sr-only">Penulis #</label>
                            <select
                                class="custom-select"
                                name="no_urut" id="no_urut">
                                @foreach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 1] as $no_urut)
                                    <option
                                        value="{{ $no_urut }}" {{ old('no_urut') == $no_urut ? 'selected' : '' }}>{{ $no_urut }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-danger mb-2 ml-2" type="submit">Tambah Penulis</button>

                    </form>

                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                Nama /NIM
                            </th>
                            <th scope="col" class="text-center">Prodi</th>
                            <th scope="col" class="text-center">Author #</th>
                            <th scope="col" class="text-center">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($anggotas->filter(function ($value,$key){return $value->tipe == 2;}) as $anggota)
                            <tr>
                                <td>
                                    {{ optional($anggota)->nama }}<br>
                                    <small><em>{{ optional($anggota)->identifier }}</em></small>
                                </td>
                                <td>
                                    {{ optional($anggota)->unit }}
                                </td>
                                <td class="text-center">
                                    {{ optional($anggota)->no_urut }}
                                </td>
                                <td class="text-center">
                                    @if($jurnal->pengusul_id != $anggota->dosen_id)
                                        {!! cui()->btn_delete(route('jurnals.authors.destroy', [$jurnal->id, $anggota->id]), trans('global.areYouSure')) !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card-footer">
            <a href="{{ route('jurnals.edit', $jurnal->id) }}" class="btn btn-danger">Kembali</a>
            <a href="{{ route('jurnals.show', $jurnal->id) }}" class="btn btn-primary">Selanjutnya</a>
        </div>
        </div>
    </div>

@endsection
