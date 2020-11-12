<div class="form-group">
    <label for="nama">{{ trans('cruds.prodi.fields.nama') }}</label>
    {!! html()->text('nama')->id('nama')->placeholder(trans('cruds.prodi.fields.nama_helper'))->class(['form-control',  'is-invalid' => $errors->has('nama')]) !!}
    @if($errors->has('nama'))
        <div class="invalid-feedback">
            {{ $errors->first('nama') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="fakultas">{{ trans('cruds.prodi.fields.fakultas') }}</label>
        <select class="form-control select2 {{ $errors->has('fakultas') ? 'is-invalid' : '' }}" name="fakultas_id" id="fakultas_id">
            @foreach($fakultas as $id => $fakultas)
                <option value="{{ $id }}" {{ old('fakultas_id') == $id ? 'selected' : '' }}>{{ $fakultas }}</option>
            @endforeach
        </select>
        @if($errors->has('fakultas'))
        <div class="invalid-feedback">
            {{ $errors->first('fakultas') }}
        </div>
        @endif
</div>

<div class="form-group">
    <label for="kode">{{ trans('cruds.prodi.fields.kode') }}</label>
    {!! html()->text('kode')->placeholder(trans('cruds.prodi.fields.kode_helper'))->class(['form-control','col-5',  'is-invalid' => $errors->has('kode')])->id('kode') !!}
    @if($errors->has('kode'))
        <div class="invalid-feedback">
            {{ $errors->first('kode') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="kode_dikti">{{ trans('cruds.prodi.fields.kode_dikti') }}</label>
    {!! html()->text('kode_dikti')->placeholder(trans('cruds.prodi.fields.kode_dikti_helper'))->class(['form-control','col-6',  'is-invalid' => $errors->has('kode_dikti')])->id('kode_dikti') !!}
    @if($errors->has('kode_dikti'))
        <div class="invalid-feedback">
            {{ $errors->first('kode_dikti') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="akreditasi">{{ trans('cruds.prodi.fields.akreditasi') }}</label>
    {!! html()->text('akreditasi')->placeholder(trans('cruds.prodi.fields.akreditasi_helper'))->class(['form-control','col-5',  'is-invalid' => $errors->has('akreditasi')])->id('akreditasi') !!}
    @if($errors->has('akreditasi'))
        <div class="invalid-feedback">
            {{ $errors->first('akreditasi') }}
        </div>
    @endif
</div>