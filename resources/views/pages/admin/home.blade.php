@extends('layouts.app')

{{-- Importation css ici --}}
@section('extra-css')
    <style>
        .warning-color {
            background-color: #f0ad4e;
        }
        .success-color {
            background-color: #5cb85c;
        }

    </style>
@endsection

{{-- Contenu de la page ici --}}
@section('contenu_page')

    @if (session('the_user')[0]->profil == 'Chauffeur')
        @include('pages.admin._partials_statistiques.statistique_chauffeur')
    @elseif (session('the_user')[0]->profil == 'Transporteur')
        @include('pages.admin._partials_statistiques.statistique_transporteur')
    @elseif (session('the_user')[0]->profil == 'Administrateur')
        @include('pages.admin._partials_statistiques.statistique_administrateur')
    @elseif (session('the_user')[0]->profil == 'Client')
        @include('pages.admin._partials_statistiques.statistique_client')
    @endif

@endsection

{{-- Importation Js ici --}}
@section('extra-js')
    <script>
        //bar
        var ctxB = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [
                    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
                    "Aout", "Septembre", "Octobre", "Novembre", "Décembre"
                ],
                datasets: [{
                    label: '# Vente des mois',
                    data: [13, 19, 8, 11, 5, 6, 8, 11, 9, 10, 3, 15],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.3)',
                        'rgba(41, 182, 246, 0.3)',
                        'rgba(255, 187, 51, 0.3)',
                        'rgba(66, 133, 244, 0.3)',
                        'rgba(153, 102, 255, 0.3)',
                        'rgba(153, 129, 255, 0.3)',
                        'rgba(153, 178, 255, 0.3)',
                        'rgba(198, 122, 255, 0.3)',
                        'rgba(175, 92, 255, 0.3)',
                        'rgba(200, 102, 134, 0.3)',
                        'rgba(196, 102, 175, 0.3)',
                        'rgba(100, 102, 185, 0.3)',

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(41, 182, 246, 1)',
                        'rgba(255, 187, 51, 1)',
                        'rgba(66, 133, 244, 1)',
                        'rgba(153, 102, 255, 1)',

                    ],
                    borderWidth: 2
                }]
            },
            optionss: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
    <!-- Charts -->
    <script>
        // Small chart
        $(function() {
            $('.min-chart#chart-sales').easyPieChart({
                barColor: "#4285F4",
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        });



        //bar
        var ctxB = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: [
                    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
                    "Aout", "Septembre", "Octobre", "Novembre", "Décembre"
                ],
                datasets: [{
                    label: '# Vente des mois',
                    data: [13, 19, 8, 11, 5, 6, 8, 11, 9, 10, 3, 15],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.3)',
                        'rgba(41, 182, 246, 0.3)',
                        'rgba(255, 187, 51, 0.3)',
                        'rgba(66, 133, 244, 0.3)',
                        'rgba(153, 102, 255, 0.3)',
                        'rgba(153, 129, 255, 0.3)',
                        'rgba(153, 178, 255, 0.3)',
                        'rgba(198, 122, 255, 0.3)',
                        'rgba(175, 92, 255, 0.3)',
                        'rgba(200, 102, 134, 0.3)',
                        'rgba(196, 102, 175, 0.3)',
                        'rgba(100, 102, 185, 0.3)',

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(41, 182, 246, 1)',
                        'rgba(255, 187, 51, 1)',
                        'rgba(66, 133, 244, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(195, 134, 126, 1)',
                        'rgba(156, 15, 199, 1)',
                        'rgba(99, 187, 178, 1)',
                        'rgba(167, 122, 245, 1)',
                        'rgba(153, 156, 200, 1)',
                        'rgba(145, 100, 166, 1)',
                        'rgba(153, 125, 255, 1)',

                    ],
                    borderWidth: 2
                }]
            },
            optionss: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        //Mode Nuit
        $('#dark-mode').on('click', function(e) {

            e.preventDefault();
            $('footer').toggleClass('mdb-color lighten-4 dark-card-admin');
            $('body, .navbar').toggleClass('white-skin navy-blue-skin');
            $(this).toggleClass('white text-dark btn-outline-black');
            $('body').toggleClass('dark-bg-admin');
            $('.card').toggleClass('dark-card-admin');
            $('h6, .card, p, td, th, i, li a, h4, input, label').not(
                '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
            $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
            $('.gradient-card-header').toggleClass('white dark-card-admin');

            if ($('.navbar').hasClass('navy-blue-skin')) {
                for (let i = 0; i <= 12; i++) {
                    myBarChart.data.datasets[0].data[i] = (Math.random(i) * 100);
                }

                Chart.defaults.global.defaultFontColor = '#fff';
            } else {

                for (let i = 0; i <= 12; i++) {
                    myBarChart.data.datasets[0].data[i] = (Math.random(i) * 100);
                }

                Chart.defaults.global.defaultFontColor = '#666';
            }

            myBarChart.update();

        });

    </script>
@endsection
