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
          <h4>Liste des Assurances</h4>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterPrestataireModal">
          Ajouter une assurance
        </button>
        
      </div>
<div class="wordset">
                <ul>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export PDF" href="{{ route('export.pdf') }}">
                            <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="PDF">
                        </a>
                    </li>
                     <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export Excel" href="{{ route('export.excel') }}">
                            <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="Excel">
                        </a>
                    </li> 
                    <li>
                    {{-- <button class="btn btn-primary" id="printBtn">Imprimer</button> --}}
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="printList()"; return false;">
                            <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="Print">
                        </a>
                    </li>
                </ul>
            </div>
      <!-- Tableau de la liste des prestataires -->
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table datanew">
              <thead>
                <tr>
                  <th>Véhicule</th>
                  {{-- <th>Assureur</th> --}}
                  <th>Type Assurance</th>
                  <th>Date Début</th>
                  <th>Date Fin</th>
                  <th>Jours Restant</th>
                  <th>Statut</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($assurances as $assurance)
                  <tr>
                    <td>{{ $assurance->vehicule->immatriculation }}</td>
                    {{-- <td>{{ $assurance->nom_assurance }}</td> --}}
                    <td>{{ $assurance->type_assurance }}</td>
                    <td>{{ $assurance->date_debut }}</td>
                    <td>{{ $assurance->date_fin }}</td>
                    <td>{{ $assurance->jours_restant }}</td>
                    <td>{{ $assurance->statut }}</td>
                    <td>
                      <a class="me-3" href="{{route('assurances.edit', ['assurance' => $assurance->id_assurance])}}">
                                <img src="{{asset('assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a href="{{ route('assurances.destroy', ['assurance' => $assurance->id_assurance]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer?'))
                                       document.getElementById('delete-marque-form-{{$assurance->id_assurance}}').submit();">
                                <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                            <!-- Formulaire pour la suppression (à cacher par défaut) -->
                            <form id="delete-marque-form-{{$assurance->id_assurance}}" action="{{ route('assurances.destroy', ['assurance' => $assurance->id_assurance]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Fenêtre modale pour ajouter un prestataire -->
      <div class="modal fade" id="ajouterPrestataireModal" tabindex="-1" aria-labelledby="ajouterPrestataireModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ajouterPrestataireModalLabel">Ajouter une assurance</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('assurances.store') }}" method="post" id="ajouterPrestataireForm">
                @csrf
                <div class="mb-3">
                         <label for="id_vehicule" class="form-label">Véhicule:</label>
                    <select class="form-control" name="id_vehicule" required>
                         @foreach($vehicules as $vehicule)
                         <option value="{{ $vehicule->id_vehicule }}">{{ $vehicule->immatriculation }}</option>
                         @endforeach
                     </select>
                 </div>
                <div class="mb-3">
                  <label for="nom_assurance" class="form-label">Assureur:</label>
                  <input type="text" class="form-control" name="nom_assurance" required>
                </div>
                <div class="mb-3">
                  <div class="form-group">
                                <label>Type Assurance</label>
                                <select name="type_assurance" class="form-control controle select2">
                                    <option selected disabled>Sélectionner le type</option>
                                    <option value="Vignette">Vignette</option>
                                    <option value="Assurance">Assurance</option>
                                    
                                </select>
                            </div>
                </div>
                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date Début:</label>
                    <input type="date" class="form-control" name="date_debut" id="date_debut" required>
                </div>
                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date Fin:</label>
                    <input type="date" class="form-control" name="date_fin" id="date_fin" required>
                </div>
                <div class="mb-3">
                  <div class="form-group">
                                <label>Statut</label>
                                <select name="statut" class="form-control controle select2">
                                    <option selected disabled>Sélectionner le statut</option>
                                    <option value="En Cours">En cours</option>
                                    <option value="Expiré">Expiré</option>
                                    
                                </select>
                            </div>
                </div>
                <div class="mb-3">
    <label for="jours_restant" class="form-label">Jours Restant:</label>
    <input type="text" class="form-control" name="jours_restant" id="jours_restant" readonly>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionnez les champs de date
        var dateDebutInput = document.getElementById('date_debut');
        var dateFinInput = document.getElementById('date_fin');
        var joursRestantInput = document.getElementById('jours_restant');

        // Ajoutez un gestionnaire d'événement pour le changement de valeur des champs de date
        dateDebutInput.addEventListener('change', updateJoursRestant);
        dateFinInput.addEventListener('change', updateJoursRestant);

        // Fonction pour mettre à jour le champ jours restants
        function updateJoursRestant() {
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
    });
</script>

                <button type="submit" class="btn btn-primary">Ajouter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.delete-prestataire-btn').on('click', function(event) {
        event.preventDefault();
        const prestataireId = $(this).data('prestataire-id');
        if (confirm('Êtes-vous sûr de vouloir supprimer?')) {
          $(`#delete-prestataire-form-${prestataireId}`).submit();
        }
      });

      $("#ajouterPrestataireForm").submit(function(event) {
        const nomAssurance = $("input[name='nom_assurance']").val().trim();
        const typeAssurance = $("input[name='type_assurance']").val().trim();
        const jours_restant = $("input[name='jours_restant']").val().trim();

        if (!nom_assurance || !type_assurance || !jours_restant) {
          alert("Veuillez remplir tous les champs.");
          event.preventDefault();
        }
      });
    });
  </script>
@endsection
