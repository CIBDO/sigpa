
@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <h1>Détails du Véhicule #{{ $vehicule->id_vehicule }}</h1>

        <ul>
            <li><strong>Immatriculation:</strong> {{ $vehicule->immatriculation }}</li>
            <li><strong>Date Immatriculation:</strong> {{ $vehicule->date_immatriculation }}</li>
            <li><strong>État du Véhicule:</strong> {{ $vehicule->etat_vehicule }}</li>
            <li><strong>Numéro de Châssis:</strong> {{ $vehicule->numero_chasis }}</li>
            <li><strong>Date de Circulation:</strong> {{ $vehicule->date_circulation }}</li>
            <li><strong>Utilité:</strong> {{ $vehicule->utilite }}</li>
            <li><strong>Statut:</strong> {{ $vehicule->statut }}</li>
            <li><strong>Modèle:</strong> {{ $vehicule->modele->nom_modele ?? 'N/A' }}</li>
            <li><strong>Marque:</strong> {{ $vehicule->marque->nom_marque ?? 'N/A' }}</li>
            <li><strong>Énergie:</strong> {{ $vehicule->energie }}</li>
            <li><strong>Créé le:</strong> {{ $vehicule->created_at }}</li>
            <li><strong>Dernière modification:</strong> {{ $vehicule->updated_at }}</li>
        </ul>
    </div>
@endsection
