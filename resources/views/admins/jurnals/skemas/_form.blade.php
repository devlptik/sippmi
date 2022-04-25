<!-- Text Field Input for Nama Skema -->
<div class="form-group">
    <label class="form-label" for="nama">Nama Skema</label>
    {{ html()->text('nama')->class(["form-control", "is-invalid" => $errors->has('nama')])->id('nama')->placeholder('Nama Skema Usulan') }}
    @error('nama')
    <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
    @enderror
</div>

<!-- Input (Select) Fakultas -->
<div class="form-group">
    <label class="form-label" for="unit_id">Fakultas/Unit</label>
    {{ html()->select('unit_id')->options($units)->class(["form-control", "is-invalid" => $errors->has('unit_id')])->id('unit_id')}}
    @error('unit_id')
    <div class="invalid-feedback">{{ $errors->first('unit_id') }}</div>
    @enderror
</div>

<!-- Text Field Input for Insentif -->
<div class="form-group">
    <label class="form-label" for="insentif">Jumlah Insentif (Rp)</label>
    {{ html()->text('insentif')->class(["form-control", "is-invalid" => $errors->has('insentif')])->id('insentif')->placeholder('Rp. ') }}
    @error('insentif')
    <div class="invalid-feedback">{{ $errors->first('insentif') }}</div>
    @enderror
</div>

<!-- Text Field Input for Jumlah Reviewer-->
<div class="form-group">
    <label class="form-label" for="jumlah_reviewer">Jumlah Reviewer</label>
    {{ html()->text('jumlah_reviewer')->class(["form-control", "is-invalid" => $errors->has('jumlah_reviewer')])->id('jumlah_reviewer') }}
    @error('biaya_minimal')
    <div class="invalid-feedback">{{ $errors->first('biaya_minimal') }}</div>
    @enderror
</div>

