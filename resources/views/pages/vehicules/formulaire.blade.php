 @extends('layouts.master')

 @section('content')
 <div class="page-wrapper">
     <div class="content">
         <div class="page-header">
             <div class="page-title">
                 <h4>Ajouter un véhicule</h4>
             </div>
         </div>

         <div class="card">
             <div class="card-body">
                 <form action="{{ route('vehicules.store') }}" method="post" enctype="multipart/form-data">
                     @csrf

                     <div class="row">
                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Immatriculation <span class="required">*</span></label>
                                 <input type="text" name="immatriculation" class="form-control" required>
                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Date Immatriculation <span class="required">*</span></label>
                                 <input type="date" name="date_immatriculation" class="form-control" required>
                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>État du Véhicule <span class="required">*</span></label>
                                 <select id="etat_vehicule" name="etat_vehicule" class="form-control controle select2" onchange="highlightSelection()">
                                     <option selected disabled>Sélectionner l'état du véhicule</option>
                                     <option value="Neuf">Neuf</option>
                                     <option value="Bon">Bon</option>
                                     <option value="Moyen">Moyen</option>
                                     <option value="Mauvais">Mauvais</option>
                                 </select>

                                 <script>
                                     function highlightSelectionEtatVehicule() {
                                         var selectElement = document.getElementById("etat_vehicule");

                                         // Vérifier si l'élément a été trouvé
                                         if (selectElement) {
                                             var selectedOption = selectElement.options[selectElement.selectedIndex];

                                             // Supprimer la classe de surbrillance de toutes les options
                                             for (var i = 0; i < selectElement.options.length; i++) {
                                                 selectElement.options[i].classList.remove("selected-highlight-green", "selected-highlight-red");
                                             }

                                             // Ajouter la classe de surbrillance en fonction de la valeur sélectionnée
                                             if (selectedOption.value === "Neuf" || selectedOption.value === "Bon") {
                                                 selectedOption.classList.add("selected-highlight-green");
                                             } else if (selectedOption.value === "Mauvais") {
                                                 selectedOption.classList.add("selected-highlight-red");
                                             }
                                         } else {
                                             console.error("L'élément avec l'ID 'etat_vehicule' n'a pas été trouvé.");
                                         }
                                     }

                                 </script>

                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Numéro de Châssis <span class="required">*</span></label>
                                 <input type="text" name="numero_chasis" class="form-control" required>
                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Date de mise en Circulation <span class="required">*</span></label>
                                 <input type="date" name="date_circulation" class="form-control" required>
                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Utilité <span class="required">*</span></label>
                                 <select name="utilite" class="form-control controle select2">
                                     <option selected disabled>Sélectionner l'utilité</option>
                                     <option value="Service">Service</option>
                                     <option value="Mission">Mission</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Statut <span class="required">*</span></label>
                                 <select name="statut" class="form-control controle select2" onchange="highlightSelectionStatut()">
                                     <option selected disabled>Sélectionner le statut</option>
                                     <option value="Actif">Actif</option>
                                     <option value="Inactif">Inactif</option>
                                 </select>
                                 <script>
                                     function highlightSelectionStatut() {
                                         var selectElement = document.getElementById("statut");

                                         // Vérifier si l'élément a été trouvé
                                         if (selectElement) {
                                             var selectedOption = selectElement.options[selectElement.selectedIndex];

                                             // Supprimer la classe de surbrillance de toutes les options
                                             for (var i = 0; i < selectElement.options.length; i++) {
                                                 selectElement.options[i].classList.remove("selected-highlight-green", "selected-highlight-red");
                                             }

                                             // Ajouter la classe de surbrillance en fonction de la valeur sélectionnée
                                             if (selectedOption.value === "Actif") {
                                                 selectedOption.classList.add("selected-highlight-green");
                                             } else if (selectedOption.value === "Inactif") {
                                                 selectedOption.classList.add("selected-highlight-red");
                                             }
                                         } else {
                                             console.error("L'élément avec l'ID 'statut' n'a pas été trouvé.");
                                         }
                                     }

                                 </script>


                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Modèle <span class="required">*</span></label>
                                 <select name="id_modele" class="form-control controle select2">
                                     <option selected disabled>Sélectionner le modèle</option>
                                     @foreach($modeles as $modele)
                                     <option value="{{ $modele->id_modele }}">{{ $modele->nom_modele }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Marque <span class="required">*</span></label>
                                 <select name="id_marque" class="form-control select2 ">
                                     <option selected disabled>Sélectionner la marque</option>
                                     @foreach($marques as $marque)
                                     <option value="{{ $marque->id_marque }}">{{ $marque->nom_marque }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>

                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Énergie <span class="required">*</span></label>
                                 <select name="energie" class="form-control controle select2">
                                     <option selected disabled>Sélectionner le type d'énergie</option>
                                     <option value="Essence">Essence</option>
                                     <option value="Diesel">Diesel</option>
                                     <!-- Ajoutez d'autres options selon vos besoins -->
                                 </select>
                             </div>
                         </div>
                         <div class="col-lg-3 col-sm-6 col-12">
                             <div class="form-group">
                                 <label>Date d'acquisition <span class="required">*</span></label>
                                 <input type="date" name="date_acquisition" class="form-control" required>
                             </div>
                         </div>
                         <!-- Ajoutez d'autres champs ici selon vos besoins -->

                         <div class="col-lg-12">
                             <button type="submit" class="btn btn-submit me-2">Enregistrer le Véhicule</button>
                             <a href="{{ route('vehicules.list') }}" class="btn btn-cancel">Annuler</a>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 @endsection

                        