<div class="form-group">
    <label for="title">{{ trans('cruds.permission.fields.title') }}</label>
    {!! html()->text('title')->id('title')->placeholder(trans('cruds.permission.fields.title_helper'))->class(['form-control',  'is-invalid' => $errors->has('title')]) !!}
    @if($errors->has('title'))
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
    @endif
</div>