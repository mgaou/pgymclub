<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributionType\StoreRequest;
use App\Http\Requests\ContributionType\UpdateRequest;
use App\Models\ContributionType;
use Illuminate\Http\Request;

class ContributionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contributiontype=ContributionType::paginate(5);
        return view('contributiontype.index')->with(['ct'=>$contributiontype]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contributiontype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new ContributionType());
        $request->session()->flash('success','Votre type de cotisation a été enregistr& avec succès.');
        return redirect()->route('contributiontype.index');
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
        return view('contributiontype.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $contributionType=ContributionType::findOrFail($id);
        $this->process($contributionType);
        $request->session()->flash('success','Votre type de cotisation a été enregistr& avec succès.');
        return redirect()->route('contributiontype.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function process(ContributionType $contributionType){
        $request=request();
        $name=$request->input('name');
        $start_at=$request->input('start_at');
        $end_at=$request->input('end_at');
        $taux=$request->input('taux');
        $echeance=$request->input('echeance');
        $contributionType->name=$name;
        $contributionType->start_at=$start_at;
        $contributionType->end_at=$end_at;
        $contributionType->taux=$taux;
        $contributionType->echeance=$echeance;
        $contributionType->save();
    }
}
