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

            <h5 class="my-4 dark-grey-text font-weight-bold">Liste de l'ensemble des courses</h5>

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
                                <td>{{ $course->prenom}} {{$course->nom}}</td>
                                <td>{{ $course->nom_trajet }}</td>
                                <td class="form-inline">
                                    @if (session('the_user')[0]->profil == 'Chauffeur')
                                    <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-primary"
                                        title="Modifier">
                                        <i class="fas fa-edit fa-lg fa-fw"></i>
                                    </a>
                                    <a>
                                        <form action="{{ route('course.destroy', $course->id) }}" method="post"
                                            onsubmit=" return confirm('Voulez-vous supprimer la course : {{ $course->id }} ?')">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger" title="Supprimer">
                                                <i class="fa fa-trash fa-lg fa-fw" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </a>
                                    @endif
                                    @if (session('the_user')[0]->profil == 'Client')
                                        <a href="{{ url('reservationStore', $course->id) }}"
                                                class="btn btn-sm btn-success text-white"
                                                title="Reservation">
                                                Reservation</i>
                                        </a>
                                    @endif
                                    @if (session('the_user')[0]->profil == 'Administrateur')
                                    @if ($course->etat == 'desactiver')
                                    <a href="{{ url('course/status', [$course->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Activer"
                                        class="text-warning"
                                        onclick="return confirm('Voulez-vous activer la course {{ $course->id }} ?')">
                                        <i class="w-fa fas fa-edit"></i>
                                    </a>

                                    @elseif ($course->etat == 'suspendus')
                                    <a href="{{ url('course/status', [$course->id]) }}}"
                                            data-toggle="tooltip" data-placement="top" title="Activer"
                                            class="text-danger"
                                            onclick="return confirm('Voulez-vous activer la course {{ $course->id }}?')">
                                            <i class="w-fa fas fa-edit"></i>
                                        </a>

                                    @elseif ($course->etat == 'activer')
                                        <a href="{{ url('course/status', [$course->id]) }}"
                                            data-toggle="tooltip" data-placement="top" title="Suspendre"
                                            class="text-success"
                                            onclick="return confirm('Voulez-vous suspendre la course {{ $course->id }} ?')">
                                            <i class="w-fa fas fa-edit"></i>
                                        </a>

                                    @endif
                                    @endif

                                </td>
                                {{--<td>
                                    <a
                                        href="#"
                                        class="btn btn-sm btn-success text-white"
                                        title="Voir les vehicules">
                                        Voir les vehicules
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
