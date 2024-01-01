 @extends('layouts.master')
 @section('content')
 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-lg-3 col-sm-6 col-12">
                 <div class="dash-widget">
                     <div class="dash-widgetimg">
                     </div>

                 </div>
             </div>
             <div class="col-lg-3 col-sm-6 col-12">
                 <div class="dash-widget dash1">
                     <div class="dash-widgetimg">
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-sm-6 col-12">
                 <div class="dash-widget dash2">
                     <div class="dash-widgetimg">
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-sm-6 col-12">
                 <div class="dash-widget dash3">
                     <div class="dash-widgetimg">
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-sm-6 col-12 d-flex">
                 <div class="dash-count total-cvs">
                     <div class="dash-counts">
                         <h4>Total Véhicules</h4>
                         <ul>
                             <li class="h4 font-weight-bold text-center text-white">Total: {{$totalVehicules}} </li>

                         </ul>
                     </div>
                     <div class="dash-imgs">
                         <i data-feather="users"></i>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-sm-6 col-12 d-flex">
                 <div class="dash-count das1">
                     <div class="dash-counts">
                         <h4>En Mission</h4>
                         <ul>
                             <li li class="h4 font-weight-bold text-center text-white">Total: {{ $totalMissions }} </li>
                         </ul>
                     </div>
                     <div class="dash-imgs">
                         <i data-feather="user-check"></i>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-sm-6 col-12 d-flex">
                 <div class="dash-count das8">
                     <div class="dash-counts">
                         <h4>En Maintenance</h4>
                         <ul>
                             <li li class="h4 font-weight-bold text-center text-white">Total: {{$totalMaintenances}} </li>
                         </ul>
                     </div>
                     <div class="dash-imgs">
                         <i data-feather="file-text"></i>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-sm-6 col-12 d-flex">
                 <div class="dash-count das3">
                     <div class="dash-counts">
                         <h4>les Incidents</h4>
                         <ul>
                             <li li class="h4 font-weight-bold text-center text-white">Total: {{$totalIncidents}} </li>
                         </ul>
                     </div>
                     <div class="dash-imgs">
                         <i data-feather="file"></i>
                     </div>
                 </div>
             </div>
         </div>
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
 @endsection

