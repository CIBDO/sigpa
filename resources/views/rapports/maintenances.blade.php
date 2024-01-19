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
                            
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
