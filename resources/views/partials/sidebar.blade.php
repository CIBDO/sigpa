 <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{ route('home') }}"><img src="{{asset('assets/img/icons/menu.svg')}}" alt="img"><span>Menu</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/marque.svg')}}" alt="img"><span>Marque</span> <span class="menu-arrow"></span></a>
                            <ul>
                               <li><a href="{{route('marques.list')}}">Voir marques</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/modele.svg')}}" alt="img"><span>Modèle</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('modeles.list')}}">Voir modèles</a></li>
                    
                            </ul>
                        </li>
                         <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/service.svg')}}" alt="img"><span>Services</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('services.list')}}">Voir services </a></li>
                               
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/vehicule.svg')}}" alt="img"><span>Gestion Vehicules</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('vehicules.list')}}">Liste des Vehicules</a></li>
                                <li><a href="{{route('vehicules.formulaire')}}">Ajouter un Vehicule</a></li>
                
                            </ul>
                        </li>
                       
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/affectation.svg')}}" alt="img"><span> Affectations</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('affectations.list')}}">Créer Affectation</a></li>
                               {{--  <li><a href="addpurchase.html">Créer Affectation</a></li> --}}
                                {{-- <li><a href="importpurchase.html">Import Purchase</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/mission.svg')}}" alt="img"><span> Mission</span> <span class="menu-arrow"></span></a>
                            <ul>
                                {{-- <li><a href="expenselist.html">Détails Mission </a></li> --}}
                                <li><a href="{{route('missions.list')}}">Détails mission</a></li>
                                {{-- <li><a href="expensecategory.html">Expense Category</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/maintenance.svg')}}" alt="img"><span>Maintenances</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('categories.list')}}">Type Maintenance</a></li>
                                 <li><a href="{{route('prestataires.list')}}">Voir Prestataires </a></li>
                                <li><a href="{{route('maintenances.formulaire')}}">Planifier</a></li>
                                <li><a href="{{route('maintenances.list')}}">Détails Maintenance</a></li>
                                {{-- <li><a href="addquotation.html">Ajout maintenance</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/users1.svg')}}" alt="img"><span>Chauffeurs</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('chauffeurs.formulaire')}}">Chauffeur</a></li>
                                <li><a href="{{route('chauffeurs.list')}}">la liste  </a></li>
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/assurance.svg')}}" alt="img"><span> Assurances</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('assurances.list')}}">Voir les Contrats</a></li>
                                {{-- <li><a href="">Créer un Contrat </a></li> --}}
                               {{--  <li><a href="importtransfer.html">Import Transfer </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/incident.svg')}}" alt="img"><span>Incidents</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('incidents.list')}}"> Voir les incidents</a></li>
                                <li><a href="{{route('incidents.formulaire')}}">Inserer </a></li>
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/edit.svg')}}" alt="img"><span>Bon</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('bons.list')}}">Fair un Bon</a></li>
                                
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/notification.svg')}}" alt="img"><span>Notifications</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="">Voir Notifications</a></li>
                                {{-- <li><a href="">Détails Bon  </a></li> --}}
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/users1.svg')}}" alt="img"><span>Statistques </span> <span class="menu-arrow"></span></a>
                            <ul>
                                
                                <li><a href="{{route('rapport.vehicules')}}">Voir Etats</a></li> 
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
</div> 