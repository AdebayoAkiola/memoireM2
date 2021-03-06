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

            <h5 class="my-4 dark-grey-text font-weight-bold">Liste de l'ensemble des chauffeurs</h5>

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
                                    Date de depart
                                </th>
                                <th class="th-sm">
                                    Heure
                                </th>
                                <th class="th-sm">
                                    Duree estimee
                                </th>
                                <th class="th-sm">
                                    prix
                                </th>
                                <th class="th-sm">
                                    Plaque vehicule
                                </th>
                                <th class="th-sm">
                                    Nombre de place
                                </th>
                                <th class="th-sm">
                                    Chauffeur
                                </th>
                                <th class="th-sm">
                                    Trajet
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($courses as $course)
                            <tr>
                                <td></td>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->date_depart }}</td>
                                <td>{{ $course->heure_depart }}</td>
                                <td>{{ $course->duree }}</td>
                                <td>{{ $course->prix }}</td>
                                <td>{{ $course->immatriculation }}</td>
                                <td>{{ $course->nombre_de_place  }}</td>
                                <td>{{ $course->prenom  }} {{ $course->nom  }}</td>
                                <td>{{ $course->nom_trajet }}</td>
                                <td class="form-inline">
                                    <a>
                                        <form action="#" method="post"
                                            onsubmit=" return confirm('Voulez-vous vous souscrire a la course : {{ $course->id }} ?')">
                                            {{ csrf_field() }}
                                            {{--@method('DELETE')--}}
                                            <button type="submit"
                                                class="btn btn-sm btn-info" title="Supprimer">
                                                <i class="fa fa-trash fa-lg fa-fw" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </a>
                                   <!-- <a href="{{ route('course.show', $course->id) }}" data-toggle="tooltip"
                                        data-placement="top" title="Voir" class="text-primary">
                                        <i class="w-fa fas fa-user"></i>
                                    </a> -->
                                </td>
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
