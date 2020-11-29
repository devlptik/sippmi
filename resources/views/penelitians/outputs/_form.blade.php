{{ html()->form('POST', route('output.store', [$penelitian->id]))->acceptsFiles()->open() }}

{{ html()->hidden('penelitian_id', $penelitian->id) }}
{{ html()->hidden('output_skema_id', $output_skema->id) }}

<div class="card mb-3">
    <div class="card-header">
        <strong>Luaran Penelitian</strong>
    </div>

    <div class="card-body">

        <div class="form-group">
            <label for="filename">
                <strong>Nama Luaran</strong>
            </label>
            <input type="text" readonly class="form-control-plaintext" value="{{ $output_skema->output->luaran }}">
        </div>

        <div class="form-group">
            <label for="filename">
                <strong>File Luaran</strong>
            </label>
            {{ html()->input('file', 'filename')->id('filename')->class('form-control') }}
            <small id="filename_help" class="form-text text-muted">Maksimal ukuran file : 5 MB</small>
            @if($errors->has('filename'))
                <div class="invalid-feedback">
                    {{ $errors->first('filename') }}
                </div>
            @endif
        </div>

    </div>

    <div class="card-footer">
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </div>
</div>

{{ html()->form()->close() }}
