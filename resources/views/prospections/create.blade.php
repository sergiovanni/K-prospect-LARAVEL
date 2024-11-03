@extends('layout')
@section('title')

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Enregistrer une Prospection</p>
                <a class="btn btn-primary btn-sm ms-auto" href="{{ route('prospections.index') }}">Retour</a>
          </div>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" action="{{route('prospections.store')}}" method="POST">
            {{csrf_field()}}
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Titre</label>
                    <input class="form-control" type="text" name="titre" id="nom">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Prospect</label>
                    <select class="form-select" name="prospect_id" id="prospect_id" type="number" aria-label="Default select example">
                      <option selected disabled>Choisissez un prospect</option>
                          @foreach ($prospects as $prospect)
                           <option value="{{ $prospect->id }}">{{ $prospect->nom }}</option>
                          @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <textarea class="form-control" rows="2" name="description" id="description"></textarea>
                  </div>
                
                </div>
              
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date d'enregistrement</label>
                    <input class="form-control" type="date" name="date" id="date">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="isActive" class="form-label">Statut</label>
                    <div class="form-check">
                        <!-- Champ caché pour envoyer la valeur 0 quand la case est décochée -->
                        <input type="hidden" name="is_active" value="0">
                        
                        <input class="form-check-input" type="checkbox" id="isActive" name="is_active" value="1" {{ old('is_active', false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">
                            Etat de vente
                        </label>
                    </div>
                </div>
                
                </div>
                </div>
                <hr class="horizontal dark">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success btn-sm">Enregistrer</button>
                </div>
          </form>
        </div>
      </div>
  </div>
@endsection
@section('content')

    {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Catégorie</label>
                    <select class="form-select" name="categories_id" id="categories_id" type="number" aria-label="Default select example">
                      <option selected disabled>Choisissez une catégorie</option>
                        <option value="01">Cours</option>
                        <option value="02">Recherches</option>
                        <option value="03">Exercices</option>
                    </select>
                  </div>
                </div> --}}

                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Document</label>
                      <input class="form-control" type="file" name="fichier" id="fichier">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date</label>
                      <input class="form-control" type="date" name="date" id="date">
                  </div>
                </div> --}}

                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Activités / Profession</label>
                    <input class="form-control" type="text" name="activites_profession" id="activites_profession">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Autres</label>
                    <input class="form-control" type="text" name="autres" id="autres">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                      <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                  </div>
                </div> --}}