@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <h1>Modifier la Marque</h1>

    <form action="{{ route('marques.update', $marque->id_marque) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nom_marque">Nom de la Marque:</label>
        <input type="text" name="nom_marque" value="{{ $marque->nom_marque }}" required>
        <button type="submit">Enregistrer les modifications</button>
    </form>
</div>
@endsection
