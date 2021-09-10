<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? 'Bilbao Business SUARL' }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('assets/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <style>
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (min-width: 560px) and (max-width: 740px) {

            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }

    </style>
</head>

<body class="login-page">

    <!-- Main Navigation -->
    <header>
        <!-- Intro Section -->
        <section class="view intro-2">
            <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

                            <!-- Form with header -->
                            <div class="card wow fadeIn" data-wow-delay="0.3s">
                                <div class="card-body">
                                    <form action="{{ url('connexion') }}" method="POST">
                                        @csrf

                                        <!-- Header -->
                                        <div class="form-header" style="background-color: #3877bc">
                                            <h3 class="font-weight-500 my-2 py-1">Authentification</h3>
                                        </div>
                                        @if (session('auth_error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Login et/ou mot de passe incorrect
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (session('un_authorize'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Veuillez vous reconnecter.
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        <!-- Body -->
                                        <div class="md-form">
                                            <i class="fas fa-user prefix white-text"></i>
                                            <input
                                                type="text" name="login" id="orangeForm-name" class="form-control"
                                                value="{{ old('login') }}">
                                            <label for="orangeForm-name">Login</label>
                                            @error('login')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="md-form">
                                            <i class="fas fa-lock prefix white-text"></i>
                                            <input type="password" name="mot_de_passe" id="orangeForm-pass"
                                                class="form-control">
                                            <label for="orangeForm-pass">Mot de passe</label>
                                            @error('mot_de_passe')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg"
                                                style="background-color: #3877bc">Se Connecter</button>
                                            <hr class="mt-4">
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Form with header -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Intro Section -->

    </header>
    <!-- Main Navigation -->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/mdb.js') }}"></script>

    <!-- Custom scripts -->
    <script>
        new WOW().init();

    </script>

</body>

</html>
