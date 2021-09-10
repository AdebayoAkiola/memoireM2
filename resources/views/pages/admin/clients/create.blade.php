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
                    <a class="nav-link active" data-toggle="tab" href="#" role="tab">Bienvenue dans l'espace client</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content card">
                <div class="tab-pane fade in show active" id="chauffeur" role="tabpanel">
                    <form action="{{ route('clientStore.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">S'enregistrer en tant que client</h3>
                                <p class="slogan">Saisir les informations personnelles</p>

                                <div class="md-form md-outline">
                                    <input type="email" name="email" class="form-control">
                                    <label for="email">E-mail</label>
                                </div>

                                <div class="md-form md-outline">
                                    <input type="number" name="telephone" class="form-control" maxlength="9"
                                        value="telephone">
                                    <label for="telephone">Téléphone</label>
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" name="prenom" class="form-control" >
                                    <label for="prenom">Prenom</label>
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md-form md-outline">
                                    <input type="text" id="nom"  name="nom" class="form-control">
                                    <label for="nom">Nom</label>
                                </div>

                                <div class="md-form md-outline">
                                    <input type="password" id="password" class="form-control">
                                    <label for="password">Mots de passe</label>
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
