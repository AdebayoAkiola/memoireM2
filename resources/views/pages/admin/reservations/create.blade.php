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
                    <a class="nav-link active" data-toggle="tab" href="#" role="tab">Bienvenue dans l'espace de resevation des courses</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content card">
                <div class="tab-pane fade in show active" id="chauffeur" role="tabpanel">
                    <form action="{{ url('reserver') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">Reserver votre voiture de course en toute securite</h3>
                                <p class="slogan">Saisir les informations personnelles</p>

                                <input type="hidden" name="id_course" class="form-control" value="{{$id_course}}">
                                <div class="md-form md-outline">
                                    <input type="number" name="nombre_de_place" class="form-control" maxlength="3">
                                    <label for="nombre_de_place">Nombre de place</label>
                                    @error('nombre_de_place')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" name="point_depart" class="form-control" >
                                    <label for="point_depart">Point de depart</label>
                                    @error('point_depart')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" name="point_darrivee" id="point_darrivee" class="form-control">
                                    <label for="point_darrivee">Point d'arrivee</label>
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

@endsection
