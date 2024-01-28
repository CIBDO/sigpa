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
                 <h4>Liste des services </h4>
             </div>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterMarqueModal">
                 Ajouter un service
             </button>
             <div class="modal fade" id="ajouterMarqueModal" tabindex="-1" aria-labelledby="ajouterMarqueModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="ajouterMarqueModalLabel">Ajouter un service</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <form action="{{ route('services.store') }}" method="post" id="ajouterMarqueForm">
                                 @csrf

                                 <div class="mb-3">
                                     <label for="nom_service" class="form-label">Nom du service:<span class="required">*</span></label>
                                     <input type="text" class="form-control" name="nom_service" required>
                                     <label for="description" class="form-label">description:<span class="required">*</span></label>
                                     <input type="text" class="form-control" name="description" >
                                 </div>

                                 <button type="submit" class="btn btn-primary">Ajouter</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div> 

             <!-- Ajout de script pour la validation (si nécessaire) -->
             <script>
                 document.addEventListener("DOMContentLoaded", function() {
                     $("#ajouterMarqueForm").submit(function(event) {
                         var nomService = $("input[name='nom_service']").val();
                         if (!nomService.trim()) {
                             alert("Veuillez entrer le nom du service.");
                             event.preventDefault();
                         }
                     });
                 });
                 document.addEventListener("DOMContentLoaded", function() {
                     $("#ajouterMarqueForm").submit(function(event) {
                         var nomService = $("input[name='description']").val();
                         if (!nomService.trim()) {
                             alert("Veuillez entrer la description du service.");
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
            <table class="table datanew">
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        
                        <th>Nom Service</th>
                        <th>Description</th>
                        <!-- Ajoutez d'autres colonnes au besoin -->
                        <th class="text-rigth">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr class="odd">
                        <td class="sorting_1">
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        
                        <td>{{$service->nom_service}}</td>
                        <td>{{$service->description}}</td>
                        <!-- Ajoutez d'autres cellules de données au besoin -->
                        <td>
                            <!-- Ajoutez des liens d'action pour chaque marque -->
                           {{--  <a class="me-3" href="{{route('marques.detail', ['marque' => $marque->id_marque])}}">
                                <img src="{{asset('assets/img/icons/eye.svg')}}" alt="img">
                            </a> --}}
                            <a class="me-3" href="{{route('services.edit', ['service' => $service->id_service])}}">
                                <img src="{{asset('assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a href="{{ route('services.destroy', ['service' => $service->id_service]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce service?'))
                                       document.getElementById('delete-marque-form-{{$service->id_service}}').submit();">
                                <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                            <!-- Formulaire pour la suppression (à cacher par défaut) -->
                            <form id="delete-marque-form-{{$service->id_service}}" action="{{ route('services.destroy', ['service' => $service->id_service]) }}" method="POST" style="display: none;">
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