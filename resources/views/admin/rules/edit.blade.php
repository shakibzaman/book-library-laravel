@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.rules.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.rules.update",[$rule->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.rules.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($rule) ? $rule->name : '') }}" required>
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
                    <label for="name">{{ trans('cruds.chapters.title_singular') }}*</label>
                    <select name="chap_id" id="chap_id" class="form-control select2">
                        @foreach($chapters as $id => $chapter)
                            <option value="{{ $id }}" >{{ $chapter }}</option>
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
                    <label for="newImage">Image File</label>
                    <input type="file" class="form-control-file" id="newImage" name="image">
                </div>
                <div class="form-group">
                    <label for="imageHidden"></label>
                    <input type="hidden" class="form-control-file" id="imageHidden" name="old_image" value="{{ old('name', isset($rule) ? $rule->image : '') }}">
                </div>
                <div class="image-holder m-4">
                    <img src="{{Storage::url($rule->image)}}" alt="" width="500" height="300">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.rules.fields.description') }}*</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ old('name', isset($rule) ? $rule->description : '') }}" required>
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

