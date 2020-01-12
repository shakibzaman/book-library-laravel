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
        $chapters=Chapter::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        return view('admin.rules.create',compact('chapters'));

    }


    public function store(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $image=$request->file('image');
        $rules=new Rule();
        if($image!=""){
            $rules->name=$request->name;
            $rules->chap_id=$request->chap_id;
            $rules->image=$request->image->store('public/image');
            $rules->description=$request->description;
            $rules->save();
            return redirect()->route('admin.rules.index');
        }

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
        $rule=Rule::find($id);
        $chapters=Chapter::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        return view('admin.rules.edit',compact('rule','chapters'));
    }


    public function update(Request $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $old_image=$request->old_image;
        $image=$request->file('image');
        $rules=Rule::find($id);
        if($image!=""){
            $rules->name=$request->name;
            $rules->chap_id=$request->chap_id;
            $rules->image=$request->image->store('public/image');
            $rules->description=$request->description;
            $rules->save();
            return redirect()->route('admin.rules.index');
        }
        else{
            $rules->name=$request->name;
            $rules->chap_id=$request->chap_id;
            $rules->image=$old_image;
            $rules->description=$request->description;
            $rules->save();
            return redirect()->route('admin.rules.index');
        }

    }

    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $rule=Rule::find($id);
        $rule->delete();
        return redirect()->route('admin.rules.index');
    }
}
