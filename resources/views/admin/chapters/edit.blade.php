@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.chapters.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.chapters.update", [$chapter->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.chapters.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($chapter) ? $chapter->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.chapters.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('expense_category_id') ? 'has-error' : '' }}">
                    <label for="book_category">{{ trans('cruds.expense.fields.expense_category') }}</label>
                    <select name="book_id" id="book_category" class="form-control select2">
                        @foreach($books as $id => $book)
                            <option value="{{ $id }}" {{ (isset($book_id) && $book_id->book_id ? $book->book->id : old('book_id')) == $id ? 'selected' : '' }}>{{ $book }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('expense_category_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('expense_category_id') }}
                        </em>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('book_id') ? 'has-error' : '' }}">
                    <label for="book_name">{{ trans('cruds.books.title_singular') }}</label>
                    <select name="book_id" id="book_name" class="form-control select2">
                        @foreach($books as $id => $book)
                            <option value="{{ $id }}" {{ old('name', isset($book->book_id) ? $book->book_id->name : '') }}>{{ $book }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('book_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('book_id') }}
                        </em>
                    @endif
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection