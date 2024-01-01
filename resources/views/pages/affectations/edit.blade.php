@extends('layouts.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Liste des affectations</h4>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterAffectationModal">
                   Modifier l'affectation
                </button>
                <div class="modal fade" id="ajouterAffectationModal" tabindex="-1" aria-labelledby="ajouterAffectationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajouterAffectationModalLabel">Modifier l'affectation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('affectations.update', $affectation->id_affectation) }}" method="post" id="editerAffectationForm">
                                    @csrf
                                    @method('PUT')

                                    <!-- Ajoutez tous les champs de l'affectation ici -->
                                    <div class="mb-3">
                                        <label for="id_service" class="form-label">Service:</label>
                                        <select class="form-control" name="id_service" required>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id_service }}" {{ $affectation->id_service == $service->id_service ? 'selected' : '' }}>{{ $service->nom_service }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_modele" class="form-label">Modèle:</label>
                                        <select class="form-control" name="id_modele" required>
                                            @foreach($modeles as $modele)
                                                <option value="{{ $modele->id_modele }}" {{ $affectation->id_modele == $modele->id_modele ? 'selected' : '' }}>{{ $modele->nom_modele }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_marque" class="form-label">Marque:</label>
                                        <select class="form-control" name="id_marque" required>
                                            @foreach($marques as $marque)
                                                <option value="{{ $marque->id_marque }}" {{ $affectation->id_marque == $marque->id_marque ? 'selected' : '' }}>{{ $marque->nom_marque }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_vehicule" class="form-label">Véhicule:</label>
                                        <select class="form-control" name="id_vehicule" required>
                                            @foreach($vehicules as $vehicule)
                                                <option value="{{ $vehicule->id_vehicule }}" {{ $affectation->id_vehicule == $vehicule->id_vehicule ? 'selected' : '' }}>{{ $vehicule->immatriculation }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date_affectation" class="form-label">Date d'affectation:</label>
                                        <input type="date" class="form-control" name="date_affectation" value="{{ $affectation->date_affectation }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Statut</label>
                                        <select name="statut" class="form-control controle select2" required>
                                            <option value="Neuf" {{ $affectation->statut == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                                            <option value="Bon" {{ $affectation->statut == 'Bon' ? 'selected' : '' }}>Bon</option>
                                            <option value="pasbon" {{ $affectation->statut == 'pasbon' ? 'selected' : '' }}>Pas Bon</option>
                                            <!-- Ajoutez d'autres options selon vos besoins -->
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Script pour la validation (si nécessaire) -->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        $("#editerAffectationForm").submit(function (event) {
                            var nomMarque = $("input[name='nom_vehicule']").val();
                            if (!nomMarque.trim()) {
                                alert("Veuillez entrer le nom du vehicule.");
                                event.preventDefault();
                            }
                        });
                    });
                </script>

                 
        
            </div>
        </div>
    </div>
@endsection
