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
                        <form action="{{ url('client/reservation') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-signup z-depth-1">

                            <div class="card-body text-center">

                                <h3 class="card-title my-2">Enregistrer un nouveau trajet</h3>
                                <p class="slogan">Saisir les informations du trajet</p>

                                <div class="md-form md-outline">
                                    <input type="text" oninput="search_ville()" name="ville_depart" id="ville_depart" class="form-control"
                                    placeholder="Saisissez votre ville de depart">
                                    <label for="ville_depart">Ville de depart</label>
                                    <ul class="list-group" id="my_list"></ul>
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
    {{--<script src="{{ asset('assets/js/panier.js') }}"></script>--}}
    <script type="text/javascript">
        var donnees = [];
        var liste_article = [];
        var code = null;


        const my_list = document.getElementById('my_list');

        //Get all villes
        function search_ville() {
            var ville_depart = document.getElementById('ville_depart').value;
            //console.log("ville_depart",ville_depart);
            if (ville_depart.length > 0) {
                console.log("ville_depart",ville_depart.length);
                $.ajax({
                    url: 'search-villes/' + ville_depart,
                    type: 'get',
                    dataType: 'json',

                    success: function(response) {
                        donnees = response['data'];
                        //console.log("donnees",donnees);
                        if (donnees.length > 0) {

                            for (let index = 0; index < donnees.length; index++) {

                                const liste_article1 = donnees[index].ville_depart;
                                //Affichage du résulat dans une liste
                                const item = document.createElement('a');
                                //Récupération du code apres clic
                                /*item.onclick = function() {
                                    code = donnees[index].ville_depart;
                                    console.log("code",code);
                                    $(document).ready(function(){
                                       $("#ville_depart").val(donnees[index].ville_depart);
                                   });
                                    clearList();
                                    //enable_button_ajouter();
                                };*/
                                item.classList.add('list-group-item');
                                item.classList.add('list-group-item-action');
                                const texte = document.createTextNode(liste_article1);
                                console.log("texte",texte);

                            //item.appendChild(texte);
                            my_list.appendChild(texte);
                            }
                        } else {
                            const item = document.createElement('a');

                            item.classList.add('list-group-item');
                            item.classList.add('list-group-item-action');
                            item.classList.add('list-group-item-danger');
                            const texte = document.createTextNode("Nouvelle ville");

                            item.appendChild(texte);
                            my_list.appendChild(item);
                        }

                    }
                });
            } else {
                clearList();
            }
            clearList();
        }

        function clearList() {
            /*while (my_list.firstChild) {
                my_list.removeChild(my_list.firstChild);
            }*/
            console.log("my list",my_list);
        }
    </script>
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
