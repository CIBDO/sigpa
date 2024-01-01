@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <h4>Éditer la Mission {{ $mission->id_mission }}</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form id="editMissionForm" action="{{ route('missions.update', $mission->id_mission) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Ajoutez tous les champs de la mission ici -->
                        <div class="mb-3">
                            <label for="numero_mission" class="form-label">Numéro de Mission:</label>
                            <input type="text" class="form-control" name="numero_mission" value="{{ $mission->numero_mission }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="objectif" class="form-label">Objectif:</label>
                            <input type="text" class="form-control" name="objectif" value="{{ $mission->objectif }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_debut" class="form-label">Date de Début:</label>
                            <input type="date" class="form-control" name="date_debut" value="{{ $mission->date_debut }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_fin" class="form-label">Date de Fin:</label>
                            <input type="date" class="form-control" name="date_fin" value="{{ $mission->date_fin }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="trajet" class="form-label">Trajet:</label>
                            <textarea class="form-control" name="trajet" required>{{ $mission->trajet }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="id_vehicule" class="form-label">Véhicule:</label>
                            <select class="form-control" name="id_vehicule" required>
                                @foreach($vehicules as $vehicule)
                                    <option value="{{ $vehicule->id_vehicule }}" {{ $mission->id_vehicule == $vehicule->id_vehicule ? 'selected' : '' }}>{{ $vehicule->immatriculation }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#editMissionForm").submit(function(event) {
                // Ajoutez la validation du formulaire ici si nécessaire
                var numeroMission = $("input[name='numero_mission']").val();
                var objectif = $("input[name='objectif']").val();
                var dateDebut = $("input[name='date_debut']").val();
                var dateFin = $("input[name='date_fin']").val();
                var trajet = $("textarea[name='trajet']").val();
                var idVehicule = $("select[name='id_vehicule']").val();

                if (!numeroMission.trim() || !objectif.trim() || !dateDebut.trim() || !dateFin.trim() || !trajet.trim() || idVehicule === 'Choose Vehicule') {
                    alert("Veuillez remplir tous les champs du formulaire.");
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
