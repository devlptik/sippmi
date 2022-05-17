
{{ html()->hidden('jurnal_skema_id')->value($skema->id) }}

<!-- Text Field Input for Judul Artikel -->
<div class="form-group">
    <label class="form-label" for="judul">Judul Artikel</label>
    {{ html()->text('judul')->class(["form-control", "is-invalid" => $errors->has('judul')])->id('judul') }}
    @error('judul')
    <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
    @enderror
</div>

<!-- Text Field Input for Abstrak -->
<div class="form-group">
    <label class="form-label" for="abstrak">Abstrak</label>
    {{ html()->textarea('abstrak')->class(["form-control", "is-invalid" => $errors->has('abstrak')])->id('abstrak') }}
    @error('abstrak')
    <div class="invalid-feedback">{{ $errors->first('abstrak') }}</div>
    @enderror
</div>

<!-- Text Field Input for Skema usulan -->
<div class="form-group">
    <label class="form-label">Skema Insentif</label>
    <div class="form-control">
        {{ $skema->nama }}
    </div>
</div>

<!-- Input (Select) Fakultas -->
<div class="form-group">
    <label class="form-label" for="jurnal_periode_id">Periode TeGrbit</label>
    {{ html()->select('jurnal_periode_id')->options($periodes)->class(["form-control", "is-invalid" => $errors->has('jurnal_periode_id')])->id('jurnal_periode_id')}}
    @error('jurnal_periode_id')
    <div class="invalid-feedback">{{ $errors->first('jurnal_periode_id') }}</div>
    @enderror
</div>

<!-- Text Field Input for  -->
<div class="form-group">
    <label class="form-label" for="link">Link</label>
    {{ html()->text('link')->class(["form-control", "is-invalid" => $errors->has('link')])->id('link') }}
    @error('link')
    <div class="invalid-feedback">{{ $errors->first('link') }}</div>
    @enderror
</div>

<!-- Text Field Input for  -->
<div class="form-group">
    <label class="form-label" for="file_artikel">File</label>
    {{ html()->file('file_artikel')->class(["form-control", "is-invalid" => $errors->has('file_artikel')])->id('file_artikel') }}
    @error('file_artikel')
    <div class="invalid-feedback">{{ $errors->first('file_artikel') }}</div>
    @enderror
</div>

<!-- Text Field Input for Nama Jurnal -->
<div class="form-group">
    <label class="form-label" for="nama_jurnal">Nama Jurnal</label>
    {{ html()->text('nama_jurnal')->class(["form-control", "is-invalid" => $errors->has('nama_jurnal')])->id('nama_jurnal') }}
    @error('nama_jurnal')
    <div class="invalid-feedback">{{ $errors->first('nama_jurnal') }}</div>
    @enderror
</div>

<!-- Text Field Input for Informasi Vol/no/Hal-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="volume">Volume</label>
            {{ html()->text('volume')->class(["form-control", "is-invalid" => $errors->has('volume')])->id('volume') }}
            @error('volume')
            <div class="invalid-feedback">{{ $errors->first('volume') }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="no">Nomor</label>
            {{ html()->text('no')->class(["form-control", "is-invalid" => $errors->has('no')])->id('no') }}
            @error('no')
            <div class="invalid-feedback">{{ $errors->first('no') }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="hal_awal">Halaman awal</label>
            {{ html()->text('hal_awal')->class(["form-control", "is-invalid" => $errors->has('hal_awal')])->id('hal_awal') }}
            @error('hal_awal')
            <div class="invalid-feedback">{{ $errors->first('hal_awal') }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label" for="hal_akhir">Halaman akhir</label>
            {{ html()->text('hal_akhir')->class(["form-control", "is-invalid" => $errors->has('hal_akhir')])->id('hal_akhir') }}
            @error('hal_akhir')
            <div class="invalid-feedback">{{ $errors->first('hal_akhir') }}</div>
            @enderror
        </div>
    </div>
</div>

<!-- Text Field Input for Tanggal Terbit -->
<div class="form-group">
    <label class="form-label" for="tgl_terbit">Tanggal Terbit Artikel</label>
    {{ html()->date('tgl_terbit')->class(["form-control", "is-invalid" => $errors->has('tgl_terbit')])->id('tgl_terbit') }}
    @error('tgl_terbit')
    <div class="invalid-feedback">{{ $errors->first('tgl_terbit') }}</div>
    @enderror
</div>

<!-- Text Field Input for ISSN -->
<div class="form-group">
    <label class="form-label" for="issn">ISSN</label>
    {{ html()->text('issn')->class(["form-control", "is-invalid" => $errors->has('issn')])->id('issn') }}
    @error('issn')
    <div class="invalid-feedback">{{ $errors->first('issn') }}</div>
    @enderror
</div>

<!-- Text Field Input for Cakupan Bidang -->
<div class="form-group">
    <label class="form-label" for="cakupan_bidang">Cakupan Bidang Ilmu Jurnal</label>
    {{ html()->text('cakupan_bidang')->class(["form-control", "is-invalid" => $errors->has('cakupan_bidang')])->id('cakupan_bidang') }}
    @error('cakupan_bidang')
    <div class="invalid-feedback">{{ $errors->first('cakupan_bidang') }}</div>
    @enderror
</div>

<!-- Text Field Input for Alamat -->
<div class="form-group">
    <label class="form-label" for="alamat">Alamat Jurnal</label>
    {{ html()->text('alamat')->class(["form-control", "is-invalid" => $errors->has('alamat')])->id('alamat') }}
    @error('alamat')
    <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <!-- Text Field Input for Impact Factor -->
        <div class="form-group">
            <label class="form-label" for="impact_factor">Impact Factor</label>
            {{ html()->text('impact_factor')->class(["form-control", "is-invalid" => $errors->has('impact_factor')])->id('impact_factor') }}
            @error('impact_factor')
            <div class="invalid-feedback">{{ $errors->first('impact_factor') }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <!-- Text Field Input for H-Index -->
        <div class="form-group">
            <label class="form-label" for="h_index">H-Index</label>
            {{ html()->text('h_index')->class(["form-control", "is-invalid" => $errors->has('h_index')])->id('h_index') }}
            @error('h_index')
            <div class="invalid-feedback">{{ $errors->first('h_index') }}</div>
            @enderror
        </div>
    </div>
</div>
