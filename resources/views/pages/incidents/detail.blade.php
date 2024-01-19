
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
    
    <h2>Détails de l'incident</h2>

    <p>ID: {{ $incident->id_incident }}</p>
    <p>Véhicule: {{ $incident->vehicule->immatriculation }}</p>
    <p>Date de l'incident: {{ $incident->date_incident }}</p>
    <p>Causes: {{ $incident->causes }}</p>
    <p>Gravité: {{ $incident->gravite }}</p>
    <p>Dégât: {{ $incident->degat }}</p>
    <p>Description: {{ $incident->description }}</p>

    <h3>Fichiers associés :</h3>
    @foreach($incident->files as $file)
        <img src="{{ asset('storage/incident_images/' . $file->file_path) }}" style="max-width: 100px;">
    @endforeach
    <div class="text-center mt-3">
        <button class="btn btn-primary" onclick="printDetails()">Imprimer</button>
    </div>

    <script>
        function printDetails() {
            window.print();
        }
    </script>
</div>
</div>
@endsection
