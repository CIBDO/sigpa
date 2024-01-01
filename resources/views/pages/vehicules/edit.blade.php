 <!-- resources/views/vehicules/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <h4>Éditer le Véhicule {{ $vehicule->id_vehicule }}</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form id="updateForm" action="{{ route('vehicules.update', $vehicule->id_vehicule) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Immatriculation:</label>
                                    <input type="text" name="immatriculation" value="{{ $vehicule->immatriculation }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date Immatriculation:</label>
                                    <input type="date" name="date_immatriculation" value="{{ $vehicule->date_immatriculation }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>État du Véhicule:</label>
                                    <input type="text" name="etat_vehicule" value="{{ $vehicule->etat_vehicule }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Numéro de Châssis:</label>
                                    <input type="text" name="numero_chasis" value="{{ $vehicule->numero_chasis }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Date de Circulation:</label>
                                    <input type="date" name="date_circulation" value="{{ $vehicule->date_circulation }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Utilité:</label>
                                    <input type="text" name="utilite" value="{{ $vehicule->utilite }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Statut:</label>
                                    <input type="text" name="statut" value="{{ $vehicule->statut }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Modèle:</label>
                                    <select name="id_modele" class="form-control select2">
                                        @foreach($modeles as $modele)
                                            <option value="{{ $modele->id_modele }}" {{ $vehicule->id_modele == $modele->id_modele ? 'selected' : '' }}>{{ $modele->nom_modele }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Marque:</label>
                                    <select name="id_marque" class="form-control select2">
                                        @foreach($marques as $marque)
                                            <option value="{{ $marque->id_marque }}" {{ $vehicule->id_marque == $marque->id_marque ? 'selected' : '' }}>{{ $marque->nom_marque }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Énergie:</label>
                                    <input type="text" name="energie" value="{{ $vehicule->energie }}" class="form-control" required>
                                </div>
                            </div>

                            <!-- Ajoutez d'autres champs ici -->

                            <div class="col-lg-12">
                                <a href="javascript:void(0);" class="btn btn-primary updateBtn">Mise à jour</a>
                                <a href="{{ route('vehicules.list') }}" class="btn btn-cancel">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.updateBtn').on('click', function(event) {
                event.preventDefault();
                $('#updateForm').submit();
            });
        });
    </script>

@endsection
