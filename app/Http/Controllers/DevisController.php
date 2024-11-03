<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;
use App\Models\Prospect;
use Illuminate\Support\Facades\Mail;
use App\Mail\DevisCreated;
use App\Mail\DevisMail;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $devis = Devis::all();
        return view('devis.index', compact('devis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prospects = Prospect::all();
        return view('devis.create', compact('prospects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'prospect_id' => ['required', 'exists:prospects,id'],
            'file_path' => ['required',]
        ]);

        // Stocker le fichier PDF
        $filePath = $request->file('file_path')->store('devis', 'public');

        // Créer un nouvel enregistrement de devis
        $devis = Devis::create([
            'titre' => $request->input('titre'),
            'prospect_id' => $request->input('prospect_id'),
            'file_path' => $filePath,
        ]);

        // Envoyer un email avec le devis
        $prospect = Prospect::find($request->input('prospect_id'));

        Mail::to($prospect->email)->send(new DevisMail($filePath));
        return redirect()->route('devis.index')->with('success', 'Devis importé et envoyé avec succès.');
    }
    // protected function sendDevisByEmail($devis, $prospect)
    // {
    //     $data = [
    //         'titre' => $devis->titre,
    //         'prospect_name' => $prospect->nom,
    //         'message' => 'Veuillez trouver ci-joint le devis demandé.',
    //     ];

    //     Mail::send('emails.devis', $data, function($message) use ($devis, $prospect) {
    //         $message->to($prospect->email, $prospect->nom)
    //                 ->subject('Votre Devis')
    //                 ->attach(storage_path('app/public/' . $devis->file_path));
    //     });
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $devis = Devis::findOrFail($id);
        return view('devis.show', compact('devis'));
    }

    public function edit($id)
    {
        $devis = Devis::findOrFail($id);
        return view('devis.edit', compact('devis'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'montant' => 'required|numeric',
            'prospect_id' => 'required|exists:prospects,id',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $devis = Devis::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('devis', 'public');
            $devis->file_path = $filePath;
        }

        $devis->update($request->only(['titre', 'description', 'montant', 'prospect_id']));

        return redirect()->route('devis.index')->with('success', 'Devis mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $devis = Devis::findOrFail($id);
        $devis->delete();

        return redirect()->route('devis.index')->with('success', 'Devis supprimé avec succès.');
    }
}
