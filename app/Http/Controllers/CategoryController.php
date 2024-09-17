<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $t=$request->input('t');
        $categories = Category::search($t)->paginate(5);
        return view('category.index',compact('t'))->with(['c' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $this->process(new Category());
        $request->session()->flash('success','Votre catégorie a été enregistré avec succès.');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category=Category::findOrFail($id);
        return view('category.edit',compact('category'));
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
    private function process(Category $category){
        $request=request();
        $name=$request->input('name');
        $category->name=$name;
        $created_by=$request->input('created_by');
        $category->created_by=$created_by;
        //test de doublon avant d'enregistrer
        $category->save();
    }
}
