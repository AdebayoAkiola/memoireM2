@extends('layouts.app')

{{-- Importation css ici --}}
@section('extra-css')

@endsection

{{-- Contenu de la page ici --}}
{{-- Modifier la page à votre guise --}}
@section('contenu_page')
    <div class="row mb-5 justify-content-md-center">
        <!-- Grid column -->
        <div class="col-md-6 mb-4">
            <!-- Nav tabs -->
            <ul class="nav md-tabs nav-justified">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-toggle="tab" href="#caissier" role="tab">Caissier</a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#gerant" role="tab">Gérant</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content card">
                <!-- Caissier -->
                <div class="tab-pane fade in show active" id="caissier" role="tabpanel">
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">Ajouter un caissier</h3>
                                <p class="slogan">Saisir les informations personnelles</p>

                                <div class="md-form md-outline">
                                    <input type="text" id="prenom" name="prenom" class="form-control"
                                        value="{{ $utilisateur->prenom ?? old('prenom', '') }}">
                                    <label for="prenom">Prénom</label>
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" id="nom" name="nom" class="form-control"
                                        value="{{ $utilisateur->nom ?? old('nom', '') }}">
                                    <label for="nom">Nom</label>
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" name="telephone" class="form-control" maxlength="9"
                                        value="{{ $utilisateur->telephone ?? old('telephone', '') }}">
                                    <label for="telephone">Téléphone</label>
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="">

                                    <!-- Name -->
                                    <select class="mdb-select md-form" name="boutique">
                                        <option value="">Sélectionnez une boutique</option>
                                        @foreach ($boutiques as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom_boutique }}</option>
                                        @endforeach
                                    </select>

                                    @error('boutique')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>Choisissez un fichier</span>
                                            <input type="file" name="photo">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" disabled
                                                placeholder="Sélectionnez une image">
                                        </div>
                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-foter text-right">
                                    <button type="submit" class="btn btn-outline-success btn-sm" style="width: 140px;">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Caissier -->
                <!-- Gérant -->
                <div class="tab-pane fade" id="gerant" role="tabpanel">
                    <form action="{{ url('user/gerant') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">Ajouter un gérant</h3>
                                <p class="slogan">Saisir les informations personnelles</p>

                                <div class="md-form md-outline">
                                    <input type="text" id="prenom" name="prenom" class="form-control"
                                        value="{{ $utilisateur->prenom ?? old('prenom', '') }}">
                                    <label for="prenom">Prénom</label>
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" id="nom" name="nom" class="form-control"
                                        value="{{ $utilisateur->nom ?? old('nom', '') }}">
                                    <label for="nom">Nom</label>
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" name="telephone" class="form-control" maxlength="9"
                                        value="{{ $utilisateur->telephone ?? old('telephone', '') }}">
                                    <label for="telephone">Téléphone</label>
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="">

                                    <!-- Name -->
                                    <select class="mdb-select md-form" name="depot">
                                        <option value="">Sélectionnez un dépôt</option>
                                        @foreach ($depots as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom_depot }}</option>
                                        @endforeach
                                    </select>

                                    @error('depot')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>Choisissez un fichier</span>
                                            <input type="file" name="photo">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" disabled
                                                placeholder="Sélectionnez une image">
                                        </div>
                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-foter text-right">
                                    <button type="submit" class="btn btn-outline-success btn-sm" style="width: 140px;"
                                        onclick="add_gerant()">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Gérant -->
            </div>

        </div>
        <!-- Grid column -->

    </div>
@endsection

{{-- Importation Js ici --}}
@section('extra-js')

    <script>
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });
        function add_gerant() {
            $(document).ready(function() {
                $("#gerant");
            });
        }

    </script>
@endsection
