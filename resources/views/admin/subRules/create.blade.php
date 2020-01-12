@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.sub_rules.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.sub-rules.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-gro up {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.sub_rules.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.permission.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.rules.title_singular') }}*</label>
                    <select name="rule_id" id="rule_id" class="form-control select2">
                        @foreach($rules as $id => $rule)
                            <option value="{{ $id }}" >{{ $rule }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.permission.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image File</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.sub_rules.fields.desc') }}*</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.permission.fields.title_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection