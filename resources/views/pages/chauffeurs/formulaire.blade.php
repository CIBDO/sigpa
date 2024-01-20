@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="content">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        <div class="page-header">
            <div class="page-title">
                <h4>Ajouter un Chauffeur</h4>

            </div>
        </div>

        <div class="card">
            <div class="card-body"> 
                <form action="{{ route('chauffeurs.store') }}" method="post">
                    @csrf

                     <div class="row"> 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Matricule <span class="required">*</span></label>
                                <input type="text" name="matricule" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Nom <span class="required">*</span></label>
                                <input type="text" name="nom" required>
                            </div>
                        </div>
                     <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Prénom <span class="required">*</span></label>
                                <input type="text" name="prenom" required>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date de Naissance <span class="required">*</span></label>
                                <input type="date" name="date_naiss" class="form-control" required>
                            </div>
                        </div> 
                         <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sexe <span class="required">*</span></label>
                                <select name="genre" class="form-control controle select2">
                                    <option selected disabled>Sélectionner le Sexe</option>
                                    <option value="Masculin">M</option>
                                    <option value="Feminin">F</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                            </div>
                        </div>
                       <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input type="text" name="email" required>
                            </div>
                        </div> 
                         <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Téléphone <span class="required">*</span></label>
                                <input type="text" name="telephone" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Numéro de Permis<span class="required">*</span></label>
                                <input type="text" name="numero_permis" required>
                            </div>
                        </div> 
                         <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Catégorie de Permis <span class="required">*</span></label>
                                <select name="categorie_permis" class="form-control controle select2">
                                <option selected disabled>Sélectionner la Catégorie</option>
                                <option value="A">A1</option>
                                 <option value="AA">A2</option>
                                 <option value="B">B</option>
                                 <option value="C">C</option>
                                 <option value="E">E</option>
                                 <option value="F">F</option>
                                 </select>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Validité du Permis</label>
                                <input type="date" name="validite_permis" class="form-control" required>
                            </div>
                        </div> 
                       
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choisir Service <span class="required">*</span></label>
                                <select name="id_service" class="form-control controle select2" >
                                <option selected disabled>Sélectionner le Service</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id_service }}">{{ $service->nom_service }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Enregistrer</button>
                            <a href="{{ route('chauffeurs.formulaire') }}" class="btn btn-cancel">Quitter</a>
                        </div>
                    </div> 
                </form>
            </div>
        </div> 
    </div>
</div>

@endsection
