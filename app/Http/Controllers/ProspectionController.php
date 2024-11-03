<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProspectionRequest;
use App\Http\Requests\UpdateProspectionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Prospect;


use App\Models\Prospection;

class ProspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Prospection::query();

        // Ajoute la condition de recherche si un terme est fourni
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('prospect', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }
    
        // Récupère les prospections avec pagination
        $prospections = $query->paginate(10);
    
        return view('prospections.index', compact('prospections'));
        // $prospections = Prospection::all()->toArray();
        // $prospections = DB::table('prospections')->orderBy('id', 'desc')->paginate(5);
        // return view('prospections.index', ['prospections' => $prospections]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupère tous les prospects
        $prospects = Prospect::all();

        return view('prospections.create', compact('prospects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'prospect_id' => ['required', 'integer', 'exists:prospects,id'],
            'is_active' => 'boolean',
            'date' => ['required', 'date'],
        ]);
    
        // Récupère la valeur de 'is_active' avec un défaut à false si non présent
        $isActive = $request->input('is_active') == '1'; // Les cases à cocher envoient '1' lorsqu'elles sont cochées
    
        // Crée un nouvel enregistrement avec les champs validés
        Prospection::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'prospect_id' => $validated['prospect_id'],
            'is_active' => $isActive,
            'date' => $validated['date'],
        ]);
    
        // Redirige avec un message de succès
        return redirect()->route('prospections.index')->with('success', 'Enregistrement effectué avec succès.');
    }

    // public function store(Request $request)
    // {
    //     // Valide les données du formulaire
    //     $validated = $this->validate($request, [
    //         'titre' => ['required', 'string', 'max:255'],
    //         'description' => ['required', 'string', 'max:1000'],
    //         'prospect_id' => ['required', 'integer', 'exists:prospects,id'],
    //         'is_active' => 'boolean',
    //         'date' => ['required', 'date'],
    //     ]);
    
    //     // Récupère la valeur de 'is_active' avec un défaut à false si non présent
    //     $isActive = $request->input('is_active', false);
    
    //     // Crée un nouvel enregistrement avec les champs validés
    //     Prospection::create([
    //         'titre' => $validated['titre'],
    //         'description' => $validated['description'],
    //         'prospect_id' => $validated['prospect_id'],
    //         'is_active' => $isActive,
    //         'date' => $validated['date'],
    //     ]);
    
    //     // Redirige avec un message de succès
    //     return redirect()->route('prospections.index')->with('success', 'Enregistrement effectué avec succès.');
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prospection = Prospection::with('prospect')->findOrFail($id);
        return view('prospections.show', compact('prospection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $prospection = Prospection::findOrFail($id);
    $prospects = Prospect::all();
    return view('prospections.edit', compact('prospection', 'prospects'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'prospect_id' => ['required', 'integer', 'exists:prospects,id'],
            'is_active' => 'boolean',
            'date' => ['required', 'date'],
        ]);
    
        $prospection = Prospection::findOrFail($id);
    
        // Récupère la valeur de 'is_active' avec un défaut à false si non présent
        $isActive = $request->input('is_active') == '1'; // Les cases à cocher envoient '1' lorsqu'elles sont cochées
    
        // Met à jour l'enregistrement avec les champs validés
        $prospection->update([
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'prospect_id' => $validated['prospect_id'],
            'is_active' => $isActive,
            'date' => $validated['date'],
        ]);
    
        // Redirige avec un message de succès
        return redirect()->route('prospections.index')->with('success', 'Prospection modifiée avec succès!');
    }
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'titre' => ['required', 'string', 'max:255'],
    //         'prospect_id' => ['required', 'integer'],
    //         'description' => ['nullable', 'string'],
    //         'is_active' => ['boolean'],
    //         'date' => ['required', 'date'],
    //     ]);
    
    //     $prospection = Prospection::findOrFail($id);
    //     $prospection->update([
    //         'titre' => $request->titre,
    //         'prospect_id' => $request->prospect_id,
    //         'description' => $request->description,
    //         'is_active' => $request->has('is_active'),
    //         'date' => $request->date,
    //     ]);
    
    //     return redirect()->route('prospections.index')->with('success', 'Prospection modifiée avec succès!');
    
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prospection = Prospection::where('id', $id);
        //dd($categorie);
        $prospection->delete();
        return redirect()->route('prospections.index')->with('success', 'Prospection supprimé');
    }
}
