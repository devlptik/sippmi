{{ html()->form('POST', route('admin.proposal-seleksi.store'))->open() }}

<!-- Input (Select) Tahun -->
<div class="form-group">
    <label class="form-label" for="tahun">Tahun</label>
    {{ html()->select('tahun', $tahuns, old('tahun', $tahun))->class(["form-control", "is-invalid" => $errors->has('tahun')])->id('tahun')->placeholder('') }}
    @error('tahun')
    <div class="invalid-feedback">{{ $errors->first('tahun') }}</div>
    @enderror
</div>

<!-- Input (Select) Jenis Usulan -->
<div class="form-group">
    <label class="form-label" for="skema_id">Skema</label>
    {{ html()->select('skema_id', $skemas, $skema_id)->class(["form-control select2", "is-invalid" => $errors->has('skema_id')])->id('skema_id')->placeholder('') }}
    @error('skema_id')
    <div class="invalid-feedback">{{ $errors->first('skema_id') }}</div>
    @enderror
</div>

{{ html()->submit('Filter')->class('btn btn-primary ml-sm-2') }}

{{ html()->form()->close() }}
