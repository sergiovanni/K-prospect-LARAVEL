<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all()->toArray();
        $documents = DB::table('documents')->orderBy('id','desc')->paginate(5);
        return view('documents.index', ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => ['required', 'unique:documents', 'string', 'max:255'],
            'auteur' => ['required', 'string'],
            'categorie_id' => [ 'integer'],
            'fichier' => ['file'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:1000'],

        ]);

        if($request->hasFile('fichier'))
        {
            $destination_path ='public/documents';
            $fichier = $request->file('fichier');
            $fichier_name = $fichier->getClientOriginalName();
            $path = $request -> file('fichier')->storeAs($destination_path,$fichier_name);

        }
        Document::create($request->all());
        return redirect()->route('documents.index')->with('success', 'Document créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $documents = DB::table('documents')->where('id',$id)->first();
        // $filePath = public_path("storage/documents{$documents->fichier}");      
        // return Response::download($filePath);

        $file = public_path('storage/documents/your-file-name.pdf');
        // $file = public_path('storage/documents/sergio.txt');

        return response()->download($file);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = Document::where('id', $id)->first();
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'titre' => ['required', 'unique:documents', 'string', 'max:255'],
            'auteur' => ['required', 'string'],
            'categorie_id' => [ 'integer'],
            'fichier' => [ 'file'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:1000']
        ]);
         $data = array(
                    'titre' => $request->titre
                );
            Document::where('id', $id)->update($data);
        
        return redirect()->route('documents.index')->with('success', 'Document modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::where('id', $id);
        //dd($categorie);
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document supprimé');
    }
}
