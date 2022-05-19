<div class="form-group row">
    <div class="col-sm-2">
        <strong>Judul</strong>
    </div>
    <div class="col-sm-10">
        {!! $jurnal->judul !!}
        <br>
        <small><em><a href="{{ $jurnal->doi }}" class="btn btn-link">{{ $jurnal->doi }}</a> </em></small>
    </div>
</div>



<div class="form-group row">
    <div class="col-sm-2">
        <strong>Abstrak</strong>
    </div>
    <div class="col-sm-10">
        {{ $jurnal->abstract }}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <strong>Skema Usulan</strong>
    </div>
    <div class="col-sm-10">
        {{ $jurnal->skema->nama }}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <strong>Vol / No</strong>
    </div>
    <div class="col-sm-10">
        {{ $jurnal->volume }} / {{ $jurnal->nomor }}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <strong>Halaman</strong>
    </div>
    <div class="col-sm-10">
        {{ $jurnal->hal_awal }} - {{ $jurnal->hal_akhir }}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <strong>Artikel</strong>
    </div>
    <div class="col-sm-10">
        <a href="{{ $jurnal->link }}" class="btn btn-link">Open </a>
    </div>
</div>

<hr>

<div class="form-group row">
    <div class="col-sm-2">
        <strong>Nama Jurnal</strong>
    </div>
    <div class="col-sm-10">
        {{ $jurnal->nama_jurnal }}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <strong>ISSN</strong>
    </div>
    <div class="col-sm-10">
        {{ $jurnal->issn }}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <strong>Cakupan Bidang</strong>
    </div>
    <div class="col-sm-10">
        {{ $jurnal->cakupan_bidang }}
    </div>
</div>
