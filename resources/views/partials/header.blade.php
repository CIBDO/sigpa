<div class="header">

    <div class="header-left active">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{asset('assets/img/logo.png')}}" alt="">
        </a>
        <a href="{{ route('home') }}" class="logo-small">
            <img src="{{asset('assets/img/logo-small.png')}}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#">
                    <div class="searchinputs">
                        <input type="text" placeholder="Search Here ...">
                        <div class="search-addon">
                            <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                        </div>
                    </div>
                    <a class="btn" id="searchdiv"><img src="{{asset('assets/img/icons/search.svg')}}" alt="img"></a>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="20">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> Mali
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <img src="{{asset('assets/img/icons/notification-bing.svg')}}" alt="img">
                <span class="badge rounded-pill bg-danger">
                            {{\App\helpers\MyNotifications::sumNotifications()}}
                        </span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    {{--                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>--}}
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @foreach(\App\helpers\MyNotifications::getVehiclesNeedingOilChange() as $vehicle)
                            <li class="notification-message">
                                <a href="{{route('vehicules.list')}}">
                                    <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="{{asset('assets/img/service-automobile.png')}}">
                                            </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                <span class="noti-title">Le vehicule {{$vehicle['immatriculation']}} a besoin de vidange</span><br>
                                                <strong style="color: red">{{$vehicle['parcouru']}} Km parcouru</strong>
                                            </p>
                                            {{--                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>--}}
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        @foreach(\App\helpers\MyNotifications::getDriversWithLicenseExpiringSoon() as $driver)
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="{{asset('assets/img/licence.png')}}">
                                            </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span
                                                    class="noti-title">Le permis de {{$driver->prenom}} {{$driver->nom}} doit être renouvelée</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        @foreach(\App\helpers\MyNotifications::getDriversWithInsuranceExpiringSoon() as $assurance)
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="{{asset('assets/img/protection.png')}}">
                                            </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">L'assurance du véhicule {{$assurance->vehicule->immatriculation}} doit être renouvelée</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    {{--                            <a href="activities.html">View all Notifications</a>--}}
                </div>
            </div>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{asset('assets/img/profiles/avatar1.jpg')}}" alt="">
                            <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                                <span class="user-img"><img src="{{asset('assets/img/profiles/avatar1.jpg')}}" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <span>{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href=""> <i class="me-2" data-feather="user"></i> My Profile</a>
                            <a class="dropdown-item" href=""><i class="me-2" data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="{{route('logout')}}"><img src="{{asset('assets/img/icons/log-out.svg')}}" class="me-2" alt="img">Déconnexion</a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="">My Profile</a>
                    <a class="dropdown-item" href="">Settings</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Déconnexion</a>
                </div>
            </div>

        </div>
