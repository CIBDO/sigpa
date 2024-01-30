@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <a href="{{ route('maintenances.formulaire') }}">
                    <button class="btn btn-primary" onclick="window.location='{{ route("maintenances.formulaire") }}'">
                    <h4>Ajouter Nouvelle</h4>
                </button>
            </div>
        </div>

        <!-- Affichage de la liste des maintenances -->
        <div class="card mt-4">
            <div class="card-body">
            <div class="table-top">
            {{-- <div class="search-set">
                <div class="search-path">
                    <a class="btn btn-filter" id="filter_search">
                        <img src="assets/img/icons/filter.svg" alt="img">
                        <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                </div>
            </div> --}}
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
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Véhicule</th>
                            {{-- <th>Prestataire</th>
                            <th>Numéro Facture</th>
                            <th>Coût</th>  --}}
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Type maintenance</th>
                            {{-- <th>Travaux</th> --}} 
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($maintenances as $maintenance)
                        <tr>
                            <td>{{ $maintenance->vehicule->immatriculation }}</td>
                            {{-- <td>{{ $maintenance->prestataire->nom_prestataire }}</td>
                            <td>{{ $maintenance->numero_facture }}</td>
                            <td>{{ $maintenance->cout }}</td>  --}}
                            <td>{{ $maintenance->date_debut }}</td>
                            <td>{{ $maintenance->date_fin }}</td>
                            <td>{{ $maintenance->type}}</td>
                            {{-- <td>{{ $maintenance->travaux }}</td>  --}}
                            <td>{{ $maintenance->statut }}</td>
                              <td>
                                    <!-- Ajoutez des liens d'action pour chaque véhicule -->
                                    <a class="me-3" href="{{route('maintenances.detail', ['maintenance' => $maintenance->id_maintenance])}}">
                                        <img src="{{asset('assets/img/icons/eye.svg')}}" alt="img">
                                    </a> 
                                    <a class="me-3" href="{{ route('maintenances.edit', ['maintenance' => $maintenance->id_maintenance]) }}">
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a href="{{ route('maintenances.destroy', ['maintenance' => $maintenance->id_maintenance]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cette maintenance?'))
                                       document.getElementById('delete-marque-form-{{$maintenance->id_maintenance}}').submit();">
                                        <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                                    </a>
                                    <!-- Formulaire pour la suppression (à cacher par défaut) -->
                                    <form id="delete-marque-form-{{$maintenance->id_maintenance}}" action="{{ route('maintenances.destroy', ['maintenance' => $maintenance->id_maintenance]) }}" method="POST" style="display: none;">
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
@endsection
