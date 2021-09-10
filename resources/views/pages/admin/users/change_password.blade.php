@extends('layouts.app')

{{-- Importation css ici --}}
@section('extra-css')

@endsection

@section('contenu_page')
    <section class="section">
        <!-- First row -->
        <div class="row justify-content-md-center">
            <div class="col-lg-6 mb-4">

                <!-- Card -->
                <div class="card card-cascade narrower">

                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                        <h5 class="mb-0 font-weight-bold">Changer mot de passe</h5>
                    </div>
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">
                        @if (session('error_old_password'))
                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                L'ancien mot de passe n'est pas conforme
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('update_password_success'))
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                Mot de passe modifier avec succès
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ url('update-password') }}" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ session('the_user')[0]->id }}">

                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input
                                                type="password" name="ancien_mot_de_passe" class="form-control validate"
                                                placeholder="Saisir l'ancien mot de passe">
                                            <label>Ancien mot de passe</label>
                                            @error('ancien_mot_de_passe')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input
                                                type="password" name="nouveau_mot_de_passe" class="form-control validate"
                                                placeholder="Saisir le nouveau mot de passe">
                                            <label>Nouveau mot de passe</label>
                                            @error('nouveau_mot_de_passe')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input type="password" name="confirm_mot_de_passe" class="form-control validate"
                                            placeholder="Confirmer nouveau mot de passe">
                                            <label>Confirmer mot de passe</label>
                                            @error('confirm_mot_de_passe')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-center my-4">
                                    <input type="submit" value="Modifier mot de passe"
                                        class="btn btn-sm btn-info btn-rounded">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Card content -->

                </div>
                <!-- Card -->

            </div>
        </div>
    </section>
@endsection

@section('extra-js')

@endsection
