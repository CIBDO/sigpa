 @extends('layouts.master')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Modifier le Bon </h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('bons.update', ['bon' => $bon->id_bon]) }}" method="post" id="editBonForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_vehicule" class="form-label">Véhicule:</label>
                        <select class="form-control" name="id_vehicule" required>
                            @foreach($vehicules as $vehicule)
                                <option value="{{ $vehicule->id_vehicule }}" @if($bon->id_vehicule == $vehicule->id_vehicule) selected @endif>{{ $vehicule->immatriculation }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="numero_bon" class="form-label">Numéro de Bon:</label>
                        <input type="text" class="form-control" name="numero_bon" value="{{ $bon->numero_bon }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_delivrance" class="form-label">Date de Délivrance:</label>
                        <input type="date" class="form-control" name="date_delivrance" value="{{ $bon->date_delivrance }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantité:</label>
                        <input type="text" class="form-control" name="quantite" value="{{ $bon->quantite }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="valeur_espece" class="form-label">Valeur en Espèces:</label>
                        <input type="text" class="form-control" name="valeur_espece" value="{{ $bon->valeur_espece }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
