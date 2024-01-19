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
                    <h4>Liste des Incidents</h4>
                </div>
                <a href="{{ route('incidents.formulaire') }}" class="btn btn-primary">
                    Ajouter un Incident
                </a>
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
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export Excel" href="{{ route('export.excel') }}">
                            <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="Excel">
                        </a>
                    </li> 
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
                                    {{-- <th>ID</th> --}}
                                    <th>Véhicule</th>
                                    <th>Date de l'incident</th>
                                    <th>Gravité</th>
                                    {{-- <th>Dégât</th>
                                    <th>Causes</th>
                                    <th>Description</th> --}}
                                    {{-- <th>Fichiers</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($incidents as $incident)
                                        <tr class="odd">
                                    <td class="sorting_1">
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                       {{--  <td>{{ $incident->id_incident }}</td> --}}
                                        <td>{{ $incident->vehicule ? $incident->vehicule->immatriculation : 'NOT NULL'}}</td>
                                        <td>{{ $incident->date_incident }}</td>
                                        <td>{{ $incident->gravite }}</td>
                                        {{-- <td>{{ $incident->degat }}</td>
                                        <td>{{ $incident->causes }}</td>
                                        <td>{{ $incident->description }}</td> --}}
                                         {{-- <td>
                                            @if ($incident->fichiers)
                                                <img src="{{ asset('storage/' . $incident->fichiers) }}"  style="max-width: 100px;">
                                            @else
                                                Aucune image
                                            @endif
                                        </td> --}}
                                        <td>
                                            <a class="me-3" href="{{route('incidents.detail', ['id_incident' => $incident->id_incident])}}">
                                        <img src="{{asset('assets/img/icons/eye.svg')}}" alt="img">
                                    </a> 
                                    <a class="me-3" href="{{ route('incidents.edit', ['incident' => $incident->id_incident]) }}">
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a href="{{ route('incidents.destroy', ['incident' => $incident->id_incident]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ?'))
                                       document.getElementById('delete-incident-form-{{$incident->id_incident}}').submit();">
                                        <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                                    </a>
                                    <!-- Formulaire pour la suppression (à cacher par défaut) -->
                                    <form id="delete-incident-form-{{$incident->id_incident}}" action="{{ route('incidents.destroy', ['incident' => $incident->id_incident]) }}" method="POST" style="display: none;">
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
@endsection