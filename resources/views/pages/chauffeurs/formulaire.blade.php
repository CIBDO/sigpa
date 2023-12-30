@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="content">
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
                                <label>Matricule</label>
                                <input type="text" name="matricule" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="nom" required>
                            </div>
                        </div>
                     <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" name="prenom" required>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date de Naissance</label>
                                <input type="date" name="date_naiss" required>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Genre</label>
                                <input type="text" name="genre" required>
                                {{-- <select class="select" name="genre" required>
                                    <option value="male">M</option>
                                    <option value="female">F</option>
                                </select> --}}
                            </div>
                        </div> 
                       <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" required>
                            </div>
                        </div> 
                         <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="text" name="telephone" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Numéro de Permis</label>
                                <input type="text" name="numero_permis" required>
                            </div>
                        </div> 
                         <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Catégorie de Permis</label>
                                <input type="text" name="categorie_permis" required>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Validité du Permis</label>
                                <input type="date" name="validite_permis" required>
                            </div>
                        </div> 
                       
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Service</label>
                                <select name="id_service" class="form-control controle select2" >
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
