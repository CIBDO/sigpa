@extends('layouts.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Liste des Chauffeurs</h4>
            </div>
             <a href="{{ route('chauffeurs.formulaire') }}" class="btn btn-primary">
                Ajouter un Chauffeur
            </a>

            <!-- Ajouter le modal pour ajouter un chauffeur ici -->

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
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="printList(); return false;">
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
                                
                                <th>Matricule</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                {{-- <th>Date de Naissance</th>
                                <th>Genre</th>
                                <th>Email</th>
                                <th>Téléphone</th> --}}
                                {{-- <th>Numéro de Permis</th> --}}
                                <th>Catégorie de Permis</th>
                                <th>Validité du Permis</th>
                                {{-- <th>Service</th> --}}
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chauffeurs as $chauffeur)
                            <tr class="odd">
                                <td class="sorting_1">
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>{{ $chauffeur->matricule }}</td>
                                <td>{{ $chauffeur->nom }}</td>
                                <td>{{ $chauffeur->prenom }}</td>
                               {{--  <td>{{ $chauffeur->date_naiss }}</td>
                                <td>{{ $chauffeur->genre }}</td>
                                <td>{{ $chauffeur->email }}</td>
                                <td>{{ $chauffeur->telephone }}</td>
                                <td>{{ $chauffeur->numero_permis }}</td> --}}
                                <td>{{ $chauffeur->categorie_permis }}</td>
                                <td>{{ $chauffeur->validite_permis }}</td>
                                {{-- <td>{{ $chauffeur->service ? $chauffeur->service->nom_service : 'NOT NULL' }}</td> --}}
                                <td>
                                    <!-- Ajoutez des liens d'action pour chaque chauffeur -->
                                    <a class="me-3" href="{{ route('chauffeurs.detail', ['chauffeur' => $chauffeur->id_chauffeur]) }}">
                                        <img src="{{asset('assets/img/icons/eye.svg')}}" alt="img">
                                    </a> 
                                    <a class="me-3" href="{{ route('chauffeurs.edit', ['chauffeur' => $chauffeur->id_chauffeur]) }}">
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a href="{{ route('chauffeurs.destroy', ['chauffeur' => $chauffeur->id_chauffeur]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur?'))
                                       document.getElementById('delete-chauffeur-form-{{$chauffeur->id_chauffeur}}').submit();">
                                        <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                                    </a>
                                    <!-- Formulaire pour la suppression (à cacher par défaut) -->
                                    <form id="delete-chauffeur-form-{{$chauffeur->id_chauffeur}}" action="{{ route('chauffeurs.destroy', ['chauffeur' => $chauffeur->id_chauffeur]) }}" method="POST" style="display: none;">
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
