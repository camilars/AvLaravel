<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=\App\Group::all();
        return view('index_groups',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_groups');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group= new \App\Group;
        $group->name=$request->get('name');
        $group->sigla=$request->get('sigla');
        $group->number=$request->get('number');
        $group->endereco=$request->get('endereco');
        $group->save();        
        return redirect('groups')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group= \App\Group::find($id);
        return view('edit_groups',compact('group','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group= \App\Group::find($id);
        $group->name=$request->get('name');
        $group->sigla=$request->get('sigla');
        $group->number=$request->get('number');
        $group->endereco=$request->get('endereco');
        $group->save();
        return redirect('groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group= \App\Group::find($id);
        $group->delete();
        return redirect('groups')->with('success','Information has been  deleted');
    }
}
