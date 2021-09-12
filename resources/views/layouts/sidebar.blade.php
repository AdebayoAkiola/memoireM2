<div id="slide-out" class="side-nav sn-bg-4 fixed">
    <ul class="custom-scrollbar">
        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
            <div class="text-center">
                <a href="{{ url('/') }}" class="pl-0">
                    <img style="height: 70px; width: 150px;" src="{{ asset('assets/images/logo.png') }}">
                </a>
            </div>
        </li>
        <!--/. Logo -->

        <!--Search Form-->
        <li>
            <form class="search-form" role="search">
                <div class="md-form mt-0 waves-light">
                    <input type="text" class="form-control py-2" placeholder="Rechercher">
                </div>
            </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">

                @if (session('the_user')[0]->profil == 'Administrateur')

                    {{-- Chauffeurs --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Chauffeurs
                            <i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('chauffeur.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('chauffeur.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Transporteurs --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Transporteurs
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('transporteur.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('transporteur.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Clients --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Clients
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                       <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('client.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('client.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Vehicule --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-tachometer-alt"></i>
                            Nos Vehicules
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                       <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('vehicule.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('vehicule.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Courses --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fab fa-css3"></i>
                            Voir les Courses
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('course.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('course.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Trajets --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-tachometer-alt"></i>
                            Nos Trajets
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('trajet.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('trajet.index') }}" class="waves-effect">Lister</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    {{-- Reservations --}}
                     <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-shopping-cart"></i>
                            Reservations de course
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('reservation.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('reservation.index') }}" class="waves-effect">Lister</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @elseif (session('the_user')[0]->profil == 'Chauffeur')

                    {{-- Chauffeurs --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Chauffeurs
                            <i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('chauffeur.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('chauffeur.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Vehicule --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-tachometer-alt"></i>
                            Nos Vehicules
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                       <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('vehicule.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('vehicule.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Courses --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fab fa-css3"></i>
                            Voir les Courses
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('course.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('course.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Trajets --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-tachometer-alt"></i>
                            Nos Trajets
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('trajet.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('trajet.index') }}" class="waves-effect">Lister</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    {{-- Reservations --}}
                     <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-shopping-cart"></i>
                            Reservations de course
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('reservation.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('reservation.index') }}" class="waves-effect">Lister</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @elseif (session('the_user')[0]->profil == 'Transporteur')


                    {{-- Transporteurs --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Transporteurs
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('transporteur.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('transporteur.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Chauffeurs --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Chauffeurs
                            <i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('chauffeur.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('chauffeur.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Vehicule --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-tachometer-alt"></i>
                            Nos Vehicules
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                       <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('vehicule.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('vehicule.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @elseif (session('the_user')[0]->profil == 'Client')

                    {{-- Chauffeurs --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Chauffeurs
                            <i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('chauffeur.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('chauffeur.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Clients --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-user"></i>
                            Nos Clients
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                       <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('client.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('client.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Vehicule --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-tachometer-alt"></i>
                            Nos Vehicules
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                       <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('vehicule.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('vehicule.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Courses --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fab fa-css3"></i>
                            Voir les Courses
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('course.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('course.index') }}" class="waves-effect">Lister</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- Trajets --}}
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-tachometer-alt"></i>
                            Nos Trajets
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('trajet.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('trajet.index') }}" class="waves-effect">Lister</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    {{-- Reservations --}}
                     <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-shopping-cart"></i>
                            Reservations de course
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('reservation.create') }}" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="{{ route('reservation.index') }}" class="waves-effect">Lister</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                @endif
            </ul>
        </li>
        <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>
