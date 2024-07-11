<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cotisation\StoreRequest;
use App\Http\Requests\Cotisation\UpdateRequest;
use App\Models\ContributionType;
use App\Models\Cotisation;
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
        abort_unless($member->active, 401);//a moins que le membre soit actif sinon renvoie 401 non autorisé
        $cotisations = $member->cotisations()->paginate();
      // dd($cotisations);
       return view('cotisation.index',['id'=>$id])->with(['cts' =>  $cotisations,'member'=>$member]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($member_id)
    {
        //
        $contribution_types=ContributionType::all();
        $member=Member::findOrFail($member_id);
        return view('cotisation.create',compact('member', 'contribution_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->process(new Cotisation);
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
    public function edit($member_id,$cotisation_id)
    {
        //
        $cotisation = Cotisation::with('member','contribution_type')->findOrFail($cotisation_id);
        return view('cotisation.edit',compact('cotisation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $member_id,$cotisation_id)
    {
        //
        $cotisation=Cotisation::findOrFail($cotisation_id);
        $this->process($cotisation);
        $request->session()->flash('success','Votre cotisation a été modifié avec succès.');
        return redirect()->route('member.cotisation.index',[$cotisation->member_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function process(Cotisation $cotisation){
        $request=request();

        $contribution_type_id=$request->input('contribution_type_id');
        $member_id=$request->input('member_id');       
        $mounth=$request->input('mounth');
        $value=$request->input('value');
        $value_rest=$request->input('value_rest');
        $paid_at=$request->input('paid_at');
        $observe=$request->input('observe');
    
        $cotisation->member_id=$member_id;
        $cotisation->contribution_type_id=$contribution_type_id;
        $cotisation->mounth=$mounth;
        $cotisation->value=$value;
        $cotisation->value_rest=$value_rest;
        $cotisation->paid_at=$paid_at;
        $cotisation->observe=$observe;
       // $cotisation->created_by=$request->user()->name;
        $cotisation->save();
    }
}
