@extends('layout')
@section('title')

<div class="page-title-heading">
 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            
            <div class="card-header pb-0 p-3 d-flex justify-content-between">
              <h6>Toutes mes prospections</h6>
                <a class="btn bg-gradient-dark mb-0" href="{{ route('categories.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Creer categorie</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $categorie)

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$categorie->nom}}</h6>
                            <p class="text-xs text-secondary mb-0">Doc Unity</p>
                          </div>
                        </div>
                      </td>

                      <td class="align-middle text-center">
                        <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('categories.edit', $categorie->id) }}">
                            <i class="fas fa-pencil-alt text-dark me-2" href="{{route('categories.edit', $categorie->id)}}" aria-hidden="true"></i>Edit
                        </a>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                <i class="far fa-trash-alt me-2"> </i>Supprimer
                            </button>
                        </form>
                        {{-- <form action="{{ route('categories.destroy', ['id' => $categorie->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
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