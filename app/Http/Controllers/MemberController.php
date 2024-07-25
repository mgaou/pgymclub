<?php

namespace App\Http\Controllers;

use App\Exports\MemberProfessionExport;
use App\Exports\MembersExport;
use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //where('active', 1)->
        $members = Member::with('category')->latest()->paginate(5);
       return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view('member.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new Member);
        $request->session()->flash('success','Votre membre a été enregistré avec succès.');
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
        $categories=Category::all();
        $member=Member::with('category')->findOrFail($id);
        return view('member.edit',compact('member','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $member=Member::findOrFail($id);
        $this->process($member);
        $request->session()->flash('success','Votre modification sur ce membre a été enregistré avec succès.');
        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    private function process(Member $member){
        $request=request();
        $firstname=$request->input('firstname');
        $member->firstname=$firstname;
         $lastname=$request->input('lastname');
        $member->lastname=$lastname;
        $adress=$request->input('adress');
        $member->adress=$adress;
        $phone=$request->input('phone');
        $member->phone=$phone;
        $gender=$request->input('gender');
        $member->gender=$gender;
        $born_at=$request->input('born_at');
        $member->born_at=$born_at;
        $palceofbirth=$request->input('placeofbirth');
        $member->placeofbirth=$palceofbirth;
        $member->active='0';
        $banned_at=$request->input('banned_at');
        $member->banned_at=$banned_at;
        $member->created_by=$request->user()->name;
        $member->updated_by=$request->user()->name;
        $picture_path=$request->input('picture_path');
        $member->picture_path=$picture_path;
        $birth_path=$request->input('birth_path');
        $member->birth_path=$birth_path;
        $category_id=$request->input('category_id');
        $member->category_id=$category_id;
        $member->save();

    }

    public function export() 
    {
        //return Excel::download(new MembersExport, 'members.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new MemberProfessionExport, 'memberProfessions.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
