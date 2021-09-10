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

            <h5 class="my-4 dark-grey-text font-weight-bold">Liste de l'ensemble des clients</h5>

            <div class="card">
                <div class="card-body">
                    <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="th-sm">
                                    Id
                                </th>
                                <th class="th-sm">
                                    Prenom
                                </th>
                                <th class="th-sm">
                                    Nom
                                </th>
                                <th class="th-sm">
                                    Telephone
                                </th>
                                <th class="th-sm">
                                    Email
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($clients as $client)
                            <tr>
                                <td></td>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->prenom }}</td>
                                <td>{{ $client->nom }}</td>
                                <td>{{ $client->telephone }}</td>
                                <td>{{ $client->email }}</td>
                                <td class="form-inline">
                                    <a href="{{ route('client.show', $client->id) }}" class="btn btn-sm btn-primary"
                                        title="Modifier">
                                        <i class="fas fa-edit fa-lg fa-fw"></i>
                                    </a>
                                    <a>
                                        <form action="{{ route('client.destroy', $client->id) }}" method="post"
                                            onsubmit=" return confirm('Voulez-vous supprimer le client : {{ $client->prenom }} {{ $client->nom }} ?')">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger" title="Supprimer">
                                                <i class="fa fa-trash fa-lg fa-fw" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </a>
                                   <!-- <a href="{{ route('client.show', $client->id) }}" data-toggle="tooltip"
                                        data-placement="top" title="Voir" class="text-primary">
                                        <i class="w-fa fas fa-user"></i>
                                    </a> -->

                                    @if ($client->etat == 'desactiver')
                                    <a href="{{ url('client/status', [$client->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Activer"
                                        class="text-warning"
                                        onclick="return confirm('Voulez-vous activer le client {{ $client->prenom }} {{ $client->nom }} ?')">
                                        <i class="w-fa fas fa-edit"></i>
                                    </a>

                                    @elseif ($client->etat == 'suspendus')
                                    <a href="{{ url('client/status', [$client->id]) }}}"
                                            data-toggle="tooltip" data-placement="top" title="Activer"
                                            class="text-danger"
                                            onclick="return confirm('Voulez-vous activer le client {{ $client->prenom }} {{ $client->nom }} ?')">
                                            <i class="w-fa fas fa-edit"></i>
                                        </a>

                                    @elseif ($client->etat == 'activer')
                                        <a href="{{ url('client/status', [$client->id]) }}"
                                            data-toggle="tooltip" data-placement="top" title="Suspendre"
                                            class="text-success"
                                            onclick="return confirm('Voulez-vous suspendre le client {{ $client->prenom }} {{ $client->nom }} ?')">
                                            <i class="w-fa fas fa-edit"></i>
                                        </a>

                                    @endif

                                </td>
                                {{--<td>
                                    <a
                                        href="#"
                                        class="btn btn-sm btn-success text-white"
                                        title="Voir les transporteur">
                                        Voir les clients
                                    </a>
                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'os',
                selector: 'td:first-child'
            }
        });

        $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox_wrapper').find('label').each(function() {
            $(this).parent().append($(this).children());
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').find(
            'input').each(function() {
            $('input').attr("placeholder", "Search");
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

    </script>
@endsection
