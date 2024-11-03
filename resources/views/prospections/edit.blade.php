@extends('layout')
@section('title')

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Modifier une Prospection</p>
              <a class="btn btn-primary btn-sm ms-auto" href="{{ route('prospections.index') }}">Retour</a>
            </div>
          </div>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" action="{{ route('prospections.update', $prospection->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="titre" class="form-control-label">Titre</label>
                    <input class="form-control" type="text" name="titre" id="titre" value="{{ $prospection->titre }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="prospect_id" class="form-control-label">Prospect</label>
                    <select class="form-select" name="prospect_id" id="prospect_id" type="number" aria-label="Default select example">
                      <option selected disabled>Choisissez un prospect</option>
                          @foreach ($prospects as $prospect)
                           <option value="{{ $prospect->id }}" {{ $prospection->prospect_id == $prospect->id ? 'selected' : '' }}>{{ $prospect->nom }}</option>
                          @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea class="form-control" rows="2" name="description" id="description">{{ $prospection->description }}</textarea>
                  </div>
                
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date" class="form-control-label">Date d'enregistrement</label>
                    <input class="form-control" type="date" name="date" id="date" value="{{ $prospection->date }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="isActive" class="form-label">Statut</label>
                    <div class="form-check">
                        <!-- Champ caché pour envoyer la valeur 0 quand la case est décochée -->
                        <input type="hidden" name="is_active" value="0">
                        
                        <input class="form-check-input" type="checkbox" id="isActive" name="is_active" value="1" {{ old('is_active', $prospection->is_active ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">
                            Etat de vente
                        </label>
                    </div>
                </div>
                
                </div>
                </div>
               
                <hr class="horizontal dark">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success btn-sm">Mettre à jour</button>
                </div>
          </form>
        </div>
      </div>
  </div>
@endsection
@section('content')
@endsection
