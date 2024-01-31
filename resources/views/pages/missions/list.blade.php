@extends('layouts.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
             <div class="page-title">
                 <h4>Liste des missions </h4>
             </div>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterMissionModal">
    Ajouter une Mission
</button>
        <div class="modal fade" id="ajouterMissionModal" tabindex="-1" aria-labelledby="ajouterMissionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ajouterMissionModalLabel">Ajouter une Mission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('missions.store') }}" method="post" id="ajouterMissionForm">
                            @csrf

                            <!-- Ajoutez tous les champs de la mission ici -->
                            <div class="mb-3">
                                <label for="numero_mission" class="form-label">Numéro de Mission:<span class="required">*</span></label>
                                <input type="text" class="form-control" name="numero_mission" required>
                            </div>

                            <div class="mb-3">
                                <label for="objectif" class="form-label">Objectif:<span class="required">*</span></label>
                                <input type="text" class="form-control" name="objectif" required>
                            </div>

                            <div class="mb-3">
                                <label for="date_debut" class="form-label">Date de Début:<span class="required">*</span></label>
                                <input type="date" class="form-control" name="date_debut" required>
                            </div>

                            <div class="mb-3">
                                <label for="date_fin" class="form-label">Date de Fin:<span class="required">*</span></label>
                                <input type="date" class="form-control" name="date_fin" required>
                            </div>

                            <div class="mb-3">
                                <label for="trajet" class="form-label">Trajet:<span class="required">*</span></label>
                                <textarea class="form-control" name="trajet" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="id_vehicule" class="form-label">Véhicule:<span class="required">*</span></label>
                                <select class="form-control" name="id_vehicule" required>
                                <option selected disabled>Sélectionner le Véhicule</option>
                                    @foreach($véhicules as $vehicule)
                                    <option value="{{ $vehicule->id_vehicule }}">{{ $vehicule->immatriculation }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- Confirmation Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="confirmationModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmer les détails de la mission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('missions.confirmation')}}" method="post" id="confirmationForm">
                                @csrf
                                <input type="hidden" id="missionId" name="missionId" value="">
                                <div class="form-group">
                                    <label for="vehicleKilometrage">Kilométrage du véhicule</label>
                                    <input name="kilometrage" type="text" class="form-control" id="vehicleKilometrage" placeholder="Entrer le kilométrage du véhicule">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Confirmer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                $("#ajouterMissionForm").submit(function(event) {
                    // Ajoutez la validation du formulaire ici
                    var numeroMission = $("input[name='numero_mission']").val();
                    var objectif = $("input[name='objectif']").val();
                    var dateDebut = $("input[name='date_debut']").val();
                    var dateFin = $("input[name='date_fin']").val();
                    var trajet = $("textarea[name='trajet']").val();
                    var idVehicule = $("select[name='id_vehicule']").val();

                    if (!numeroMission.trim() || !objectif.trim() || !dateDebut.trim() || !dateFin.trim() || !trajet.trim() || idVehicule === 'Choose Vehicule') {
                        alert("Veuillez remplir tous les champs du formulaire.");
                        event.preventDefault();
                    }
                });
            });

        </script>
         </div>
          <div class="card">
    <div class="card-body">
        <div class="table-top">
            <!-- Ajoutez des éléments de filtrage ou d'autres fonctionnalités si nécessaire -->
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
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export PDF" href="{{ route('export.pdf') }}">
                            <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="PDF">
                        </a>
                    </li> --}}
                     <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export Excel" href="{{ route('export-missions') }}">
                            <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="Excel">
                        </a>
                    </li>
                    <li>
                    {{-- <button class="btn btn-primary" id="printBtn">Imprimer</button> --}}
                        <a class="no-print" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="window.print(); return false;">
                                <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="Print">
                        </a>
                    </li>
                </ul>
            </div>


        </div>
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
                        <th>Numéro de Mission</th>
                        {{-- <th>Objectif</th> --}}
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Véhicule</th>
                        <th>Kilométrage sur le compteur</th>
                        {{-- <th>Trajet</th>
                        <th>Véhicule</th> --}}
                        <!-- Ajoutez d'autres colonnes au besoin -->
                        <th class="text-rigth">Action</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($missions as $mission)
                    <tr class="odd">
                        <td class="sorting_1">
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>{{ $mission->numero_mission }}</td>
                        {{-- <td>{{ $mission->objectif }}</td> --}}
                        <td>{{ $mission->date_debut }}</td>
                        <td>{{ $mission->date_fin }}</td>
                        <td>{{ $mission->vehicule->immatriculation }}</td>
                        <td>{{ $mission->kilometrage }} Km</td>
                       {{--  <td>{{ $mission->trajet }}</td>--}}
                        <!-- Ajoutez d'autres cellules de données au besoin -->
                        <td>
                            <!-- Ajoutez des liens d'action pour chaque mission -->
                            {{-- <a class="me-3" href="{{ route('missions.detail', ['mission' => $mission->id_mission]) }}">
                            <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                            </a> --}}
                            @if(!$mission->kilometrage)

                                <a class="me-3" href="{{ route('missions.edit', ['mission' => $mission->id_mission]) }}">
                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                                <a href="{{ route('missions.destroy', ['mission' => $mission->id_mission]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cette mission?'))
                                    document.getElementById('delete-mission-form-{{$mission->id_mission}}').submit();">
                                    <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                </a>
                                <!-- Formulaire pour la suppression (à cacher par défaut) -->
                                <form id="delete-mission-form-{{$mission->id_mission}}" action="{{ route('missions.destroy', ['mission' => $mission->id_mission]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button data-id="{{$mission->id_mission}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmationModal">
                                    <i class="fa fa-check-circle"></i> Confirmer
                                </button>
                            @else
                                <i class="fa fa-check-circle text-green"></i>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--        ecris un tableau--}}

@endsection
@section('add-script')
            <script>
                $(document).ready(function() {
                    $('button[data-target="#confirmationModal"]').click(function() {
                        let missionId = $(this).data('id');
                        $('#missionId').val(missionId);

                        // Ensuite, déclenchez le modal
                        // $("#confirmationModal").modal("show");
                    });
                    $('#confirmationModal .btn-primary').click(function() {
                        $('#confirmationForm').submit();
                    });
                });

            </script>
    <script>
    function printList() {
        window.print();
    }
</script>
@endsection

