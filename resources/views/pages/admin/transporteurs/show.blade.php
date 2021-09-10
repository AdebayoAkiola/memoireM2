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
                        @foreach ($singleTransporteur as $item)
                            <h5 class="mb-0 font-weight-bold">Photo de {{ $item->login }}</h5>
                        @endforeach
                    </div>
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">


                        @foreach ($singleTransporteur as $item)
                            @if ($item->photo != null)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="Photo de {{ $item->login }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @else
                                <img src="{{ asset('bg.jpg') }}" alt="Photo de {{ $item->login }}"
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
                                                    @if ($item->photo == null)
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
                        @foreach ($singleTransporteur as $item)
                            <form action="{{ route('transporteur.update', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <!-- First row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
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

                                <!-- Second row -->
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
                                <!-- Second row -->
                                <!-- Third row -->
                                <div class="row">
                                    <!-- First column -->
                                    <!--<div class="col-md-6">-->
                                        <div class="md-form mb-0">
                                            <input type="email" id="email" name="email" class="form-control validate"
                                                value="{{ $item->email ?? old('email', '') }}">
                                            <label for="email" data-error="wrong" data-success="right">Email</label>
                                            @error('email')
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
