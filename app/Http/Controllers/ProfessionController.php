<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profession\StoreRequest;
use App\Http\Requests\Profession\UpdateRequest;
use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profession=Profession::paginate(5);
        return view('profession.index')->with(['p'=>$profession]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('profession.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new Profession());
        $request->session()->flash('success','Votre profession a été modifié avec succès.');
        return redirect()->route('profession.index');
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
        $profession=Profession::findOrFail($id);
        return view('profession.edit',compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $profession=Profession::findOrFail($id);
        $this->process($profession);
        $request->session()->flash('success','Votre profession a été modifié avec succès.');
        return redirect()->route('profession.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function process(Profession $profession){
        $request=request();
        $name=$request->input('name');
        $profession->name=$name;
        $profession->save();
    }
}
