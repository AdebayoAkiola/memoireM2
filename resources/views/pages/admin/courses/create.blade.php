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
                    <a class="nav-link active" data-toggle="tab" href="#caissier" role="tab">Bienvenue dans l'espace des courses</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content card">
                <div class="tab-pane fade in show active" id="course" role="tabpanel">
                    <form action="{{ route('courseStore.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">Enregistrer une course</h3>
                                <p class="slogan">Saisir les informations de la course</p>

                                <div class="md-form md-outline">
                                    <input type="hidden"  name="trajet" value="{{$get_trajet[0]->id}}" class="form-control">
                                </div>

                                <div class="md-form md-outline">
                                    <input type="date"  id="datedepart" min="{{date('Y-m-d')}}" name="datedepart" class="form-control">
                                    <label for="datedepart">Date de depart</label>
                                    @error('datedepart')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" id="heure" name="heure" class="form-control">
                                    <label for="heure">Heure de depart</label>
                                    @error('heure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" name="duree" class="form-control" >
                                    <label for="duree">Durée estimée</label>
                                    @error('duree')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="number" name="prix" id="prix" class="form-control">
                                    <label for="prix">Prix</label>
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
