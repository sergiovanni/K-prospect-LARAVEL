@extends('layout')
@section('title')

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Modifier un Prospect</p>
              <a class="btn btn-primary btn-sm ms-auto" href="{{ route('prospects.index') }}">Retour</a>
            </div>
          </div>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" action="{{ route('prospects.update', $prospect->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nom</label>
                    <input class="form-control" type="text" name="nom" id="nom" value="{{ $prospect->nom }}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Adresse</label>
                    <input class="form-control" type="text" name="adresse" id="adresse" value="{{ $prospect->adresse }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ $prospect->email }}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Téléphone</label>
                    <input class="form-control" type="number" name="phone" id="phone" value="{{ $prospect->phone }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Activités / Profession</label>
                    <input class="form-control" type="text" name="activites_profession" id="activites_profession" value="{{ $prospect->activites_profession }}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Autres</label>
                    <input class="form-control" type="text" name="autres" id="autres" value="{{ $prospect->autres }}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                      <textarea class="form-control" rows="3" name="description" id="description">{{ $prospect->description }}</textarea>
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

