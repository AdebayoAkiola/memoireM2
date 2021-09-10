@extends('layouts.app')

{{-- Importation css ici --}}
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/addons/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/addons/datatables-select.min.css') }}">
@endsection

{{-- Contenu de la page ici --}}
@section('contenu_page')
    <section>
        <!-- Gird column -->
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Utilisateur créé avec succès
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('update_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Utilisateur modifié avec succès
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('transfert_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Utilisateur transféré avec succès
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('img_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    La photo a été modifié avec succès
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status_changed'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Le statut de l'utilisateur a été mise à jour avec succès
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('user_not_found'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Utilisateur introuvable
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('img_delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    La photo a été supprimée avec succès
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h5 class="my-4 dark-grey-text font-weight-bold">Liste des utilisateurs</h5>

            <div class="card">
                <div class="card-body">
                    <ul class="nav md-tabs nav-justified mb-4">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#caissier" role="tab">Nos
                                Caissiers</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#gerant" role="tab">Nos Gérants</a>
                        </li>
                    </ul>

                    {{-- Boutiques --}}
                    <div class="tab-content card">
                        <div class="tab-pane fade in show active" id="caissier" role="tabpanel">
                            <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="th-sm">
                                            Login
                                        </th>
                                        <th class="th-sm">
                                            Prénom
                                        </th>
                                        <th class="th-sm">
                                            Nom
                                        </th>
                                        <th class="th-sm">
                                            Téléphone
                                        </th>
                                        <th class="th-sm">
                                            Profil
                                        </th>
                                        <th class="th-sm">
                                            Boutique
                                        </th>
                                        <th class="th-sm">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($utilisateurs_boutiques as $item)
                                        <tr>
                                            <td></td>
                                            <td>{{ $item->login }}</td>
                                            <td>{{ $item->prenom }}</td>
                                            <td>{{ $item->nom }}</td>
                                            <td>{{ $item->telephone }}</td>
                                            <td>{{ $item->profil }}</td>
                                            <td class="text-primary">{{ $item->nom_boutique }}</td>

                                            <td>
                                                <a href="{{ route('user.show', $item->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Voir" class="text-primary">
                                                    <i class="w-fa fas fa-user"></i>
                                                </a>

                                                @if ($item->etat == 1)
                                                    <a href="{{ url('user/status', [$item->id, 0]) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Désactiver"
                                                        class="text-success"
                                                        onclick="return confirm('Voulez-vous désactiver l\'utilistateur {{ $item->prenom }} {{ $item->nom }} ?')">
                                                        <i class="w-fa fas fa-edit"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ url('user/status', [$item->id, 1]) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Activer"
                                                        class="text-danger"
                                                        onclick="return confirm('Voulez-vous activer l\'utilistateur {{ $item->prenom }} {{ $item->nom }} ?')">
                                                        <i class="w-fa fas fa-edit"></i>
                                                    </a>
                                                @endif

                                                <a href="#" data-placement="top" title="Transférer" data-toggle="modal"
                                                    data-target="#modalTransfertUser{{ $item->id }}">
                                                    <i class="w-fa fas fa-share"></i>
                                                </a>

                                                <!-- Modal: Tranferer Utilisateur -->
                                                <div class="modal fade" id="modalTransfertUser{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog cascading-modal" role="document">
                                                        <!-- Content -->
                                                        <div class="modal-content">

                                                            <!-- Header -->
                                                            <div class="modal-header light-blue darken-3 white-text">
                                                                <h4 class="col">
                                                                    Transférer {{ $item->prenom }} {{ $item->nom }} vers un dépôt
                                                                </h4>
                                                                <button type="button" class="close waves-effect waves-light"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <!-- Body -->
                                                            <form action="{{ url('user/tranfert-depot') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <div class="modal-body mb-0">
                                                                    <div class="md-form form-sm">
                                                                        <select class="mdb-select" name="depot">
                                                                            <option value="">Sélectionnez un dépôt </option>
                                                                            @foreach ($depots as $item)
                                                                                <option value="{{ $item->id }}"> {{ $item->nom_depot }} </option>
                                                                            @endforeach
                                                                        </select>

                                                                        @error('depot')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="text-center mt-1-half">
                                                                        <button type="submit"
                                                                            class="btn btn-info mb-2">Transférer
                                                                            <i class="fas fa-paper-plane ml-1"></i></button>
                                                                    </div>

                                                                </div>

                                                            </form>
                                                        </div>
                                                        <!-- Content -->
                                                    </div>
                                                </div>
                                                <!-- Modal: Tranferer Utilisateur -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    {{-- Dépôts --}}
                        <div class="tab-pane fade" id="gerant" role="tabpanel">
                            <table id="dt-material-checkbox2" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="th-sm">
                                            Login
                                        </th>
                                        <th class="th-sm">
                                            Prénom
                                        </th>
                                        <th class="th-sm">
                                            Nom
                                        </th>
                                        <th class="th-sm">
                                            Téléphone
                                        </th>
                                        <th class="th-sm">
                                            Profil
                                        </th>
                                        <th class="th-sm">
                                            Dépôt
                                        </th>
                                        <th class="th-sm">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($utilisateurs_depots as $item)
                                        <tr>
                                            <td></td>
                                            <td>{{ $item->login }}</td>
                                            <td>{{ $item->prenom }}</td>
                                            <td>{{ $item->nom }}</td>
                                            <td>{{ $item->telephone }}</td>
                                            <td>{{ $item->profil }}</td>
                                            <td class="text-success">{{ $item->nom_depot }}</td>

                                            <td>
                                                <a href="{{ route('user.show', $item->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Voir" class="text-primary">
                                                    <i class="w-fa fas fa-user"></i>
                                                </a>

                                                @if ($item->etat == 1)
                                                    <a href="{{ url('user/status', [$item->id, 0]) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Désactiver"
                                                        class="text-success"
                                                        onclick="return confirm('Voulez-vous désactiver l\'utilistateur {{ $item->prenom }} {{ $item->nom }} ?')">
                                                        <i class="w-fa fas fa-edit"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ url('user/status', [$item->id, 1]) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Activer"
                                                        class="text-danger"
                                                        onclick="return confirm('Voulez-vous activer l\'utilistateur {{ $item->prenom }} {{ $item->nom }} ?')">
                                                        <i class="w-fa fas fa-edit"></i>
                                                    </a>
                                                @endif

                                                <a href="#" data-placement="top" title="Transférer" data-toggle="modal"
                                                    data-target="#modalTransfertUser{{ $item->id }}">
                                                    <i class="w-fa fas fa-share"></i>
                                                </a>

                                                <!-- Modal: Tranferer Utilisateur -->
                                                <div class="modal fade" id="modalTransfertUser{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog cascading-modal" role="document">
                                                        <!-- Content -->
                                                        <div class="modal-content">

                                                            <!-- Header -->
                                                            <div class="modal-header light-blue darken-3 white-text">
                                                                <h4 class="">
                                                                    Transférer {{ $item->prenom }} {{ $item->nom }} vers une boutique
                                                                </h4>
                                                                <button type="button" class="close waves-effect waves-light"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <!-- Body -->
                                                            <form action="{{ url('user/tranfert-boutique') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <div class="modal-body mb-0">
                                                                    <div class="md-form form-sm">

                                                                        <select class="mdb-select" name="boutique">
                                                                            <option value="col">Sélectionnez une boutique </option>
                                                                            @foreach ($boutiques as $item)
                                                                                <option value="{{ $item->id }}"> {{ $item->nom_boutique }} </option>
                                                                            @endforeach
                                                                        </select>

                                                                        @error('boutique')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="text-center mt-1-half">
                                                                        <button type="submit"
                                                                            class="btn btn-info mb-2">Transférer
                                                                            <i class="fas fa-paper-plane ml-1"></i></button>
                                                                    </div>

                                                                </div>

                                                            </form>
                                                        </div>
                                                        <!-- Content -->
                                                    </div>
                                                </div>
                                                <!-- Modal: Tranferer Utilisateur -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Gird column -->
    </section>
@endsection

{{-- Importation Js ici --}}
@section('extra-js')
    <!-- DataTables  -->
    <script type="text/javascript" src="{{ asset('assets/js/addons/datatables.min.js') }}"></script>
    <!-- DataTables Select  -->
    <script type="text/javascript" src="{{ asset('assets/js/addons/datatables-select.min.js') }}"></script>

    <script>
        $('#dtMaterialDesignExample').DataTable();

        $('#dt-material-checkbox').dataTable({

            columnDefs: [{
                orderable: true,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'os',
                selector: 'td:first-child'
            }
        });
        $('#dt-material-checkbox2').dataTable({

            columnDefs: [{
                orderable: true,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'os',
                selector: 'td:first-child'
            }
        });

        /* Boutiques */
        $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox_wrapper').find('label').each(function() {
            $(this).parent().append($(this).children());
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').find(
            'input').each(function() {
            $('input').attr("placeholder", "Rechercher");
            $('input').removeClass('form-control-sm');
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_length, #dt-material-checkbox_wrapper .dataTables_length').addClass(
            'd-flex flex-row');
        $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').addClass(
            'md-form');
        $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
        $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').addClass('mdb-select');

        $('#dtMaterialDesignExample_wrapper .mdb-select, #dt-material-checkbox_wrapper .mdb-select').materialSelect();
        $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox_wrapper .dataTables_filterr').find(
            'label').remove();

        /* Dépôts */
        $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox2_wrapper').find('label').each(function() {
            $(this).parent().append($(this).children());
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox2_wrapper .dataTables_filter').find(
            'input').each(function() {
            $('input').attr("placeholder", "Rechercher");
            $('input').removeClass('form-control-sm');
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_length, #dt-material-checkbox2_wrapper .dataTables_length').addClass(
            'd-flex flex-row');
        $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox2_wrapper .dataTables_filter').addClass(
            'md-form');
        $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox2_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
        $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox2_wrapper select').addClass('mdb-select');

        $('#dtMaterialDesignExample_wrapper .mdb-select, #dt-material-checkbox2_wrapper .mdb-select').materialSelect();
        $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox2_wrapper .dataTables_filterr').find(
            'label').remove();

        // Tooltips Initialization
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function change_etat() {
            confirm("Voulez-vous vraiment changer l'état de l'utilisateur");
        }

    </script>
@endsection
