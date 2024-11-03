<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Categorie::all()->toArray();
       $categories= DB::table('categories')->orderBy('id','desc')->paginate(5);
       return view('categories.index', ['categories' => $categories]);

      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => ['required', 'unique:categories', 'string', 'max:255'],
        ]);
        Categorie::create($request->all());
        return redirect()->route('categories.index')->with('success', 'La categorie est créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nombreDeCategories = Categorie::countCategories();
        return view('categorie.show', compact('nombreDeCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = Categorie::where('id', $id)->first();
        return view('categorie.edit', compact('categorie'));
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
        $categorie = Categorie::where('id', $id);
        //dd($categorie);
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Categorie supprimée');
    }
}
