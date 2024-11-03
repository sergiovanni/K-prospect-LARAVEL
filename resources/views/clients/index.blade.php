@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clients avec au moins deux prospections actives</h1>

    @if($prospects->isEmpty())
        <p>Aucun prospect avec au moins deux prospections actives trouvées.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Nombre de prospections actives</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prospects as $prospect)
                    <tr>
                        <td>{{ $prospect->nom }}</td>
                        <td>{{ $prospect->email }}</td>
                        <td>{{ $prospect->active_prospections_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
