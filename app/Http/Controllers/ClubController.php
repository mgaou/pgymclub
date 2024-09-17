<?php

namespace App\Http\Controllers;

use App\Http\Requests\Club\StoreRequest;
use App\Http\Requests\Club\UpdateRequest;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $c=$request->input('c');
        $clubs = Club::search($c)->paginate(5);
        return view('club.index',compact('c'))->with(['cl' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('club.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new Club);
        $request->session()->flash('success','Votre club a été enregistré avec succès.');
        return redirect()->route('club.index');
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
       $club=Club::findOrFail($id);
        return view('club.edit',compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $club=Club::findOrFail($id);
        $this->process($club);
        $request->session()->flash('success','Votre club a été modifié avec succès.');
        return redirect()->route('club.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function process(Club $club){
        $request=request();
        $name=$request->input('name');
        $leader=$request->input('leader');
        $club->name=$name;
        $club->leader=$leader;
        $club->save();
    }
}
