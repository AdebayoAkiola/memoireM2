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
                        @foreach ($singleVehicule as $item)
                            <h5 class="mb-0 font-weight-bold">Photo de {{ $item->immatriculation }}</h5>
                        @endforeach
                    </div>
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">

                        @foreach ($singleVehicule as $item)
                        {{--photo1--}}
                            @if ($item->photo1 != null)
                                <img src="{{ asset('storage/' . $item->photo1) }}" alt="Photo de {{ $item->immatriculation }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @else
                                <img src="{{ asset('bg.jpg') }}" alt="Photo de {{ $item->immatriculation }}"
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
                                                    @if ($item->photo1 == null)
                                                        <span>Ajouter une photo</span>
                                                    @else
                                                        <span>Modifier la photo</span>
                                                    @endif
                                                    <input type="file" name="photo1" id="image" onclick="update_photo();">
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
                                            onclick="return confirm('Voulez-vous supprimer la photo du vehicule {{ $item->immatriculation }}  ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            {{--photo1--}}
                            {{--photo2--}}
                            @if ($item->photo2 != null)
                                <img src="{{ asset('storage/' . $item->photo2) }}" alt="Photo de {{ $item->immatriculation }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @else
                                <img src="{{ asset('bg.jpg') }}" alt="Photo de {{ $item->immatriculation }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @endif
                            {{--@if (session('the_user')[0]->profil !== 'Admin') --}}
                                <div class="row flex-center">
                                    <form action="{{ url('user/change-image') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="md-form">
                                            <div class="file-field">
                                                <div class="btn btn-info btn-rounded btn-sm float-left">
                                                    @if ($item->photo2 == null)
                                                        <span>Ajouter une photo</span>
                                                    @else
                                                        <span>Modifier la photo</span>
                                                    @endif
                                                    <input type="file" name="photo2" id="image" onclick="update_photo();">
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
                                            onclick="return confirm('Voulez-vous supprimer la photo du vehicule {{ $item->immatriculation }}  ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            {{--photo2--}}
                            {{--photo3--}}
                            @if ($item->photo3 != null)
                                <img src="{{ asset('storage/' . $item->photo3) }}" alt="Photo de {{ $item->immatriculation }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @else
                                <img src="{{ asset('bg.jpg') }}" alt="Photo de {{ $item->immatriculation }}"
                                    class="mb-3 mx-auto col-md-12" />
                            @endif
                            {{--@if (session('the_user')[0]->profil !== 'Admin') --}}
                                <div class="row flex-center">
                                    <form action="{{ url('user/change-image') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="md-form">
                                            <div class="file-field">
                                                <div class="btn btn-info btn-rounded btn-sm float-left">
                                                    @if ($item->photo3 == null)
                                                        <span>Ajouter une photo</span>
                                                    @else
                                                        <span>Modifier la photo</span>
                                                    @endif
                                                    <input type="file" name="photo3" id="image" onclick="update_photo();">
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
                                            onclick="return confirm('Voulez-vous supprimer la photo du vehicule {{ $item->immatriculation }}  ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            {{--photo3--}}
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
                        @foreach ($singleVehicule as $item)
                            <form action="{{ route('vehicule.update', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <!-- First row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="text" id="id" class="form-control validate"
                                                value="{{ $item->id }}" disabled>
                                            <label for="id" data-error="wrong" data-success="right">ID</label>
                                            @error('id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- first column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                                <input type="text" id="immatriculation" name="immatriculation"
                                                    class="form-control @error('telephone') validate @enderror"
                                                    value="{{ $item->immatriculation ?? old('immatriculation', '') }}">
                                                <label for="immatriculation">Téléphone</label>
                                                @error('immatriculation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Second column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="number" id="nombre_de_place" name="nombre_de_place"
                                                    class="form-control @error('nombre_de_place') validate @enderror"
                                                    value="{{ $item->nombre_de_place ?? old('nombre_de_place', '') }}">
                                                <label for="immatriculation">Nombre de place</label>
                                                @error('nombre_de_place')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->


                                <!-- Second row -->

                                <!-- Second row -->

                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-12 text-center my-4">
                                        <input type="submit" value="Modifier vehicule" class="btn btn-info btn-rounded">
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
