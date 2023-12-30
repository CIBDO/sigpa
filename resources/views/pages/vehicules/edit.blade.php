<!-- resources/views/vehicules/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <h1>Éditer le Véhicule #{{ $vehicule->id_vehicule }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('vehicules.update', $vehicule->id_vehicule) }}" method="post">
            @csrf
            @method('PUT')

            <label for="immatriculation">Immatriculation:</label>
            <input type="text" name="immatriculation" value="{{ $vehicule->immatriculation }}" required>

            <label for="date_immatriculation">Date Immatriculation:</label>
            <input type="date" name="date_immatriculation" value="{{ $vehicule->date_immatriculation }}" required>

            <label for="etat_vehicule">État du Véhicule:</label>
            <input type="text" name="etat_vehicule" value="{{ $vehicule->etat_vehicule }}" required>

            <label for="numero_chasis">Numéro de Châssis:</label>
            <input type="text" name="numero_chasis" value="{{ $vehicule->numero_chasis }}" required>

            <label for="date_circulation">Date de Circulation:</label>
            <input type="date" name="date_circulation" value="{{ $vehicule->date_circulation }}" required>

            <label for="utilite">Utilité:</label>
            <input type="text" name="utilite" value="{{ $vehicule->utilite }}" required>

            <label for="statut">Statut:</label>
            <input type="text" name="statut" value="{{ $vehicule->statut }}" required>

            <label for="id_modele">Modèle:</label>
            <select name="id_modele">
                @foreach($modeles as $modele)
                    <option value="{{ $modele->id_modele }}" {{ $vehicule->id_modele == $modele->id_modele ? 'selected' : '' }}>{{ $modele->nom_modele }}</option>
                @endforeach
            </select>

            <label for="id_marque">Marque:</label>
            <select name="id_marque">
                @foreach($marques as $marque)
                    <option value="{{ $marque->id_marque }}" {{ $vehicule->id_marque == $marque->id_marque ? 'selected' : '' }}>{{ $marque->nom_marque }}</option>
                @endforeach
            </select>

            <label for="energie">Énergie:</label>
            <input type="text" name="energie" value="{{ $vehicule->energie }}" required>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
