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
                    <a class="nav-link active" data-toggle="tab" href="#" role="tab">Bienvenue dans l'espace Transporteur</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content card">
                <div class="tab-pane fade in show active" id="caissier" role="tabpanel">
                    <form action="{{ route('transporteurStore.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">S'enregistrer en tant que transporteur</h3>
                                <p class="slogan">Saisir les informations personnelles</p>

                                <div class="md-form md-outline">
                                    <input type="text" id="prenom" name="prenom" class="form-control">
                                    <label for="prenom">Prénom</label>
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" id="nom" name="nom" class="form-control">
                                    <label for="nom">Nom</label>
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="number" name="telephone" class="form-control" maxlength="9">
                                    <label for="telephone">Téléphone</label>
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="email" id="email" name="email" class="form-control">
                                    <label for="email">E-mail</label>
                                </div>

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>Ajouter votre photo</span>
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
