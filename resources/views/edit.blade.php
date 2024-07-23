@extends('base')
@section('titre', 'Hôtels de ville')

@section('contenu')
<h1>Modifier des hôtels</h1>
<form action="" method="post" class="form">
    @csrf

    <div class="form-group">
        <label for="nom_hotel">Nom de L'hôtel</label>
        <input type="text" class="form-control" name="nom_hotel" id="nom_hotel" placeholder="Nom de l'hôtel"
            value="{{($hotel->nom_hotel)}}">
    </div>

    <div class="form-group">
        <label for="nom_chambre">Nom de la chambre</label>
        <input type="text" class="form-control" name="nom_chambre" id="nom_chambre" placeholder="nom_chambre"
            value="{{($hotel->nom_chambre)}}">
    </div>

    <div class="form-group">
        Description
        <textarea for="description" type="text" class="form-control" name="description" id="description">{{($hotel->description)}}
</textarea>
    </div>

    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="" class="form-control" name="prix" id="prix" placeholder="Prix" value="{{($hotel->prix)}}">
    </div>
    <div class="form-group">
        <label for="nombre_lits">Nombre de lits</label>
        <input type="number" class="form-control" name="nombre_lits" id="nombre_lits" placeholder="Nombre de lits"
            value="{{($hotel->nombre_lits)}}">
    </div>


    <div class="form-group">
        <label for="max_adultes">Maximum d'adultes</label>
        <input type="number" class="form-control" name="max_adultes" id="max_adultes" placeholder="Maximum d'adultes"
            value="{{($hotel->max_adultes)}}">
    </div>
    <div class="form-group">
        <label for="max_enfants">Maximum d'enfants</label>
        <input type="number" class="form-control" name="max_enfants" id="max_enfants"
            placeholder="Enfants maximum autorisés" value="{{($hotel->max_enfants)}}">
    </div>

    <div class="form-group">
        <label for="statut">Statut</label>
        <select class="form-control" name="statut" id="statut">
            <option value="disponible" {{ $hotel->statut === 'disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="non disponible" {{ $hotel->statut === 'non disponible' ? 'selected' : '' }}>Non disponible
            </option>
        </select>
    </div>
    <div class="form-group">
    <label for="category">Catégories</label>
    <select name="category_id" id="category" class="form-control"  >
        @foreach($categories as $category)
            <option value="{{ $category->id }}"{{$category->id===$hotel->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
@endsection
