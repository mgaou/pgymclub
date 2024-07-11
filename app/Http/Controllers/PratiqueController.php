<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pratique\StoreRequest;
use App\Models\Member;
use App\Models\Profession;
use Illuminate\Http\Request;

class PratiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($member_id)
    {
        //
        $member=Member::findOrFail($member_id);
        $professions=Profession::all();
        return view('pratique.create',compact('member','professions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $member_id=$request->input('member_id');
        $profession_id=$request->input('profession_id');
        $start_at=$request->input('start_at');
        $created_by=$request->user()->name;
        $member=Member::findOrFail($member_id);
        $member->professions()->attach($profession_id,['start_at'=>$start_at,'created_by'=>$created_by]);
        $request->session()->flash('success','Votre profession a été enregistré avec succès.');
        return redirect()->route('member.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
