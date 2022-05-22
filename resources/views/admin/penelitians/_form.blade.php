<div class="form-group">
    <label class="required" for="judul">{{ trans('cruds.penelitian.fields.judul') }}</label>
    {{ html()->hidden('judul')->id('judul') }}

    <div id="editor_judul">
        {!! old('judul', optional($penelitian ?? '')->judul) !!}
    </div>
    @if($errors->has('judul'))
        <div class="invalid-feedback">
            {{ $errors->first('judul') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.judul_helper') }}</span>
</div>

<div class="form-group">
    <label for="skema_id">{{ trans('cruds.penelitian.fields.skema') }}</label>
    {{ html()->select('skema_id', $skemas)->id('skema_id')->class(['form-control', 'select2', 'is-invalid' => $errors->has('skema')])->placeholder('Pilihan Skema Penelitian') }}

    @if($errors->has('skema_id'))
        <div class="invalid-feedback">
            {{ $errors->first('skema_id') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.skema_helper') }}</span>
</div>

<div class="form-group">
    <label for="tahun">Tahun Pengusulan</label>
    {{ html()->select('tahun', $tahuns)->id('tahun')->class(['form-control', 'is-invalid' => $errors->has('tahun')]) }}

    @if($errors->has('tahun'))
        <div class="invalid-feedback">
            {{ $errors->first('tahun') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="pengusul_id">Dosen Pengusul</label>
    {{ html()->select('pengusul_id', $dosens)->id('pengusul_id')->class(['form-control', 'select2', 'is-invalid' => $errors->has('pengusul_id')]) }}

    @if($errors->has('pengusul_id'))
        <div class="invalid-feedback">
            {{ $errors->first('pengusul_id') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="prodi_id">Program Studi</label>
    {{ html()->select('prodi_id', $prodis)->id('prodi_id')->class(['form-control', 'select2', 'is-invalid' => $errors->has('prodi_id')]) }}

    @if($errors->has('prodi_id'))
        <div class="invalid-feedback">
            {{ $errors->first('prodi_id') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label class="required" for="fokus_id">{{ trans('cruds.penelitian.fields.fokus') }}</label>
    {{ html()->select('fokus_id', $prnFokus)->id('fokus_id')->class(['form-control', 'is-invalid' => $errors->has('fokus_id')]) }}
    @if($errors->has('fokus_id'))
        <div class="invalid-feedback">
            {{ $errors->first('fokus_id') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label>{{ trans('cruds.penelitian.fields.multi_tahun') }}</label>
    {{ html()->select('multi_tahun', App\Penelitian::MULTI_TAHUN_SELECT)->id('multi_tahun')->class(['form-control', 'select2', 'is-invalid' => $errors->has('multi_tahun')])  }}
    @if($errors->has('multi_tahun'))
        <div class="invalid-feedback">
            {{ $errors->first('multi_tahun') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.multi_tahun_helper') }}</span>
</div>

<div class="form-group">
    <label for="biaya">{{ trans('cruds.penelitian.fields.biaya') }}</label>
    {{ html()->text('biaya')->id('biaya')->class(['form-control', 'is-invalid' => $errors->has('biaya') ]) }}
    @if($errors->has('biaya'))
        <div class="invalid-feedback">
            {{ $errors->first('biaya') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.biaya_helper') }}</span>
</div>

<div class="form-group">
    <label class="required" for="ringkasan_eksekutif">Ringkasan Eksekutif</label>
    {{ html()->hidden('ringkasan_eksekutif')->id('ringkasan_eksekutif') }}

    <div id="editor_eksekutif">
        {!! old('ringkasan_eksekutif', optional($penelitian ?? '')->ringkasan_eksekutif) !!}
    </div>

    @if($errors->has('ringkasan_eksekutif'))
        <div class="invalid-feedback">
            {{ $errors->first('ringkasan_eksekutif') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.judul_helper') }}</span>
</div>

<div class="form-group">
    <label for="file_pengesahan">Lembaran Pengesahan</label>
    {{ html()->input('file', 'file_pengesahan')->id('file_pengesahan')->class('form-control')->attribute('aria-describedBy', 'file_pengesahan_help') }}
    <small id="file_pengesahan_help" class="form-text text-muted">Maksimal ukuran file : 5 MB</small>
    @if($errors->has('file_pengesahan'))
        <div class="invalid-feedback">
            {{ $errors->first('file_pengesahan') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.file_proposal_helper') }}</span>
    @if(isset($penelitian) && !empty($penelitian->file_pengesahan))
        <a href="{{ $penelitian->getFilePengesahanUrl() ?? '' }}" target="_blank">
            <i class="fa fa-file-pdf text-danger"></i>
            Download
        </a>
    @endif
</div>

<div class="form-group">
    <label for="file_proposal">File Proposal</label>
    {{ html()->input('file', 'file_proposal')->id('file_proposal')->class('form-control')->attribute('aria-describedBy', 'file_proposal_help') }}
    <small id="file_proposal_help" class="form-text text-muted">Maksimal ukuran file : 10 MB</small>
    @if($errors->has('file_proposal'))
        <div class="invalid-feedback">
            {{ $errors->first('file_proposal') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.file_proposal_helper') }}</span>
    @if(isset($penelitian) && !empty($penelitian->file_proposal))
        <a href="{{ $penelitian->getFileProposalUrl() ?? '' }}" target="_blank">
            <i class="fa fa-file-pdf text-danger"></i>
            Download
        </a>
    @endif
</div>

<div class="form-group">
    <label for="file_cv">File CV</label>
    {{ html()->input('file', 'file_cv')->id('file_cv')->class('form-control')->attribute('aria-describedBy', 'file_cv_help') }}
    <small id="file_cv_help" class="form-text text-muted">Maksimal ukuran file : 5 MB</small>
    @if($errors->has('file_proposal'))
        <div class="invalid-feedback">
            {{ $errors->first('file_cv') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.penelitian.fields.file_proposal_helper') }}</span>
    @if(isset($penelitian) && !empty($penelitian->file_cv))
        <a href="{{ $penelitian->getFileCvUrl() ?? ''->getFileCvUrl() }}" target="_blank">
            <i class="fa fa-file-pdf text-danger"></i>
            Download
        </a>
    @endif
</div>

<div class="form-group">
    <label>Status Usulan</label>
    {{ html()->select('status_usulan', $status_usulans, ($usulan ? $usulan->status_usulan : "") )->id('status_usulan')->class(['form-control', 'is-invalid' => $errors->has('status_usulan')])  }}
    @if($errors->has('status_usulan'))
        <div class="invalid-feedback">
            {{ $errors->first('status_usulan') }}
        </div>
    @endif
</div>


@section('scripts')
    <script>
        $(document).ready(function () {
            var quill = new Quill('#editor_judul', {
                theme: 'snow',   // Specify theme in configuration
                modules: {
                    toolbar: ['bold', 'italic', 'underline']
                }
            });

            var editor = document.getElementById('editor_judul').getElementsByClassName('ql-editor')[0];
            var inputJudul = document.getElementById("judul");
            var text = "";

            quill.on('text-change', function () {
                text = editor.innerHTML;
                // console.log(text);
                inputJudul.value = text;
            })

            var quill_eksekutif = new Quill('#editor_eksekutif', {
                theme: 'snow',   // Specify theme in configuration
                modules: {
                    toolbar: ['bold', 'italic', 'underline']
                }
            });

            var editor_eksekutif = document.getElementById('editor_eksekutif').getElementsByClassName('ql-editor')
            var input_eksekutif = document.getElementById('ringkasan_eksekutif')
            var text_eksekutif = "";

            quill_eksekutif.on('text-change', function (){
                text_eksekutif = editor_eksekutif.innerHTML;
                input_eksekutif.value = text_eksekutif;
            })
        });
    </script>
@endsection
