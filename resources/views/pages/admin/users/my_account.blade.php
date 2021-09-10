@extends('layouts.app')

{{-- Importation css ici --}}
@section('extra-css')

@endsection

{{-- Contenu de la page ici --}}
@section('contenu_page')
    <!-- Section: Edit Account -->
    <section class="section">
        <!-- First row -->
        <div class="row">

            <!-- Message d'erreur -->

            <!-- First column -->
            <div class="col-lg-4 mb-4">

                <!-- Card -->
                <div class="card card-cascade narrower">

                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                        @foreach ($singleUser as $item)
                            <h5 class="mb-0 font-weight-bold">Photo de {{ $item->login }}</h5>
                        @endforeach
                    </div>
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">


                        @foreach ($singleUser as $item)
                            @if ($item->image != null)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Photo de {{ $item->login }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @else
                                <img src="{{ asset('default_user.png') }}" alt="Photo de {{ $item->login }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @endif

                            {{-- <p class="text-muted"><small>Profile photo will be changed automatically</small></p> --}}
                            <div class="row flex-center">
                                <form action="{{ url('user/change-image') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="md-form">
                                        <div class="file-field">
                                            <div class="btn btn-info btn-rounded btn-sm float-left">
                                                @if ($item->image == null)
                                                    <span>Ajouter une photo</span>
                                                @else
                                                    <span>Modifier la photo</span>
                                                @endif
                                                <input type="file" name="photo" id="image" onclick="update_photo();">
                                            </div>
                                        </div>
                                        @error('photo')
                                            <span class="text-danger" style="font-size: 13px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div id="submit_image"></div>
                                </form>
                            </div>
                            <div class="row flex-center">
                                <form action="{{ url('user/delete-image') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger btn-rounded btn-sm"
                                        onclick="return confirm('Voulez-vous supprimer la photo de l\'utilistateur {{ $item->prenom }} {{ $item->nom }} ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>

                    </div>
                    @endforeach
                    <!-- Card content -->

                </div>
                <!-- Card -->

            </div>
            <!-- First column -->

            <!-- Second column -->
            <div class="col-lg-8 mb-4">

                <!-- Card -->
                <div class="card card-cascade narrower">

                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                        <h5 class="mb-0 font-weight-bold">Modifier mes informations</h5>
                    </div>
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">

                        <!-- Edit Form -->
                        @foreach ($singleUser as $item)
                            <form action="{{ url('user/modifier-compte') }}" method="POST">
                                @csrf
                                {{-- @method('PUT') --}}

                                <!-- First row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="hidden" name="id" value="{{ session('the_user')[0]->id }}">
                                            <input type="hidden" name="login" value="{{ $item->login }}">
                                            <input type="text" id="login" class="form-control validate"
                                                value="{{ $item->login }}" disabled>
                                            <label for="login" data-error="wrong" data-success="right">Login</label>
                                            @error('login')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <div class="md-form mb-0">
                                                <input type="text" id="telephone" name="telephone"
                                                    class="form-control @error('telephone') validate @enderror"
                                                    value="{{ $item->telephone ?? old('telephone', '') }}">
                                                <label for="telephone">Téléphone</label>
                                                @error('telephone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->
                                <!-- First row -->
                                <div class="row">
                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="prenom" name="prenom" class="form-control validate"
                                                value="{{ $item->prenom ?? old('prenom', '') }}">
                                            <label for="prenom" data-error="wrong" data-success="right">Prénom</label>
                                            @error('prenom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="nom" name="nom" class="form-control validate"
                                                value="{{ $item->nom ?? old('nom', '') }}">
                                            <label for="nom" data-error="wrong" data-success="right">Nom</label>
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" class="form-control validate text-center"
                                                value="{{ $item->profil }}" disabled>
                                            <label>Profil</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-6 text-center my-4">
                                        <input type="submit" value="Modifier mon compte" class="btn btn-info btn-rounded">
                                    </div>

                                    <div class="col-md-6 text-center my-4">
                                        <a href="{{ url('change-password', session('the_user')[0]->id) }}" class="btn btn-primary btn-rounded">
                                            Changer mot de passe
                                        </a>
                                    </div>
                                </div>
                                <!-- Fourth row -->

                            </form>
                        @endforeach
                        <!-- Edit Form -->

                    </div>
                    <!-- Card content -->

                </div>
                <!-- Card -->

            </div>
            <!-- Second column -->

        </div>
        <!-- First row -->

    </section>
    <!-- Section: Edit Account -->

@endsection

{{-- Importation Js ici --}}
@section('extra-js')
    <script>
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });

        function update_photo() {
            var image = document.getElementById('image').value;
            if (image != null) {
                document.getElementById('submit_image').innerHTML =
                    "<button type='submit' class='btn btn-rounded btn-sm btn-success'>Modifier</button>";
            }
        }

    </script>
@endsection
