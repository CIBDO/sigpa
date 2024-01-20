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
                <h4>Liste des bons </h4>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterBonModal">
                Ajouter un Bon
            </button>

            <div class="modal fade" id="ajouterBonModal" tabindex="-1" aria-labelledby="ajouterBonModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id_bon="ajouterBonModalLabel">Ajouter un Bon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('bons.store') }}" method="post" id_bon="ajouterBonForm">
                                @csrf

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
                                    <label for="numero_bon" class="form-label">Numéro de Bon:<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="numero_bon" required>
                                </div>

                                <div class="mb-3">
                                    <label for="date_delivrance" class="form-label">Date de Délivrance:<span class="required">*</span></label>
                                    <input type="date" class="form-control" name="date_delivrance" required>
                                </div>

                                <div class="mb-3">
                                    <label for="quantite" class="form-label">Quantité:<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="quantite" required>
                                </div>

                                <div class="mb-3">
                                    <label for="valeur_espece" class="form-label">Valeur en Espèces:<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="valeur_espece" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    $("#ajouterBonForm").submit(function(event) {
                        var idVehicule = $("select[name='id_vehicule']").val();
                        var numeroBon = $("input[name='numero_bon']").val();
                        var dateDelivrance = $("input[name='date_delivrance']").val();
                        var quantite = $("input[name='quantite']").val();
                        var valeurEspece = $("input[name='valeur_espece']").val();

                        if (idVehicule === 'Choose Vehicule' || !numeroBon.trim() || !dateDelivrance.trim() || !quantite.trim() || !valeurEspece.trim()) {
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
                    
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="printList()"; return false;">
                            <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="Print">
                        </a>
                    </li>
                </ul>
            </div>


        </div>
        <div class="table-responsive">
            <table class="table" >
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Véhicule</th>
                        <th>Numéro de Bon</th>                   
                        <th>Date Délivrance</th>
                        <th>Quantité</th>                        
                        <th class="text-rigth">Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($bons as $bon)
                        <tr class="odd">
                            <td class="sorting_1">
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td>{{ $bon->vehicule->immatriculation }}</td>
                            <td>{{ $bon->numero_bon }}</td>
                            <td>{{ $bon->date_delivrance }}</td>
                            <td>{{ $bon->quantite }}</td>
                           {{--  <td>{{ $bon->valeur_espece }}</td> --}}
                            <td>
                                <a class="me-3" href="{{ route('bons.edit', ['bon' => $bon->id_bon]) }}">
                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                                <a href="{{ route('bons.destroy', ['bon' => $bon->id_bon]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce bon?'))
                                        document.getElementById('delete-bon-form-{{$bon->id_bon}}').submit();">
                                    <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                </a>
                                <form id_bon="delete-bon-form-{{$bon->id_bon}}" action="{{ route('bons.destroy', ['bon' => $bon->id_bon]) }}" method="POST" style="display: none;">
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
@endsection
