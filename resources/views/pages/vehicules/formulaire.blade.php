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
                <h4>Ajouter un véhicule</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('vehicules.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Immatriculation</label>
                                <input type="text" name="immatriculation" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date Immatriculation</label>
                                <input type="date" name="date_immatriculation" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>État du Véhicule</label>
                                <select name="etat_vehicule" class="form-control controle select2">
                                    <option selected disabled>Sélectionner l'état du véhicule</option>
                                    <option value="Bon">Neuf</option>
                                    <option value="Bon">Bon</option>
                                    <option value="Moyen">Moyen</option>
                                    <option value="Mauvais">Mauvais</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Numéro de Châssis</label>
                                <input type="text" name="numero_chasis" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date de mise en Circulation</label>
                                <input type="date" name="date_circulation" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Utilité</label>
                                <select name="utilite" class="form-control controle select2">
                                    <option selected disabled>Sélectionner l'utilité</option>
                                    <option value="Service">Service</option>
                                    <option value="Mission">Mission</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Statut</label>
                                <select name="statut" class="form-control controle select2">
                                    <option selected disabled>Sélectionner le statut</option>
                                    <option value="Actif">Actif</option>
                                    <option value="Inactif">Inactif</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Modèle</label>
                                <select name="id_modele" class="form-control controle select2">
                                    @foreach($modeles as $modele)
                                        <option value="{{ $modele->id_modele }}">{{ $modele->nom_modele }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Marque</label>
                                <select name="id_marque" class="form-control select2 ">
                                    @foreach($marques as $marque)
                                        <option value="{{ $marque->id_marque }}">{{ $marque->nom_marque }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Énergie</label>
                                <select name="energie" class="form-control controle select2">
                                    <option selected disabled>Sélectionner le type d'énergie</option>
                                    <option value="Essence">Essence</option>
                                    <option value="Diesel">Diesel</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                            </div>
                        </div>
                           <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date d'acquisition</label>
                                <input type="date" name="date_acquisition" class="form-control" required>
                            </div>
                        </div>
                        <!-- Ajoutez d'autres champs ici selon vos besoins -->

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Enregistrer le Véhicule</button>
                            <a href="javascript:void(0);" class="btn btn-cancel">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
