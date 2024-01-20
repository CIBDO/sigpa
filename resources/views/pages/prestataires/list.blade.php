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
          <h4>Liste des Prestataires</h4>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterPrestataireModal">
          Ajouter un prestataire
        </button>
      </div>

      <!-- Tableau de la liste des prestataires -->
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table datanew">
              <thead>
                <tr>
                  
                  <th>Nom du prestataire</th>
                  <th>Contact</th>
                  <th>Adresse</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($prestataires as $prestataire)
                  <tr>
                    
                    <td>{{ $prestataire->nom_prestataire }}</td>
                    <td>{{ $prestataire->contact }}</td>
                    <td>{{ $prestataire->adresse }}</td>
                    <td>
                      <a href="{{ route('prestataires.edit', ['prestataire' => $prestataire->id_prestataire]) }}" class="btn btn-info">Éditer</a>
                      <a href="#" class="btn btn-danger delete-prestataire-btn" data-prestataire-id="{{ $prestataire->id_prestataire }}">Supprimer</a>
            <form id="delete-prestataire-form-{{ $prestataire->id_prestataire }}" action="{{ route('prestataires.destroy', ['prestataire' => $prestataire->id_prestataire]) }}" method="POST" style="display: none;">
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
              <h5 class="modal-title" id="ajouterPrestataireModalLabel">Ajouter un prestataire</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('prestataires.store') }}" method="post" id="ajouterPrestataireForm">
                @csrf
                <div class="mb-3">
                  <label for="nom_prestataire" class="form-label">Nom du prestataire:<span class="required">*</span></label>
                  <input type="text" class="form-control" name="nom_prestataire" required>
                </div>
                <div class="mb-3">
                  <label for="contact" class="form-label">Contact:<span class="required">*</span></label>
                  <input type="text" class="form-control" name="contact" required>
                </div>
                <div class="mb-3">
                  <label for="adresse" class="form-label">Adresse:<span class="required">*</span></label>
                  <input type="text" class="form-control" name="adresse" required>
                </div>
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
        if (confirm('Êtes-vous sûr de vouloir supprimer ce prestataire?')) {
          $(`#delete-prestataire-form-${prestataireId}`).submit();
        }
      });

      $("#ajouterPrestataireForm").submit(function(event) {
        const nomPrestataire = $("input[name='nom_prestataire']").val().trim();
        const contact = $("input[name='contact']").val().trim();
        const adresse = $("input[name='adresse']").val().trim();

        if (!nomPrestataire || !contact || !adresse) {
          alert("Veuillez remplir tous les champs.");
          event.preventDefault();
        }
      });
    });
  </script>
@endsection
