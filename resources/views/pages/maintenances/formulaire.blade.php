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
                    <h4>Ajouter une maintenance</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('maintenances.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Véhicule</label>
                                    <select name="id_vehicule" class="form-control select2">
                                        @foreach($vehicules as $vehicule)
                                            <option value="{{ $vehicule->id_vehicule }}">{{ $vehicule->immatriculation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Prestataire</label>
                                    <select name="id_prestataire" class="form-control select2">
                                        @foreach($prestataires as $prestataire)
                                            <option value="{{ $prestataire->id_prestataire }}">{{ $prestataire->nom_prestataire }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Numéro Facture</label>
                                    <input type="text" name="numero_facture" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Coût</label>
                                    <input type="number" name="cout" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date Début</label>
                                    <input type="date" name="date_debut" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date Fin</label>
                                    <input type="date" name="date_fin" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="id_type_maintenance">Type maintenance</label>
                                    <select name="id_type_maintenance" class="form-control select2">
                                        @foreach($typesMaintenance as $typeMaintenance)
                                            <option value="{{ $typeMaintenance->id_type_maintenance }}">{{ $typeMaintenance->type_maintenance }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">Statut</label>
                                    <select name="statut" class="form-control controle select2">
                                        <option value="En cours">En cours</option>
                                        <option value="Terminé">Terminé</option>
                                        <option value="En attente">En attente</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="travaux">Travaux:</label>
                                    <textarea name="travaux" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>

                            {{-- <div class="col-lg-3 col-sm-6 col-12"> --}}
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            {{-- </div> --}}
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
@endsection
