@extends('base')

@section('contenu')
<h1>Ajouter un Hôtel</h1>

<form action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nom_hotel">Nom de l'Hôtel</label>
        <input type="text" name="nom_hotel" id="nom_hotel" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="nom_chambre">Nom de la Chambre</label>
        <input type="text" name="nom_chambre" id="nom_chambre" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" name="prix" id="prix" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nombre_lits">Nombre de Lits</label>
        <input type="number" name="nombre_lits" id="nombre_lits" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="max_adultes">Maximum d'Adultes</label>
        <input type="number" name="max_adultes" id="max_adultes" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="max_enfants">Maximum d'Enfants</label>
        <input type="number" name="max_enfants" id="max_enfants" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="statut">Statut</label>
        <select name="statut" id="statut" class="form-control" required>
            <option value="disponible">Disponible</option>
            <option value="non disponible">Non Disponible</option>
            <option value="reservé">Reservée</option>

        </select>
    </div>

    <div class="form-group">
        <label for="category">Catégories</label>
        <select name="category_id" id="category" class="form-control" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="attributs">Attributs</label>
        <div>
            @foreach($attributs as $attribut)
            <label>
                <input type="checkbox" name="attributs[]" value="{{ $attribut->id }}">
                {{ $attribut->name }}
            </label>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter Hôtel</button>
</form>
@endsection
