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
                    <a class="nav-link active" data-toggle="tab" href="#" role="tab">Bienvenue dans l'espace des trajet</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content card">
                <div class="tab-pane fade in show active" id="trajet" role="tabpanel">
                    <form action="{{ route('trajetStore.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">Enregistrer un nouveau trajet</h3>
                                <p class="slogan">Saisir les informations du trajet</p>

                                <div class="md-form md-outline">
                                    <input type="text" id="ville_depart" name="ville_depart" class="form-control">
                                    <label for="ville_depart">Ville de depart</label>
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" id="ville_darriver" name="ville_darriver" class="form-control">
                                    <label for="ville_darriver">Ville d'arrivée</label>
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
