<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Chapter;
use App\Http\Controllers\Controller;
use App\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RulesController extends Controller
{

    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $rules=Rule::all();
        return view('admin.rules.index',compact('rules'));
    }


    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $books=Book::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        $chapters=Chapter::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        return view('admin.rules.create',compact('books','chapters'));

    }


    public function store(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        return $request->name;
        $rules=new Rule();
        $rules->name=$request->name;
        $rules->book_id=$request->book_id;
        $rules->chap_id=$request->chap_id;
        if($request->hasFile('image')){
            $rules->image=$request->image->store('public/image');
        }
        $rules->description=$request->description;
        $rules->save();
        return redirect()->route('admin.rules.index');

    }


    public function show($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $rule=Rule::find($id);
        return view('admin.rules.show',compact('rule'));
    }


    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
    }


    public function update(Request $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
    }

    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
    }
}
