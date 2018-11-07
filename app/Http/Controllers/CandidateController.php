<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates=\App\Candidate::all();
        return view('index_candidate',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_candidate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $candidate= new \App\Candidate;
        $candidate->nomeCompleto=$request->get('nomeCompleto');
        $candidate->nomeFantasia=$request->get('nomeFantasia');
        $candidate->numeroCandidato=$request->get('numeroCandidato');
        $candidate->endereco=$request->get('endereco');
        $candidate->fk_groups=$request->get('fk_groups');
        $candidate->votos=$request->get('votos');
        $candidate->filename=$name;
        $candidate->save();
        
        return redirect('candidates')->with('success', 'Information has been added');
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
        $candidate = \App\Candidate::find($id);
        return view('edit_candidate',compact('candidate','id'));
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
        $candidate= \App\Candidate::find($id);
        $candidate->nomeCompleto=$request->get('nomeCompleto');
        $candidate->nomeFantasia=$request->get('nomeFantasia');
        $candidate->numeroCandidato=$request->get('numeroCandidato');
        $candidate->endereco=$request->get('endereco');
        $candidate->save();
        return redirect('candidates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = \App\Candidate::find($id);
        $group->delete();
        return redirect('candidates')->with('success','Information has been  deleted');
    }

    public function votar(Request $request, $id)
    {
        $candidate= \App\Candidate::find($id);
        $candidate->votos=$request->get('votos');
        $candidate->save();
        return redirect('candidates');
    }
}