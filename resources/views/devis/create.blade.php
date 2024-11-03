@extends('layout')
@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Enregistrer un Document</p>
                        <a class="btn btn-primary btn-sm ms-auto" href="{{ route('devis.index') }}">Retour</a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100"
                    action="{{ route('devis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Titre</label>
                                    <input name="titre" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email du prospect</label>
                                    <select class="form-select" name="prospect_id" id="prospect_id" type="number"
                                        aria-label="Default select example">
                                        <option selected disabled>Email</option>
                                        @foreach ($prospects as $prospect)
                                            <option value="{{ $prospect->id }}">{{ $prospect->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Importez le devis Ici
                                    </label>
                                    <input class="form-control" type="file" id="fileInput" name="file_path">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
