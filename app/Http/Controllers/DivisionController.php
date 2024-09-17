<?php

namespace App\Http\Controllers;

use App\Http\Requests\Division\StoreRequest;
use App\Http\Requests\Division\UpdateRequest;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $q=$request->input('q');
        $divisions=Division::search($q)->paginate(5);
        return view('division.index',compact('q'))->with(['d' => $divisions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new Division);
        $request->session()->flash('success','Votre division a été enregistré avec succès.');
        return redirect()->route('division.index');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       $division=Division::findOrFail($id);
       return view('division.edit',compact('division')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $division=Division::findOrFail($id);
        $this->process($division);
        $request->session()->flash('success','Votre division a été modifié avec succès.');
        return redirect()->route('division.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function process(Division $division){
        $request=request();
        $name=$request->input('name');
        $division->name=$name;
        $division->created_by=$request->user()->name;
        $division->save();
    }
}
