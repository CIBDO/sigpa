
@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Éditer la maintenance</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('maintenances.update', ['maintenance' => $maintenance->id_maintenance]) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Véhicule</label>
                                <select name="id_vehicule" class="form-control select2">
                                    @foreach($vehicules as $vehicule)
                                        <option value="{{ $vehicule->id_vehicule }}" {{ $maintenance->id_vehicule == $vehicule->id_vehicule ? 'selected' : '' }}>{{ $vehicule->immatriculation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Prestataire</label>
                                <select name="id_prestataire" class="form-control select2">
                                    @foreach($prestataires as $prestataire)
                                        <option value="{{ $prestataire->id_prestataire }}" {{ $maintenance->id_prestataire == $prestataire->id_prestataire ? 'selected' : '' }}>{{ $prestataire->nom_prestataire }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Numéro Facture</label>
                                <input type="text" name="numero_facture" class="form-control" value="{{ $maintenance->numero_facture }}" required>
                            </div>
                        </div>
                        <!-- Ajoutez les autres champs de formulaire de manière similaire -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Coût</label>
                                <input type="number" name="cout" class="form-control" value="{{ $maintenance->cout }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date Début</label>
                                <input type="date" name="date_debut" class="form-control" value="{{ $maintenance->date_debut }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date Fin</label>
                                <input type="date" name="date_Fin" class="form-control" value="{{ $maintenance->date_Fin }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="control-label">Type Maintenance</label>
                                <select name="type" class="form-control controle select2">
                                    <option value="Reparation" {{ $maintenance->type == 'Réparation' ? 'selected' : '' }}>Réparation</option>
                                    <option value="Entretien" {{ $maintenance->type == 'Entretien' ? 'selected' : '' }}>Entretien</option>
                                    <option value="Autres" {{ $maintenance->type == 'Autres' ? 'selected' : '' }}>Autres</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="control-label">Statut</label>
                                <select name="statut" class="form-control controle select2">
                                    <option value="En cours" {{ $maintenance->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="Terminé" {{ $maintenance->statut == 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                    <option value="En attente" {{ $maintenance->statut == 'En attente' ? 'selected' : '' }}>En attente</option>
                                </select>
                            </div>
                        </div>
                          <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="travaux">Travaux:</label>
                                <textarea name="travaux" required>{{ $maintenance->travaux }}</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="alert('Bouton cliqué')">Mettre à jour</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
