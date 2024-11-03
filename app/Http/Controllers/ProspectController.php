<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProspectRequest;
use App\Http\Requests\UpdateProspectRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Prospection;
use App\Models\Prospect;
use App\Models\Devis;


class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prospects = DB::table('prospects')->orderBy('id', 'desc')->paginate(8);
        return view('prospects.index', ['prospects' => $prospects]);
    }


    public function adminIndex()
    {
        $prospects = DB::table('prospects')->orderBy('id', 'desc')->paginate(8);
        $prospectCount = Prospect::count();
        return view('home_admin', compact('prospects', 'prospectCount'));
    }


    public function create()
    {
        return view('prospects.create');
    }



    public function store(Request $request)
    { {
            $this->validate($request, [
                'nom' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string'],
                'email' => ['required', 'string'],
                'phone' => ['required', 'integer'],
                'activites_profession' => ['required', 'string'],
                'autres' => ['required', 'string'],
                'description' => ['required',  'string'],
            ]);


            Prospect::create($request->all());
            return redirect()->route('prospects.index')->with('success', 'Bimmmmmmmmmmmmmmmmmm');
        }
    }



    public function show($id)
    {
        // $prospect = Prospect::findOrFail($id);
        // return view('prospects.show', compact('prospect'));



        // Récupérer le prospect
        $prospect = Prospect::findOrFail($id);

        // Récupérer les prospections menées pour ce prospect
        $prospections = Prospection::where('prospect_id', $id)->get();

        $prospectionCount = Prospection::where('prospect_id', $id)->count();

        // Compter les prospections actives
        $activeProspectionCount = $prospect->Prospection()->where('is_active', true)->count();


        // Récupérer les devis envoyés à ce prospect
        $devis = Devis::where('prospect_id', $id)->get();

        // Compter le nombre de devis envoyés à ce prospect,
        $devisCount = Devis::where('prospect_id', $id)->count();

        // Retourner la vue avec les données
        return view('prospects.show', compact('prospect', 'prospections', 'prospectionCount', 'activeProspectionCount','devis', 'devisCount'));
    }



    public function edit(string $id)
    {
        $prospect = Prospect::where('id', $id)->first();
        return view('prospects.edit', compact('prospect'));
    }



    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'integer'],
            'activites_profession' => ['required', 'string'],
            'autres' => ['string'],
            'description' => ['string'],
        ]);
        $data = array(
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'phone' => $request->phone,
            'activites_profession' => $request->activites_profession,
            'autres' => $request->autres,
            'description' => $request->description
        );
        Prospect::where('id', $id)->update($data);

        return redirect()->route('prospects.index')->with('success', 'Prospect modifié avec succès!');
    }

    // public function clients()
    // {
    //     // Récupérer les prospects avec au moins deux prospections actives
    //     $prospects = Prospect::whereHas('prospections', function ($query) {
    //         $query->where('is_active', true);
    //     })
    //     ->withCount(['prospections as active_prospections_count' => function ($query) {
    //         $query->where('is_active', true);
    //     }])
    //     ->having('active_prospections_count', '>=', 2)
    //     ->get();

    //     return view('clients.index', ['prospects' => $prospects]);
    // }

    public function destroy(string $id)
    {
        $prospect = Prospect::where('id', $id);
        $prospect->delete();
        return redirect()->route('prospects.index')->with('success', 'Document supprimé');
    }
}
