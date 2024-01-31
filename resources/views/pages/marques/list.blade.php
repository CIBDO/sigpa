 @extends('layouts.master')
 @section('content')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <div class="page-wrapper"> 
     <div class="content">
         <div class="page-header">
             <div class="page-title">
                 <h4>Liste des marques </h4>
             </div>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouterMarqueModal">
                 Ajouter une Marque
             </button>
             <div class="modal fade" id="ajouterMarqueModal" tabindex="-1" aria-labelledby="ajouterMarqueModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="ajouterMarqueModalLabel">Ajouter une Marque</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <form action="{{ route('marques.store') }}" method="post" id="ajouterMarqueForm">
                                 @csrf

                                 <div class="mb-3">
                                     <label for="nom_marque" class="form-label">Nom de la Marque:<span class="required">*</span></label>
                                     <input type="text" class="form-control" name="nom_marque" required>
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
                         var nomMarque = $("input[name='nom_marque']").val();
                         if (!nomMarque.trim()) {
                             alert("Veuillez entrer le nom de la marque.");
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
                    {{-- <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export PDF" href="{{ route('export.pdf') }}">
                            <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="PDF">
                        </a>
                    </li> --}}
                     <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Export Excel" href="{{ route('export-marques') }}">
                            <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="Excel">
                        </a>
                    </li> 
                    <li>
                   
                        <!-- Dans votre fichier de vue Blade -->
                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" onclick="window.print(); return false;">
                            <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="Print">
                        </a>

                    </li>
                </ul>
            </div>


        </div>

        <div class="table-responsive">
            <table class="table datanew">
                <thead >
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        {{-- <th>Numéro</th> --}}
                        <th>Nom de la Marque</th>
                        <!-- Ajoutez d'autres colonnes au besoin -->
                        <th class="text-rigth">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marques as $marque)
                    <tr class="odd">
                        <td class="sorting_1">
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        {{-- <td>{{$marque->id_marque}}</td> --}}
                        <td>{{$marque->nom_marque}}</td>
                        <!-- Ajoutez d'autres cellules de données au besoin -->
                        <td>
                            <!-- Ajoutez des liens d'action pour chaque marque -->
                           {{--  <a class="me-3" href="{{route('marques.detail', ['marque' => $marque->id_marque])}}">
                                <img src="{{asset('assets/img/icons/eye.svg')}}" alt="img">
                            </a> --}}
                            <a class="me-3" href="{{route('marques.edit', ['marque' => $marque->id_marque])}}">
                                <img src="{{asset('assets/img/icons/edit.svg')}}" alt="img">
                            </a>
                            <a href="{{ route('marques.destroy', ['marque' => $marque->id_marque]) }}" class="" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cette marque?'))
                                       document.getElementById('delete-marque-form-{{$marque->id_marque}}').submit();">
                                <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                            </a>
                            <!-- Formulaire pour la suppression (à cacher par défaut) -->
                            <form id="delete-marque-form-{{$marque->id_marque}}" action="{{ route('marques.destroy', ['marque' => $marque->id_marque]) }}" method="POST" style="display: none;">
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
 <script>
    function printList() {
        window.print();
    }
</script>

 @endsection

