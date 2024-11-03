@extends('layout')
@section('title')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h4>Informations</h4>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <div class="container mt-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ $prospect->nom }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Adresse :</strong> {{ $prospect->adresse }}</p>
                                        <p><strong>Email :</strong> {{ $prospect->email }}</p>
                                        <p><strong>Numéro :</strong> {{ $prospect->phone }}</p>
                                        <p><strong>Profession :</strong> {{ $prospect->activites_profession }}</p>
                                        <p><strong>A propos :</strong> {{ $prospect->Description }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('prospects.index') }}" class="btn btn-secondary">Retour à la
                                            liste</a>
                                        <a class="btn btn-primary btn-sm ms-auto"
                                            href="{{ route('prospections.create') }}">Créer une prospection</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="container mt-5">
                                <div class="card">
                                    <ul class="list-group mt-5">
                                        <h5 class="text-center">Historique de vie du prospect dans l'entreprise</h5>
                                        <h6 class="ps-2">Bilan de toutes les prospections effectués à {{ $prospect->nom }}
                                        </h6>
                                        <br>
                                        <p class="ps-3"> Total de Prospections : {{ $prospectionCount }} </p>
                                        <p class="ps-3"> Prospections conclus / Ventes : {{ $activeProspectionCount }}
                                        </p>
                                        <br>
                                        <a class="text-center" style="cursor: pointer" data-bs-toggle="collapse"
                                            data-bs-target="#detail" aria-expanded="true" aria-controls="detail">
                                            Voir les détails de prospections...
                                        </a>
                                        <div class="collapse mt-3" id="detail">
                                            <div class="card card-body">
                                                <li
                                                    class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>

                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Id</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                    Date</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Titre</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Etat_de_vente</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Action</th>
                                                                <th class="text-secondary opacity-7"></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($prospections as $prospection)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex px-2 py-1">

                                                                            <div
                                                                                class="d-flex flex-column justify-content-center">
                                                                                <p class="text-xs text-secondary mb-0">
                                                                                    {{ $prospection->id }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-xs font-weight-bold mb-0">
                                                                            {{ $prospection->created_at }}</p>
                                                                        {{-- <p class="text-xs text-secondary mb-0">Particulier</p> --}}
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-xs font-weight-bold mb-0">
                                                                            {{ $prospection->titre }}</p>
                                                                        {{-- <p class="text-xs text-secondary mb-0">Particulier</p> --}}
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <span
                                                                            class="text-secondary text-xs font-weight-bold">
                                                                            {{ $prospection->is_active ? 'Vente conclus' : 'En instance' }}
                                                                        </span>
                                                                    </td>

                                                                    <td class="align-middle text-center">

                                                                        <form
                                                                            action="{{ route('prospections.destroy', $prospection->id) }}"
                                                                            method="post" style="display: inline;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-link text-danger text-gradient px-0 mb-0"
                                                                                onclick="return confirm('Êtes-vous sûr de vouloir supprime cette prospection ?')">
                                                                                <i class="far fa-trash-alt me-2"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        {{-- <tbody>
                                                              @foreach ($prospections as $prospection)
                                                                  <tr>
                                                                      <td>{{ $prospection->id }}</td>
                                                                      <td>{{ $prospection->created_at }}</td>
                                                                      <td >
                                                                          <p class="mb-0 text-sm">
                                                                              {{ $prospection->titre }}</p>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <span
                                                                              class="text-secondary text-xs font-weight-bold">
                                                                              {{ $prospection->is_active ? 'Vente conclus' : 'En instance' }}
                                                                          </span>
                                                                      </td>

                                                                  </tr>
                                                              @endforeach
                                                          </tbody> --}}
                                                    </table>
                                            </div>
                                        </div>

                                        </li>
                                        <br><br><br>
                                        <h6 class="ps-2 mt-6">Bilan de tous les devis envoyés à {{ $prospect->nom }} </h6>
                                        <br>
                                        <p class="ps-3"> Total de Devis envoyés : {{ $devisCount }} </p>
                                        <br>
                                        <a class="text-center" style="cursor: pointer" data-bs-toggle="collapse"
                                            data-bs-target="#details" aria-expanded="false" aria-controls="details">
                                            Voir les Détails...
                                        </a>
                                        <!-- Détails avec le tableau caché -->
                                        <div class="collapse mt-3" id="details">
                                            <div class="card card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>

                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Id</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Titre</th>
                                                            <th class="text-secondary opacity-7"></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($devis as $dev)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex px-2 py-1">

                                                                        <div
                                                                            class="d-flex flex-column justify-content-center">
                                                                            <p class="text-xs text-secondary mb-0">
                                                                                {{ $dev->id }}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p class="text-xs font-weight-bold mb-0">
                                                                        {{ $dev->titre }}</p>
                                                                    {{-- <p class="text-xs text-secondary mb-0">Particulier</p> --}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </ul>
                                    <div class="container mt-5">
                                        <!-- Information principale -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
    @section('content')
