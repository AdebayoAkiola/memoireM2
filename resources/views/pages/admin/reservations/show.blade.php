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
                        @foreach ($singleCourse as $item)
                            <h5 class="mb-0 font-weight-bold">Photo du chauffeur</h5>
                        @endforeach
                    </div>
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">


                        @foreach ($singlePhoto as $item)
                            @if ($item->photo != null)
                                <img src="{{ asset('storage/' . $item->id) }}" alt="Photo du chauffeur"
                                    class="mb-3 mx-auto col-md-12" />
                            @else
                                <img src="{{ asset('bg.jpg') }}" alt="Photo du chauffeur"
                                    class="mb-3 mx-auto col-md-12" />
                            @endif



                            {{-- <p class="text-muted"><small>Profile photo will be changed automatically</small></p> --}}
                            {{--@if (session('the_user')[0]->profil !== 'Admin') --}}

                                <div class="row flex-center">
                                    <form action="{{ url('user/change-image') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="md-form">
                                            <div class="file-field">
                                                <div class="btn btn-info btn-rounded btn-sm float-left">
                                                   {{--@if ($item->photo == null)
                                                        <span>Ajouter une photo</span>
                                                    @else
                                                        <span>Modifier la photo</span>
                                                    @endif
                                                    <input type="file" name="photo" id="image" onclick="update_photo();">
                                                --}} </div>
                                            </div>
                                            @error('photo')
                                                <span class="text-danger" style="font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div id="submit_image"></div>
                                    </form>
                                </div>
                                <div class="row flex-center">
                                    {{--<form action="{{ url('user/delete-image') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-sm"
                                            onclick="return confirm('Voulez-vous supprimer la photo de l\'utilistateur {{ $item->prenom }} {{ $item->nom }} ?')">
                                            Supprimer
                                        </button>
                                    </form>--}}
                                </div>
                            {{--@endif--}}
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
                        <h5 class="mb-0 font-weight-bold">Modifier les informations</h5>
                    </div>
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">

                        <!-- Edit Form -->
                        @foreach ($singleCourse as $item)
                            <form action="{{ route('course.update', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <!-- First row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="text" id="login" class="form-control validate"
                                                value="{{ $item->id }}" disabled>
                                            <label for="login" data-error="wrong" data-success="right">ID</label>
                                            @error('id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <div class="md-form mb-0">
                                                <input type="text" id="date_depart" name="date_depart"
                                                    class="form-control @error('date_depart') validate @enderror"
                                                    value="{{ $item->date_depart ?? old('date_depart', '') }}">
                                                <label for="date_depart">Date depart</label>
                                                @error('date_depart')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->

                                <!-- Second row -->
                                <div class="row">
                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="heure_depart" name="heure_depart" class="form-control validate"
                                                value="{{ $item->heure_depart ?? old('heure_depart', '') }}">
                                            <label for="heure_depart" data-error="wrong" data-success="right">Heure depart</label>
                                            @error('heure_depart')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="duree" id="duree" name="duree" class="form-control validate"
                                                value="{{ $item->duree ?? old('duree', '') }}">
                                            <label for="duree" data-error="wrong" data-success="right">Duree</label>
                                            @error('duree')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Second row -->
                                <!-- Third row -->
                                <div class="row">
                                    <!-- First column -->
                                    <!--<div class="col-md-6">-->
                                        <div class="md-form mb-0">
                                            <input type="number" id="prix" name="prix" class="form-control validate"
                                                value="{{ $item->prix ?? old('prix', '') }}">
                                            <label for="prix" data-error="wrong" data-success="right">Prix</label>
                                            @error('prix')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <!--</div>-->
                                    </div>
                                </div>
                                <!-- Third row -->

                                <!-- Second row -->
                                <div class="row">

                                   {{-- @if ($item->profil == 'Caissier')
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" class="form-control validate"
                                                    value="{{ $item->profil }}" disabled>
                                                <label for="profil" data-error="wrong" data-success="right">Profil</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <select class="mdb-select md-form" name="boutique">
                                                <option selected disabled value="{{ $item->affectation }}">{{ $item->nom_boutique }}</option>

                                                @foreach ($boutiques as $value)
                                                    <option value="{{ $value->id }}">{{ $value->nom_boutique }}</option>
                                                @endforeach
                                            </select>

                                            <label>Boutique</label>

                                            @error('boutique')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @else

                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" class="form-control validate"
                                                    value="{{ $item->profil }}" disabled>
                                                <label for="profil" data-error="wrong" data-success="right">Profil</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <select class="mdb-select md-form" name="depot">
                                                <option selected disabled value="{{ $item->affectation }}">{{ $item->nom_depot }}</option>

                                                @foreach ($depots as $value)
                                                    <option value="{{ $value->id }}">{{ $value->nom_depot }}</option>
                                                @endforeach
                                            </select>

                                            <label>Dépôt</label>

                                            @error('depot')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif --}}
                                </div>
                                <!-- Second row -->

                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-12 text-center my-4">
                                        <input type="submit" value="Modifier mon compte" class="btn btn-info btn-rounded">
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
