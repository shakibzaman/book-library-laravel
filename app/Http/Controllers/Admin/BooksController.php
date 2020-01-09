<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BooksController extends Controller
{
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $books=Book::all();
        return view('admin.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $books=Book::create($request->all());
        return redirect()->route('admin.books.index');
    }

    public function show($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $book=Book::find($id);
        return view('admin.books.show',compact('book'));
    }

    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $book=Book::find($id);
        return view('admin.books.edit',compact('book'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $book=Book::find($id);
        $book->name=$request->name;
        $book->save();
        return redirect()->route('admin.books.index');
    }

    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $book=Book::find($id);
        $book->delete();
        return redirect()->route('admin.books.index');

    }
}
