@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Penelitian' => route('admin.penelitians.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('penelitian_manage')
        {!! cui_toolbar_btn(route('admin.penelitians.index'), 'icon-list', 'List Penelitian') !!}
    @endcan
@endsection

@section('content')


    <div class="card">

        <div class="card-header">
            <strong>{{ trans('global.create') }} {{ trans('cruds.penelitianAnggotum.title_singular') }}</strong>
        </div>

        <div class="card-body">

            @include('penelitians._info')
{{--                form dosen--}}
            <div class="form-group row">
                <label for="file_proposal" class="col-sm-2 col-form-label">
                    <strong>Peneliti</strong>
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
                            <th scope="col" class="text-center">Jabatan</th>
                            <th scope="col" class="text-center">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form method="POST"
                              action="{{ route("admin.penelitian.anggota.store", [$penelitian->id]) }}"
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
                                <td colspan="2">
                                    <button class="btn btn-danger btn-block" type="submit">Tambah Anggota</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($penelitian->usulan->anggotas->filter(function ($value,$key){return $value->tipe == 1;}) as $anggota)
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
                                        {!! cui()->btn_delete(route('admin.penelitian.anggota.destroy', [$penelitian->id, $anggota->id]), trans('global.areYouSure')) !!}
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
                              action="{{ route("admin.penelitian.anggota.storemahasiswa", [$penelitian->id]) }}"
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
                                        {!! cui()->btn_delete(route('admin.penelitian.anggota.destroy', [$penelitian->id, $anggota->id]), trans('global.areYouSure')) !!}
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
            <a href="{{ route('admin.penelitians.edit', $penelitian->id) }}" class="btn btn-danger">Kembali</a>
            <a href="{{ route('admin.penelitians.index', $penelitian->id) }}" class="btn btn-primary">Selesai</a>
        </div>

    </div>


@endsection
