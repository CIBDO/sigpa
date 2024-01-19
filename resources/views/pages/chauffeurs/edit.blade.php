@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <h4>Éditer le chauffeur {{ $chauffeur->id_chauffeur }}</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                <form action="{{ route('chauffeurs.update', $chauffeur->id_chauffeur) }}" method="post">
    @csrf
    @method('put') <!-- Utilisez la méthode PUT pour la mise à jour -->

    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
                <label>Matricule</label>
                <input type="text" name="matricule" value="{{ $chauffeur->matricule }}" required>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ $chauffeur->nom }}" required>
            </div>
        </div>

        <!-- Répétez cette structure pour tous les autres champs -->
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" value="{{ $chauffeur->prenom }}" required>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
                <label>Date de Naissance</label>
                <input type="date" name="date_naiss" value="{{ $chauffeur->date_naiss }}" required>
            </div>
        </div>

        <!-- Ajoutez les autres champs, tels que le sexe, email, téléphone, numéro de permis, etc. -->
        <div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label>Sexe</label>
        <select name="genre" class="form-control controle select2">
            <option value="Masculin" {{ $chauffeur->genre == 'Masculin' ? 'selected' : '' }}>Masculin</option>
            <option value="Feminin" {{ $chauffeur->genre == 'Feminin' ? 'selected' : '' }}>Féminin</option>
            <!-- Ajoutez d'autres options selon vos besoins -->
        </select>
    </div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{ $chauffeur->email }}" required>
    </div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label>Téléphone</label>
        <input type="text" name="telephone" value="{{ $chauffeur->telephone }}" required>
    </div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label>Numéro de Permis</label>
        <input type="text" name="numero_permis" value="{{ $chauffeur->numero_permis }}" required>
    </div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label>Catégorie de Permis</label>
        <select name="categorie_permis" class="form-control controle select2">
            <option value="A" {{ $chauffeur->categorie_permis == 'A' ? 'selected' : '' }}>A1</option>
            <option value="AA" {{ $chauffeur->categorie_permis == 'AA' ? 'selected' : '' }}>A2</option>
            <option value="B" {{ $chauffeur->categorie_permis == 'B' ? 'selected' : '' }}>B</option>
            <option value="C" {{ $chauffeur->categorie_permis == 'C' ? 'selected' : '' }}>C</option>
            <option value="E" {{ $chauffeur->categorie_permis == 'E' ? 'selected' : '' }}>E</option>
            <option value="F" {{ $chauffeur->categorie_permis == 'F' ? 'selected' : '' }}>F</option>
        </select>
    </div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label>Validité du Permis</label>
        <input type="date" name="validite_permis" class="form-control" value="{{ $chauffeur->validite_permis }}" required>
    </div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
    <div class="form-group">
        <label>Choisir Service</label>
        <select name="id_service" class="form-control controle select2">
            @foreach($services as $service)
                <option value="{{ $service->id_service }}" {{ $chauffeur->id_service == $service->id_service ? 'selected' : '' }}>
                    {{ $service->nom_service }}
                </option>
            @endforeach
        </select>
    </div>
</div>


        <div class="col-lg-12">
            <button type="submit" class="btn btn-submit me-2">Enregistrer les modifications</button>
            <a href="{{ route('chauffeurs.formulaire') }}" class="btn btn-cancel">Quitter</a>
        </div>
    </div>
</form>


            </div>
        </div>
    </div>
@endsection


