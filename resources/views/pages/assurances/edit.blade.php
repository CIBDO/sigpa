@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
<!-- Champs de formulaire pour l'édition -->
<div class="mb-3">
    <label for="id_vehicule" class="form-label">Véhicule:</label>
    <select class="form-control" name="id_vehicule" required>
        @foreach($vehicules as $vehicule)
        <option value="{{ $vehicule->id_vehicule }}" {{ $assurance->id_vehicule == $vehicule->id_vehicule ? 'selected' : '' }}>
            {{ $vehicule->immatriculation }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="nom_assurance" class="form-label">Assureur:</label>
    <input type="text" class="form-control" name="nom_assurance" value="{{ $assurance->nom_assurance }}" required>
</div>

<div class="mb-3">
    <label for="type_assurance" class="form-label">Type Assurance:</label>
    <select name="type_assurance" class="form-control controle select2" required>
        <option value="Vignette" {{ $assurance->type_assurance == 'Vignette' ? 'selected' : '' }}>Vignette</option>
        <option value="Assurance" {{ $assurance->type_assurance == 'Assurance' ? 'selected' : '' }}>Assurance</option>
    </select>
</div>

<div class="mb-3">
    <label for="date_debut_edition" class="form-label">Date Début:</label>
    <input type="date" class="form-control" name="date_debut" id="date_debut_edition" value="{{ $assurance->date_debut }}" required>
</div>

<div class="mb-3">
    <label for="date_fin_edition" class="form-label">Date Fin:</label>
    <input type="date" class="form-control" name="date_fin" id="date_fin_edition" value="{{ $assurance->date_fin }}" required>
</div>

<div class="mb-3">
    <label for="statut" class="form-label">Statut:</label>
    <select name="statut" class="form-control controle select2" required>
        <option value="En Cours" {{ $assurance->statut == 'En Cours' ? 'selected' : '' }}>En cours</option>
        <option value="Expiré" {{ $assurance->statut == 'Expiré' ? 'selected' : '' }}>Expiré</option>
    </select>
</div>

<div class="mb-3">
    <label for="jours_restant_edition" class="form-label">Jours Restant:</label>
    <input type="text" class="form-control" name="jours_restant" id="jours_restant_edition" value="{{ $assurance->jours_restant }}" readonly>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionnez les champs de date
        var dateDebutInput = document.getElementById('date_debut_edition');
        var dateFinInput = document.getElementById('date_fin_edition');
        var joursRestantInput = document.getElementById('jours_restant_edition');

        // Ajoutez un gestionnaire d'événement pour le changement de valeur des champs de date
        dateDebutInput.addEventListener('change', updateJoursRestantEdition);
        dateFinInput.addEventListener('change', updateJoursRestantEdition);

        // Fonction pour mettre à jour le champ jours restants
        function updateJoursRestantEdition() {
            var dateDebut = new Date(dateDebutInput.value);
            var dateFin = new Date(dateFinInput.value);

            // Vérifiez si les dates sont valides
            if (!isNaN(dateDebut.getTime()) && !isNaN(dateFin.getTime())) {
                var differenceEnMillis = dateFin - dateDebut;
                var differenceEnJours = Math.ceil(differenceEnMillis / (1000 * 60 * 60 * 24));

                // Assurez-vous que la différence est positive
                var joursRestant = Math.max(0, differenceEnJours);

                // Mettez à jour la valeur du champ jours restants
                joursRestantInput.value = joursRestant;
            }
        }

        // Appelez la fonction initiale pour calculer les valeurs initiales
        updateJoursRestantEdition();
    });

</script>

<!-- Bouton de soumission -->
<button type="submit" class="btn btn-primary">Enregistrer les modifications</button>


        </div>
    </div>

@endsection