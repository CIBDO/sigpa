 @extends('layouts.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Situation des Rapports </h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            <div class="tabs-set">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item" role="presentation">
                             <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" role="tab" aria-controls="purchase" aria-selected="true">Véhicules</button>
                         </li>
                         {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link" id="payment-tab" data-bs-toggle="tab" href="{{ route('rapport.maintenances') }}" role="tab" aria-controls="payment" aria-selected="false">Maintenances</a>
                        </li>

                         <li class="nav-item" role="presentation">
                             <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab" aria-controls="return" aria-selected="false">Missions</button>
                         </li> --}}
                     </ul>
                <div class="table-top">

            <!-- Ajoutez des éléments de filtrage ou d'autres fonctionnalités si nécessaire -->
            <div class="search-set">
                <div class="search-path">
                    <a class="btn btn-filter" id="filter_search">
                        <img src="{{asset('assets/img/icons/filter.svg')}}" alt="img">
                        <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset"><img src="{{asset('assets/img/icons/search-white.svg')}}" alt="img"></a>
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
                   
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="printList()"; return false;">
                            <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="Print">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <form action="{{ route('rapport.vehicules') }} " method="GET">
        <div class="row">
         <div class="col-lg-2 col-sm-6 col-12">
             <div class="form-group">
                 <div class="input-groupicon">
                     <label for="start_date">Date de début :</label>
                     <input type="date" name="start_date" class="form-control">
                     <div class="addonset">
                         
                     </div>
                 </div>
             </div>
         </div>
            <div class="col-lg-2 col-sm-6 col-12">
                        <div class="form-group">
                            <div class="input-groupicon">
                                <label for="end_date">Date de fin :</label>
                                <input type="date" name="end_date" class="form-control">
                                <div class="addonset">
                                    
                                </div>
                            </div>
                        </div>
            </div>

            <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                <div class="form-group">
                    <a class="btn btn-filters ms-auto"><img src="{{asset('assets/img/icons/search-whites.svg')}}" alt="img"></a>
                </div>
            </div>
        </div>
        </form> --}}

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
                                {{-- <th class="text-right">Action</th>  --}}
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
                                {{-- <td>
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
                                </td> --}}
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
</div>
@endsection
