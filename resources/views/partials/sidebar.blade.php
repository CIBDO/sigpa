 <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{ route('home') }}"><img src="{{asset('assets/img/icons/dashboard.svg')}}" alt="img"><span>Menu</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/sales1.svg')}}" alt="img"><span>Marque</span> <span class="menu-arrow"></span></a>
                            <ul>
                               <li><a href="{{route('marques.list')}}">Voir marques</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/sales1.svg')}}" alt="img"><span>Modèle</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('modeles.list')}}">Voir modèles</a></li>
                    
                            </ul>
                        </li>
                         <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/sales1.svg')}}" alt="img"><span>Services</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('services.list')}}">Voir services </a></li>
                               
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span>Gestion Vehicules</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('vehicules.list')}}">Liste des Vehicules</a></li>
                                <li><a href="{{route('vehicules.formulaire')}}">Ajouter un Vehicule</a></li>
                
                            </ul>
                        </li>
                       
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/purchase1.svg')}}" alt="img"><span> Affectations</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('affectations.list')}}">Créer Affectation</a></li>
                               {{--  <li><a href="addpurchase.html">Créer Affectation</a></li> --}}
                                {{-- <li><a href="importpurchase.html">Import Purchase</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/expense1.svg')}}" alt="img"><span> Mission</span> <span class="menu-arrow"></span></a>
                            <ul>
                                {{-- <li><a href="expenselist.html">Détails Mission </a></li> --}}
                                <li><a href="{{route('missions.list')}}">Détails mission</a></li>
                                {{-- <li><a href="expensecategory.html">Expense Category</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/quotation1.svg')}}" alt="img"><span>Maintenances</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('type_maintenances.list')}}">Type Maintenance</a></li>
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
                                <li><a href="{{route('chauffeurs.list')}}">la lisste  </a></li>
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/transfer1.svg')}}" alt="img"><span> Assurances</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="">List des Contrats</a></li>
                                <li><a href="">Créer un Contrat </a></li>
                               {{--  <li><a href="importtransfer.html">Import Transfer </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/return1.svg')}}" alt="img"><span>Incidents</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="">Liste des incidents</a></li>
                                <li><a href="">Incident </a></li>
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/users1.svg')}}" alt="img"><span>Bon</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="">Fair un Bon</a></li>
                                <li><a href="">Détails Bon  </a></li>
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/users1.svg')}}" alt="img"><span>Notifications</span> <span class="menu-arrow"></span></a>
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
                                <li><a href="">Voir Statistques</a></li>
                                {{-- <li><a href="">Détails Bon  </a></li> --}}
                                {{-- <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.html">Add Purchase Return </a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
</div> 