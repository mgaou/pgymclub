<?php

namespace App\Http\Controllers;

use App\Http\Requests\Adhesion\StoreRequest;
use App\Models\Club;
use App\Models\Division;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class AdhesionController extends Controller
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
        $clubs=Club::all();
        $divisions=Division::all();
        return view('adhesion.create',compact('member', 'clubs', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $member_id = $request->input('member_id');
        $division_id = $request->input('division_id');
        $club_id = $request->input('club_id');
        $start_at=$request->input('start_at');
        $observe=$request->input('observe');
        $created_by=$request->user()->name;
        //pointer sur le model afin d'avoir acces à la relation
        $member = Member::findOrFail(($member_id));
        $member->divisions()->attach($division_id, ['club_id' => $club_id,'start_at'=>$start_at,'observe'=>$observe,'created_by'=>$created_by]);
        $request->session()->flash('success','Votre adhésion a été enregistré avec succès.');
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
