@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="page-header">
            <div class="page-title">
                <h4>Ajouter un incident </h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('incidents.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="id_vehicule">Véhicule :</label>
                                <select name="id_vehicule" id="id_vehicule" class="form-control">
                                    @foreach ($vehicules as $vehicule)
                                    <option value="{{ $vehicule->id_vehicule }}">{{ $vehicule->immatriculation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="date_incident">Date de l'incident :</label>
                                <input type="date" name="date_incident" id="date_incident" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="gravite">Gravité :</label>
                                <select name="gravite" class="form-control controle select2">
                                    <option selected disabled>Sélectionner</option>
                                    <option value="Grave">Grave</option>
                                    <option value="Pas Grave">Pas Grave</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                            </div>
                        </div>
 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="degat">Dégât :</label>
                                <input type="text" name="degat" id="degat" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="causes">Causes :</label>
                                <textarea name="causes" id="causes" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea name="description" id="description" required></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="fichiers">Fichiers :</label>
                                <input type="file" name="fichiers[]" id="fichiers" accept="image/*" multiple>
                                
                                @if (isset($incident) && $incident->fichiers)
                                    <p>Aperçu des images actuelles :</p>
                                    @foreach (json_decode($incident->fichiers) as $image)
                                        <img src="{{ asset('storage/' . $image) }}" style="max-width: 100px;">
                                    @endforeach
                                @else
                                    <p>Aucune image associée</p>
                                @endif
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Créer</button>
                            <a href="{{ route('incidents.formulaire') }}" class="btn btn-cancel">Quitter</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
</div>
@endsection
