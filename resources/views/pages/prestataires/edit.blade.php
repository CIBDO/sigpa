@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <h1>Modifier le prestataire</h1>
    <form action="{{ route('prestataires.update', $prestataire->id_prestataire) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nom_marque">Nom du prestataire:</label>
        <input type="text" name="nom_prestataire" value="{{ $prestataire->nom_prestataire }}" required>
        <input type="text" name="contact" value="{{ $prestataire->contact }}" required>
        <input type="text" name="adresse" value="{{ $prestataire->adresse }}" required>
        <button type="submit">Mise à jour </button>
    </form>
</div>
@endsection
