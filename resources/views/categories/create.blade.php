@extends('layout')
@section('title')

    <div class="container-fluid" style="width: 100% !important">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-3">Enregistrer une Prospection ______________________________________________________</p>
              <a class="btn btn-primary btn-sm ms-auto" href="{{ route('categories.index') }}">Retour</a>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" action="{{route('categories.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Titre</label>
                            <input class="form-control" type="text" name="nom" id="titre">
                          </div>
                       
                      <hr class="horizontal dark">
                      <div class="d-flex justify-content-center">
                          <button class="btn btn-success btn-sm">Enregistrer</button>
                      </div>
        
                </form>
            </div>

            <br><br><br><br><br><br><br>
  
          </div>
        </div>
      </div>
    </div>
</div>
</form>
@endsection
@section('content')