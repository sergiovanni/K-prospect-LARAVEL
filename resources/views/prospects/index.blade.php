@extends('layout')
@section('title')

<div class="page-title-heading">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            
            <div class="card-header pb-0 p-3 d-flex justify-content-between">
              <h6>Mes Prospects</h6>
                <a class="btn bg-gradient-dark mb-0" href="{{ route('prospects.create') }}"><i class="fas fa-plus"></i>  Ajouter un prospect</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($prospects as $prospect)

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$prospect->nom}}</h6>
                            <p class="text-xs text-secondary mb-0">K-PROSPECT</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$prospect->email}}</p>
                        <p class="text-xs text-secondary mb-0">{{$prospect->phone}}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$prospect->adresse}}</span>
                      </td>

                      <td class="align-middle text-center">
                        <a class="btn btn-link text-dark px-0 mb-0"
                            href="{{ route('prospects.edit', $prospect->id) }}">
                            <i class="fas fa-pencil-alt text-dark me-2"
                                href="{{ route('prospects.edit', $prospect->id) }}"
                                aria-hidden="true" title="Modifier"></i>
                        </a>
                        <a class="btn btn-link text-dark px-0 mb-0"
                            href="{{ route('prospects.show', $prospect->id) }}">
                            <i class="fas fa-list text-dark me-2" title="Afficher ce prospect"></i>
                        </a>

                        <button type="button" class="btn btn-link text-danger text-gradient px-0 mb-0" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $prospect->id }}">
                          <i class="far fa-trash-alt me-2"></i>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade mt-10" id="deleteModal{{ $prospect->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $prospect->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="deleteModalLabel{{ $prospect->id }}">Confirmation de suppression</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      Êtes-vous sûr de vouloir supprimer ce prospect ?
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                      <form action="{{ route('prospects.destroy', $prospect->id) }}" method="post" style="display: inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Supprimer</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
         
                        {{-- <form action="{{ route('prospects.destroy', $prospect->id) }}" method="post"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger text-gradient px-0 mb-0"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprime ce prospect ?')">
                                <i class="far fa-trash-alt me-2"></i>
                            </button>
                        </form> --}}
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
  </div>
</div>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script>
        $(document).ready(function(){
         $('.delete_form').on('submit', function(){
          if(confirm("Supprimer cette categorie ?!"))
          {
           return true;
          }
          else
          {
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