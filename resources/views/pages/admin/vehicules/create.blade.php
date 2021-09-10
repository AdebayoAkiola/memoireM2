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
                    <a class="nav-link active" data-toggle="tab" href="#caissier" role="tab">Bienvenue dans l'espace vehicule</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content card">
                <div class="tab-pane fade in show active" id="vehicule" role="tabpanel">
                    <form action="{{ route('vehiculeStore.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">Enregistrer mon vehicule</h3>
                                <p class="slogan">Saisir les informations du vehicule</p>

                                <div class="md-form md-outline">
                                    <input type="text" id="immatriculation" name="immatriculation" class="form-control">
                                    <label for="immatriculation">immatriculation</label>
                                    @error('immatriculation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="number" name="nbplace" class="form-control" maxlength="2"
                                        value="nbplace">
                                    <label for="nbplace">Nombre de place</label>
                                    @error('nbplace')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>Ajouter la photo </span>
                                            <input type="file" name="photo1">
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

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>Ajouter la photo </span>
                                            <input type="file" name="photo2">
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

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>Ajouter la photo </span>
                                            <input type="file" name="photo3">
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
