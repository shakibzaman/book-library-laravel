<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Chapter;
use App\Http\Controllers\Controller;
use App\Rule;
use App\SubRule;
use Illuminate\Http\Request;

class SubRulesController extends Controller
{

    public function index()
    {
        $subrules=SubRule::all();
        return view('admin.subRules.index',compact('subrules'));
    }


    public function create()
    {
        $rules=Rule::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');
        return view('admin.subrules.create',compact('rules'));

    }

    public function store(Request $request)
    {
        $image=$request->file('image');
        $subrules=new SubRule();
        if($image!=""){
            $subrules->name=$request->name;
            $subrules->rule_id=$request->rule_id;
            $subrules->image=$request->image->store('public/image');
            $subrules->desc=$request->description;
            $subrules->save();
            return redirect()->route('admin.sub-rules.index');
        }
        else{
            $subrules->name=$request->name;
            $subrules->rule_id=$request->rule_id;
            $subrules->desc=$request->description;
            $subrules->save();
            return redirect()->route('admin.sub-rules.index');
        }
    }

    public function show($id)
    {
        $subrule=SubRule::find($id);
        //$subrule=SubRule::with('bookName','chapname','ruleName')->find($id);
//        return response()->json([
//            'subrule'=>$subrule
//        ],200);
        return view('admin.subRules.show',compact('subrule'));
    }

    public function edit($id)
    {
        $subrule=SubRule::find($id);
        $rules=Rule::all()->pluck('name','id')->prepend(trans('global.pleaseSelect'),'');

        return view('admin.subRules.edit',compact('subrule','rules'));
    }

    public function update(Request $request, $id)
    {
        $old_image=$request->old_image;
        $image=$request->file('image');
        $subrules=SubRule::find($id);
        if($image!=""){
            $subrules->name=$request->name;
            $subrules->rule_id=$request->rule_id;
            $subrules->image=$request->image->store('public/image');
            $subrules->desc=$request->description;
            $subrules->save();
            return redirect()->route('admin.sub-rules.index');
        }
        else{
            $subrules->name=$request->name;
            $subrules->rule_id=$request->rule_id;
            $subrules->image=$old_image;
            $subrules->desc=$request->description;
            $subrules->save();
            return redirect()->route('admin.sub-rules.index');
        }
    }

    public function destroy($id)
    {
        $subrule=SubRule::find($id);
        $subrule->delete();
        return redirect()->route('admin.sub-rules.index');
    }
}
