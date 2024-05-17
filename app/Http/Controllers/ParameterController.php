<?php

namespace App\Http\Controllers;

use App\Http\Requests\Parameter\StoreRequest;
use App\Http\Requests\Parameter\UpdateRequest;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $parameter=Parameter::paginate(5);
        return view('parameter.index')->with(['p'->$parameter]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('parameter.creat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new Parameter());
        $request->session()->flash('success','Votre paramètre a été enregistré avec succès');
        return view('parameter.index');
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
        return view('parameter.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $parameter=Parameter::findOrFail($id);
        $this->process($parameter);
        $request->session()->flash('success','Votre paramètre a été modifié avec succès');
        return view('parameter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function process(Parameter $parameter){
        $request=request();
        $code=$request->input('code');
        $text_value=$request->input('text_value');
        $number_value=$request->input('number_value');
        $logo_path=$request->input('logo_path');
        $parameter->code=$code;
        $parameter->text_value=$text_value;
        $parameter->number_value=$number_value;
        $parameter->logo_path=$logo_path;
        $parameter->created_by=$request->user()->name;
        $parameter->save();
    }
}
