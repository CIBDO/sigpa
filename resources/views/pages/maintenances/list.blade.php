@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
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
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Véhicule</th>
                            {{-- <th>Prestataire</th>
                            <th>Numéro Facture</th>
                            <th>Coût</th> --}}
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Type maintenance</th>
                            <th>Travaux</th>
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
                            <td>{{ $maintenance->cout }}</td> --}}
                            <td>{{ $maintenance->date_debut }}</td>
                            <td>{{ $maintenance->date_fin }}</td>
                            <td>{{ optional($maintenance->typeMaintenance)->type_maintenance }}</td>
                            <td>{{ $maintenance->travaux }}</td>
                            <td>{{ $maintenance->statut }}</td>
                            <td>
            <a href="{{ route('maintenances.edit', ['maintenance' => $maintenance->id_maintenance]) }}" class="btn btn-sm btn-warning">Éditer</a>
            
            <!-- Bouton de suppression -->
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $maintenance->id_maintanance }}">
                Supprimer
            </button>

            <!-- Modal de confirmation de suppression -->
            <div class="modal fade" id="deleteModal{{ $maintenance->id_maintenance }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $maintenance->id_maintenance }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $maintenance->id_maintenance }}">Confirmer la suppression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir supprimer cette maintenance ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form method="post" action="{{ route('maintenances.destroy', ['maintenance' => $maintenance->id_maintenance]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                            </form>
                        </div>
                                    </div>
                                </div>
                            </div>
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
