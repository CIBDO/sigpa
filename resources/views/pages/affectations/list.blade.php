@extends('layouts.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Liste des affectations </h4>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterAffectationModal">
                    Ajouter une Affectation
                </button>
                <div class="modal fade" id="ajouterAffectationModal" tabindex="-1" aria-labelledby="ajouterAffectationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajouterAffectationModalLabel">Ajouter une Affectation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('affectations.store') }}" method="post" id="ajouterAffectationForm">
                                    @csrf

                                    <!-- Ajoutez tous les champs de l'affectation ici -->
                                    <div class="mb-3">
                                <label for="id_service" class="form-label">Service: <span class="required">*</span></label>
                                <select class="form-control" name="id_service" required>
                                <option selected disabled>Sélectionner le service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id_service }}">{{ $service->nom_service }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_modele" class="form-label">Modèle:<span class="required">*</span></label>
                                <select class="form-control" name="id_modele" required>
                                <option selected disabled>Sélectionner le modèle</option>
                                    @foreach($modeles as $modele)
                                        <option value="{{ $modele->id_modele }}">{{ $modele->nom_modele }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_marque" class="form-label">Marque:<span class="required">*</span></label>
                                <select class="form-control" name="id_marque" required>
                                <option selected disabled>Sélectionner la marque  </option>
                                    @foreach($marques as $marque)
                                        <option value="{{ $marque->id_marque }}">{{ $marque->nom_marque }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_vehicule" class="form-label">Véhicule:<span class="required">*</span></label>
                                <select class="form-control" name="id_vehicule" required>
                                <option selected disabled>Sélectionner le Véhicule</option>
                                    @foreach($vehicules as $vehicule)
                                        <option value="{{ $vehicule->id_vehicule }}">{{ $vehicule->immatriculation }}</option>
                                    @endforeach
                                </select>
                            </div>

                                    <div class="mb-3">
                                        <label for="date_affectation" class="form-label">Date d'affectation:<span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_affectation" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Statut <span class="required">*</span></label>
                                <select name="statut" class="form-control controle select2">
                                    <option selected disabled>Sélectionner le statut</option>
                                    <option value="Neuf">Neuf</option>
                                    <option value="Bon">Bon</option>
                                    <option value="Pas Bon">Pas Bon</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Script pour la validation (si nécessaire) -->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        $("#ajouterAffectationForm").submit(function (event) {
                           var nomMarque = $("input[name='nom_vehicule']").val();
                         if (!nomMarque.trim()) {
                             alert("Veuillez entrer le nom du vehicule.");
                             event.preventDefault();
                         }
                        });
                    });
                </script>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="assets/img/icons/filter.svg" alt="img">
                                    <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                {{-- <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export PDF" href="{{ route('') }}">
                                        <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="PDF">
                                    </a>
                                </li> --}}
                                <li>
                          <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export Excel" href="{{ route('export-affectations') }}">
                                <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="Excel">
                                </a>
                                </li> 
                                <li>                          
                                    <a class="no-print" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="window.print(); return false;">
                                        <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="Print">
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>
              
                <div class="affectations-container">
                   <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                    <tr>
                                        <th>
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th>Service</th>
                                        <th>Modèle</th>
                                        <th>Marque</th>
                                        <th>Immatriculation</th>
                                        <th>Date d'affectation</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach($affectations as $affectation)
                                <tr class="odd">
                                    <td class="sorting_1">
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{ $affectation->service->nom_service }}</td>
                                    <td>{{ $affectation->modele->nom_modele }}</td>
                                    <td>{{ $affectation->marque->nom_marque }}</td>
                                    <td>{{ $affectation->vehicule->immatriculation }}</td>
                                    <td>{{ $affectation->date_affectation }}</td>
                                    <td>{{ $affectation->statut }}</td>
                                    <!-- Ajoutez d'autres cellules de données au besoin -->
                                    <td>
                                        <!-- Ajoutez des liens d'action pour chaque affectation -->
                                        {{-- <a class="me-3" href="{{ route('affectations.detail', ['affectation' => $affectation->id_affectation]) }}">
                                            <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                                        </a> --}}
                                       
                                         <button type="button" class="btn btn-primary edit-affectation-btn" data-id="{{ $affectation->id_affectation }}">
                                            <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="Modifier">
                                        </button>
                                        
                                       {{--  <a class="me-3" href="{{route('affectations.edit', ['affectation' => $affectation->id_affectation]) }}">
                                            <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                        </a> --}}
                                        <a href="{{ route('affectations.destroy', ['affectation' => $affectation->id_affectation]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cette affectation?'))
                                            document.getElementById('delete-affectation-form-{{$affectation->id_affectation}}').submit();">
                                            <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                        </a>
                                        <!-- Formulaire pour la suppression (à cacher par défaut) -->
                                        <form id="delete-affectation-form-{{$affectation->id_affectation}}" action="{{ route('affectations.destroy', ['affectation' => $affectation->id_affectation]) }}" method="POST" style="display: none;">
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
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function () {
        // Utilisation de la délégation d'événements
        $(".affectations-container").on("click", ".edit-affectation-btn", function () {
            // Récupérer l'ID de l'affectation à éditer depuis l'attribut data-id
            var affectationId = $(this).data("id");

            // Rediriger vers la page d'édition avec l'ID de l'affectation
            window.location.href = "/affectations/edit/" + affectationId;
        });
    });
</script>
<script>
    function printList() {
        window.print();
    }
</script>
@endsection
