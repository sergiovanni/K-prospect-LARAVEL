@extends('layout')
@section('title')

    <div class="page-title-heading">
        <div class="row">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3 d-flex justify-content-between">
                    <h6>Mes Prospections</h6>

                    <a class="btn bg-gradient-dark mb-0" href="{{ route('prospections.create') }}"><i class="fas fa-plus"></i>
                        Enregistrer une prospection</a>

                </div>
                <form method="GET" action="{{ route('prospections.index') }}">
                    <div class="flex items-center  mt-4">
                        {{-- <div class= "row">
                            <div class= "col-9">
                                <span>
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" placeholder="Rechercher une prospection"
                                            value="{{ request('search') }}">

                                    </div>
                                  </div>
                                    <div class= "col-3">
                                        <button type="submit" class="btn btn-primary">Rechercher</button>
                                    </div>
                                </span>

                            </div> --}}
                </form>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Titre</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Statut</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Actions</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prospections as $prospection)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $prospection->titre }}</h6>
                                                <p class="text-xs text-secondary mb-0">K-PROSPECT</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $prospection->date }}</p>
                                        <p class="text-xs text-secondary mb-0">Particulier</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {{ $prospection->is_active ? 'Vente conclus' : 'Non-acquis' }}
                                        </span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <a class="btn btn-link text-dark px-0 mb-0"
                                            href="{{ route('prospections.edit', $prospection->id) }}">
                                            <i class="fas fa-pencil-alt text-dark me-2"
                                                href="{{ route('prospections.edit', $prospection->id) }}"
                                                aria-hidden="true" title="Modifier"></i>
                                        </a>
                                        <a class="btn btn-link text-dark px-0 mb-0"
                                            href="{{ route('prospections.show', $prospection->id) }}">
                                            <i class="fas fa-list text-dark me-2" title="Voir cette prospection"></i>
                                        </a>
                                        <form action="{{ route('prospections.destroy', $prospection->id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger text-gradient px-0 mb-0"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprime cette prospection ?')">
                                                <i class="far fa-trash-alt me-2"></i>
                                            </button>
                                        </form>
                                        {{-- <button class="btn btn-link text-success text-gradient px-3 mb-0" href="{{ route('prospects.show',  $prospect->id) }}">
                          <i class="fa fa-download  me-2"></i>Télecharger</button> --}}
                                    </td>
                                </tr>

                        </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete_form').on('submit', function() {
                if (confirm("Supprimer cette prospection ?!")) {
                    return true;
                } else {
                    return false;
                }
            });
        });
    </script>
    {{-- <script>
          // Ajoute un gestionnaire d'événements au clic sur le bouton de suppression
          document.querySelectorAll('.delete_form').forEach(function(form) {
              form.addEventListener('submit', function(event) {
                  // Empêche le formulaire de se soumettre immédiatement
                  event.preventDefault();
      
                  // Affiche une boîte de dialogue de confirmation
                  var confirmation = confirm("Voulez-vous vraiment supprimer cet élément?");
      
                  // Si l'utilisateur clique sur "OK", soumet le formulaire
                  if (confirmation) {
                      form.submit();
                  }
              });
          });
      </script> --}}



@endsection
@section('content')
