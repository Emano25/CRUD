@extends('base')

@section('contenu')
    <center>
        <h1>Liste des Hôtels</h1>
        <a href="{{ route('hotel.create') }}" class="btn btn-primary">Ajouter un hôtel</a>

        <div class="row mt-3">
            @foreach($hotels as $hotel)
                <div class="col-md-4 mb-3"> <!-- Réduire la largeur à col-md-3 -->
                    <div class="card">
                        <img class="card-img-top rounded-top" style="width: 100%; height:200px; object-fit: cover;"
                             src="{{ asset($hotel->image_path) }}" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->nom_hotel }}</h5>
                            <p class="card-text">Nom de la chambre: {{ $hotel->nom_chambre }}</p>
                            <p class="card-text">Description: {{ $hotel->description }}</p>
                            <p class="card-text">Prix : {{ $hotel->prix }}</p>
                            <p class="card-text">Nombre de lits: {{ $hotel->nombre_lits }}</p>
                            <p class="card-text">Maximum d'adultes: {{ $hotel->max_adultes }}</p>
                            <p class="card-text">Maximum d'enfants: {{ $hotel->max_enfants }}</p>
                            <p class="card-text">Statut: {{ $hotel->statut }}</p>
                            <p class="card-text">Catégorie:
                                @if($hotel->category)
                                    {{ $hotel->category->name }}
                                @else
                                    Aucune catégorie associée
                                @endif
                            </p>
                            <p class="card-text">Attributs:
                                @if($hotel->attributs->count() > 0)
                                    {{ implode(' - ', $hotel->attributs->pluck('name')->toArray()) }}
                                @else
                                    Aucun attribut associé
                                @endif
                            </p>

                            <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('hotel.delete', $hotel->id) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </center>
@endsection
