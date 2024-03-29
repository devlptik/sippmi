<div class="form-group">
    <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
    {!! html()->text('title')->id('title')->placeholder(trans('cruds.role.fields.title_helper'))->class(['form-control',  'is-invalid' => $errors->has('title')]) !!}
    @if($errors->has('title'))
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
    @endif
</div>
<div class="form-group">
    <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
    <div style="padding-bottom: 4px">
        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
    </div>
    <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
        @foreach($permissions as $id => $permissions)
            <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
        @endforeach
    </select>
    @if($errors->has('permissions'))
        <div class="invalid-feedback">
            {{ $errors->first('permissions') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
</div>