<div class="form-group">
    <label for="nama">{{ trans('cruds.fakultum.fields.nama') }}</label>
    {!! html()->text('nama')->id('nama')->placeholder(trans('cruds.fakultum.fields.nama_helper'))->class(['form-control',  'is-invalid' => $errors->has('nama')]) !!}
    @if($errors->has('nama'))
        <div class="invalid-feedback">
            {{ $errors->first('nama') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="singkatan">{{ trans('cruds.fakultum.fields.singkatan') }}</label>
    {!! html()->text('singkatan')->id('singkatan')->placeholder(trans('cruds.fakultum.fields.singkatan_helper'))->class(['form-control','col-5',  'is-invalid' => $errors->has('singkatan')]) !!}
    @if($errors->has('singkatan'))
        <div class="invalid-feedback">
            {{ $errors->first('singkatan') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="kode">{{ trans('cruds.fakultum.fields.kode') }}</label>
    {!! html()->text('kode')->class(['form-control','col-5',  'is-invalid' => $errors->has('kode')])->id('kode') !!}
    @if($errors->has('kode'))
        <div class="invalid-feedback">
            {{ $errors->first('kode') }}
        </div>
    @endif
</div>