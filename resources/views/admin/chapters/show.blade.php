@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.chapters.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.chapters.fields.id') }}
                        </th>
                        <td>
                            {{ $chapter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chapters.fields.name') }}
                        </th>
                        <td>
                            {{ $chapter->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.books.title_singular') }}
                        </th>
                        <td>
                            {{ $chapter->bookname->name }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <nav class="mb-3">
                <div class="nav nav-tabs">

                </div>
            </nav>
            <div class="tab-content">

            </div>
        </div>
    </div>
@endsection