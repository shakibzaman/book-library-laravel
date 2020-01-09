<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Chapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChaptersController extends Controller
{

    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $chapters=Chapter::with('bookName')->get();
        return view('admin.chapters.index',compact('chapters'));
    }

    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $books=Book::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        return view('admin.chapters.create',compact('books'));
    }

    public function store(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $chapters=Chapter::create($request->all());
        return redirect()->route('admin.chapters.index');
    }

    public function show($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $chapter=Chapter::find($id);
        return view('admin.chapters.show',compact('chapter'));

    }

    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $chapter=Chapter::find($id);
        $books=Book::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        return view('admin.chapters.edit',compact('chapter','books'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $chapter=Chapter::find($id);
        $chapter->name=$request->name;
        $chapter->book_id=$request->book_id;
        $chapter->save();
        return redirect()->route('admin.chapters.index');

    }

    public function destroy($id)
    {

    }
}
