<?php

namespace App\Http\Controllers;

use App\Http\Requests\Presence\StoreRequest;
use App\Http\Requests\Presence\UpdateRequest;
use App\Models\Member;
use App\Models\Presence;
use Egulias\EmailValidator\Result\Reason\CRLFAtTheEnd;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($member_id)
    {
        //
        //$presences=Presence::with('member')->latest()->paginate(5);
       //
       $member=Member::findOrFail($member_id);
       $presences=$member->presences()->paginate(5);
       $this->active_member($member);
        return view('presence.index',compact('presences','member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($member_id)
    {
        //
        $member =Member::findOrFail($member_id);
         return view('presence.create',compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new Presence());
        $request->session()->flash('success','Votre présence a été enregistré avec succès.');
        return redirect()->route('member.presence.index',$request->member_id);
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
    public function edit($member_id, $id)
    {
        //
        $presence=Presence::with('member')->findOrFail($id);
        return view('presence.edit',compact('presence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,$member_id, $id)
    {
        //
        $presence=Presence::findOrFail($id);
        $this->process($presence);
        $request->session()->flash('success','Votre présence a été modifié avec succès.');
        return redirect()->route('member.presence.index',$member_id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $member_id, $id)
    {
        //
        $presence=Presence::findOrFail($id);
        $presence->delete();
        $request->session()->flash('success','Votre présence a été supprimé avec succès');
        return redirect()->route('member.presence.index',$member_id);
    }
    public function process(Presence $presence){
           $request= request();
           $member_id=$request->input('member_id');
           $presence->member_id=$member_id;
           $pdate=$request->input('pdate');
           $presence->pdate=$pdate;
           $pobserve=$request->input('pobserve');
           $presence->pobserve=$pobserve;
           $presence->save();
    }
    public function active_member($member){
         $member->active = $member->presences()->count() >= 3; 
        $member->save();     
    }
}
