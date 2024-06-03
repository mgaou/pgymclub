<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cotisation\StoreRequest;
use App\Http\Requests\Cotisation\UpdateRequest;
use App\Models\ContributionType;
use App\Models\Member;
use Illuminate\Http\Request;

class CotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $member = Member::findOrFail($id);
       $cotisations = $member->contribution_types()->paginate();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $contribution_types=ContributionType::all();
        $members=Member::all();
        return view('cotisation.create',compact('members', 'contribution_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $contribution_type_id=$request->input('contribution_type_id');
        $member_id=$request->input('member_id');       
        $mounth=$request->input('mounth');
        $value=$request->input('value');
        $value_rest=$request->input('value_rest');
        $paid_at=$request->input('paid_at');
        $observe=$request->input('observe');
        $member=Member::findOrFail($member_id);
        $member->contribution_types()->attach($contribution_type_id,['mounth'=>$mounth,'value'=>$value,'value_rest'=>$value_rest,'paid_at'=>$paid_at,'observe'=>$observe]);
        $request->session()->flash('success','Votre cotisation a été enregistré avec succès.');
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
    public function update(UpdateRequest $request, string $id)
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
