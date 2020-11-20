<div class="form-group">
    {{ html()->hidden('skema_id')->value($refSkema->id) }}
    <label class="required" for="output_id">{{ trans('cruds.outputSkema.fields.output') }}</label>
    {{ html()->select('output_id')->options($outputs)->class(["form-control", "is-invalid" => $errors->has('output')])->id('output')->placeholder('') }}
    @if($errors->has('output_id'))
        <div class="invalid-feedback">
            {{ $errors->first('output_id') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.outputSkema.fields.output_helper') }}</span>
</div>
<div class="form-group">
    <label class="required" for="field">Kode</label>
    {{ html()->text('field')->class(["form-control", "is-invalid" => $errors->has('field')])->id('field')->placeholder('Kode output Ex: J01 untuk Jurnal Internasional Q1') }}
    @if($errors->has('field'))
        <div class="invalid-feedback">
            {{ $errors->first('field') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.outputSkema.fields.field_helper') }}</span>
</div>
<div class="form-group">
    <label for="mime">{{ trans('cruds.outputSkema.fields.mime') }}</label>
    {{ html()->text('mime')->class(["form-control", "is-invalid" => $errors->has('mime')])->id('mime')->placeholder('Tipe file dipisahkan dengan koma: Ex: pdf,docx') }}
    @if($errors->has('mime'))
        <div class="invalid-feedback">
            {{ $errors->first('mime') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.outputSkema.fields.mime_helper') }}</span>
</div>
<div class="form-group">
    <div class="form-check {{ $errors->has('required') ? 'is-invalid' : '' }}">
        {{ html()->checkbox('required') }}
    </div>
    @if($errors->has('required'))
        <div class="invalid-feedback">
            {{ $errors->first('required') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.outputSkema.fields.required_helper') }}</span>
</div>

<div class="form-group">
    <button class="btn btn-danger" type="submit">
        {{ trans('global.save') }}
    </button>
</div>
