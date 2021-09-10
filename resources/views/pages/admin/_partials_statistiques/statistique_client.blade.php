{{-- Header --}}
<section class="mt-md-4 pt-md-2 mb-5">
    <!-- First row -->
    <div class="row">

        <!-- First column -->
        <div class="col-xl-6 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
                <a href="{{ url('frais-gerant') }}">
                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Frais</p>
                            {{--@if ($montant_frais == 0)
                                <h4 class="font-weight-bold dark-grey-text"> Aucun frais</h4>
                            @else
                                <h4 class="font-weight-bold dark-grey-text"> {{ number_format($montant_frais, 3) }} F</h4>
                            @endif--}}aucun frais
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Total frais du jour</p>
                    </div>
                </a>
            </div>
            <!-- Card -->

        </div>
        <!-- First column -->

        <!-- Second column -->
        <div class="col-xl-6 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
                <a href="#">
                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Articles</p>
                            <h4 class="font-weight-bold dark-grey-text"> {{--{{ $nombre_article_depot }}--}}2 </h4>
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                           {{-- @if ($nombre_article_depot >= 1 && $nombre_article_depot <= 10)
                                <div class="progress-bar red accent-2" role="progressbar" style="width: 10%"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            @elseif ($nombre_article_depot >= 11 && $nombre_article_depot <= 100) <div
                                    class="progress-bar accent-2 warning-color" role="progressbar" style="width: 50%;"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                @else--}}
                                    <div class="progress-bar accent-2 success-color" role="progressbar"
                                        style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                            {{--@endif--}}
                        </div>
                        <p class="card-text">Nombre d'articles disponible dans le dépôt</p>
                    </div>
                </a>
            </div>
            <!-- Card -->

        </div>
        <!-- Second column -->


    </div>
    <!-- First row -->
</section>

{{-- Statistiques --}}
<div style="height: 5px"></div>

<!-- Section: Analytical panel -->
<section class="mb-5">

    <!-- Card -->
    <div class="card card-cascade narrower">

        <!-- Section: Chart -->
        <section>

            <!-- Grid row -->
            <div class="row">



                <!-- Grid column -->
                <div class="col-xl-12 col-md-12 mb-4">

                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header white">

                        <!-- Chart -->
                        <canvas id="barChart"></canvas>

                    </div>
                    <!-- Card image -->

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </section>
        <!-- Section: Chart -->

    </div>
    <!-- Card -->

</section>
<!-- Section: Analytical panel -->
