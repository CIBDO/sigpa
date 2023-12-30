@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <h1>Modifier le service</h1>

    <form action="{{ route('services.update', $service->id_service) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nom_service">Nom du service:</label>
        <input type="text" name="nom_service" value="{{ $service->nom_service }}" required>
        <label for="description">description:</label>
        <input type="text" name="description" value="{{ $service->description }}">
        <button type="submit">Mise à jour</button>
    </form>
</div>
@endsection
