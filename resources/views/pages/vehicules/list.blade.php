 @extends('layouts.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="page-wrapper">
    <div class="content">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        <div class="page-header">
            <div class="page-title">
                <h4>Liste des Véhicules</h4>
            </div>
             <a href="{{ route('vehicules.formulaire') }}" class="btn btn-primary">
                Ajouter un Véhicule
            </a>

            <!-- Ajouter le modal pour ajouter un véhicule ici -->

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
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export PDF" href="{{ route('export.pdf') }}">
                            <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="PDF">
                        </a>
                    </li>
                    {{-- <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export Excel" href="{{ route('export.excel') }}">
                            <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="Excel">
                        </a>
                    </li> --}}
                    <li>
                    {{-- <button class="btn btn-primary" id="printBtn">Imprimer</button> --}}
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="printList()"; return false;">
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
                                
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Utilité</th>
                                <th>Énergie</th>
                                <th>Immatriculation</th>
                                <th>Date d'Acquisition</th>
                                <th>État du Véhicule</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicules as $vehicule)
                            <tr class="odd">
                                <td class="sorting_1">
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>{{ $vehicule->marque ? $vehicule->marque->nom_marque : 'NOT NULL' }}</td>
                                <td>{{ $vehicule->modele ? $vehicule->modele->nom_modele : 'NOT NULL' }}</td>
                                {{-- <td>{{ $vehicule->marque->nom_marque }}</td>
                                <td>{{ $vehicule->modele->nom_modele }}</td> --}}
                                <td>{{ $vehicule->utilite }}</td>
                                <td>{{ $vehicule->energie }}</td>
                                <td>{{ $vehicule->immatriculation }}</td>
                                <td>{{ $vehicule->date_acquisition }}</td>
                                <td>{{ $vehicule->etat_vehicule }}</td>
                                <td>
                                    <!-- Ajoutez des liens d'action pour chaque véhicule -->
                                    <a class="me-3" href="{{route('vehicules.detail', ['vehicule' => $vehicule->id_vehicule])}}">
                                        <img src="{{asset('assets/img/icons/eye.svg')}}" alt="img">
                                    </a> 
                                    <a class="me-3" href="{{ route('vehicules.edit', ['vehicule' => $vehicule->id_vehicule]) }}">
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a href="{{ route('vehicules.destroy', ['vehicule' => $vehicule->id_vehicule]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce véhicule?'))
                                       document.getElementById('delete-vehicule-form-{{$vehicule->id_vehicule}}').submit();">
                                        <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                                    </a>
                                    <!-- Formulaire pour la suppression (à cacher par défaut) -->
                                    <form id="delete-vehicule-form-{{$vehicule->id_vehicule}}" action="{{ route('vehicules.destroy', ['vehicule' => $vehicule->id_vehicule]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Ajoutez d'autres actions si nécessaire -->
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
@endsection
