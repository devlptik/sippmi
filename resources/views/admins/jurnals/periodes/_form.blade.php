<!-- Text Field Input for Nama Skema -->

{{ html()->hidden('jurnal_skema_id')->value($skema->id) }}

<div class="form-group">
    <label class="form-label" for="nama">Nama Periode</label>
    {{ html()->text('nama')->class(["form-control", "is-invalid" => $errors->has('nama')])->id('nama')->placeholder('Contoh: 2022-1, 2022-2, dst') }}
    @error('nama')
    <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
    @enderror
</div>

<!-- Input (Select) Fakultas -->
<div class="form-group">
    <label class="form-label">Periode Terbit</label>
    <div class="row">
        <div class="col-md-6">
            {{ html()->date('periode_mulai')->class(["form-control", "is-invalid" => $errors->has('periode_mulai')])->id('periode_mulai') }}
            @error('periode_mulai')
            <div class="invalid-feedback">{{ $errors->first('periode_mulai') }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            {{ html()->date('periode_akhir')->class(["form-control", "is-invalid" => $errors->has('periode_akhir')])->id('periode_akhir') }}
            @error('periode_akhir')
            <div class="invalid-feedback">{{ $errors->first('periode_akhir') }}</div>
            @enderror
        </div>
    </div>
</div>

<!-- Text Field Periode Pengajuan -->
<div class="form-group">
    <label class="form-label">Periode Pengajuan</label>
    <div class="row">
        <div class="col-md-6">
            {{ html()->date('tgl_mulai_reg')->class(["form-control", "is-invalid" => $errors->has('tgl_mulai_reg')])->id('tgl_mulai_reg') }}
            @error('tgl_mulai_reg')
            <div class="invalid-feedback">{{ $errors->first('tgl_mulai_reg') }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            {{ html()->date('tgl_akhir_reg')->class(["form-control", "is-invalid" => $errors->has('tgl_akhir_reg')])->id('tgl_akhir_reg') }}
            @error('tgl_akhir_reg')
            <div class="invalid-feedback">{{ $errors->first('tgl_akhir_reg') }}</div>
            @enderror
        </div>
    </div>
</div>
