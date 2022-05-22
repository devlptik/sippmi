{{ html()->form('POST', route('admin.luaran-dosen.store'))->open() }}

<!-- Input (Select) Tahun -->
<div class="form-group">
    <label class="form-label" for="dosen_id">Dosen</label>
    {{ html()->select('dosen_id', $researchers, old('dosen_id', $dosen_id))->class(["form-control select2", "is-invalid" => $errors->has('dosen_id')])->id('dosen_id')->placeholder('') }}
    @error('dosen_id')
    <div class="invalid-feedback">{{ $errors->first('dosen_id') }}</div>
    @enderror
</div>

{{ html()->submit('Cari Dosen')->class('btn btn-primary ml-sm-2') }}

{{ html()->form()->close() }}
