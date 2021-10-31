<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
    <!-- SideNav slide-out button -->
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fas fa-bars"></i></a>
    </div>
    <!-- Breadcrumb-->
    <div class="breadcrumb-dn mr-auto">
        <p>Menu</p>
    </div>

    <div class="d-flex change-mode">

        <ul class="nav navbar-nav nav-flex-icons text-center mr-5">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link waves-effect">
                    <span class="clearfix d-none d-sm-inline-block">
                        Accueil
                    </span>
                </a>
            </li>
        </ul>

        <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
            <button class="btn btn-outline-black btn-sm" id="dark-mode">Changer de Mode</button>
        </div>
        <!--Navbar links-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">

            <li class="nav-item">
                <a class="nav-link waves-effect">
                    <span class="clearfix d-none d-sm-inline-block">
                        {{ session('the_user')[0]->profil }}
                    </span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">
                       {{ session('the_user')[0]->prenom }} {{ session('the_user')[0]->nom }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    {{--<a class="dropdown-item" href="{{ url('user/voir-utilisateur', session('the_user')[0]->id) }}">Mon
                        Compte</a>  --}}
                    @if (substr(session('the_user')[0]->login,0,2) == 'ch')
                        <a class="dropdown-item" href="{{ route('chauffeur.show', session('the_user')[0]->id) }}">Mon
                            Compte</a>
                    @elseif (substr(session('the_user')[0]->login,0,2) == 'tr')
                        <a class="dropdown-item" href="{{ route('transporteur.show', session('the_user')[0]->id) }}">Mon
                            Compte</a>
                    @elseif (substr(session('the_user')[0]->login,0,2) == 'ad')
                        <a class="dropdown-item" href="{{ route('chauffeur.show', session('the_user')[0]->id) }}">Mon
                            Compte</a>
                    @else
                        <a class="dropdown-item" href="{{ route('client.show', session('the_user')[0]->id) }}">Mon
                            Compte</a>
                    @endif
                    <a class="dropdown-item" href="deconnexion">Déconnexion</a>
                </div>

            </li>

        </ul>
    </div>
    <!--/Navbar links-->
</nav>
