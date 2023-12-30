@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <h1>Modifier le modèle </h1>

    <form action="{{ route('modeles.update', $modele->id_modele) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nom_modele">Nom du modèle:</label>
        <input type="text" name="nom_modele" value="{{ $modele->nom_modele }}" required>
        <button type="submit">Mise à jour </button>
    </form>
</div>
@endsection
