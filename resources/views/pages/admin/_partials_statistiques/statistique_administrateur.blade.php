{{-- Header --}}
<section class="mt-md-4 pt-md-2 mb-5">
    <!-- First row -->
    <div class="row">

        <!-- Vente -->
        <div class="col-xl-4 col-md-4 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
                <a href="#">
                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Ventes</p>
                            <h4 class="font-weight-bold dark-grey-text"> {{--{{ number_format($vente_jour, 3) }} F--}}prix</h4>
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Vente du jour</p>
                    </div>
                </a>

            </div>
            <!-- Card -->

        </div>
        <!-- Vente -->

        <!-- Stock Bouticles -->
        <div class="col-xl-4 col-md-4 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <a href="{{ url('stock-boutique') }}">
                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Articles</p>
                            <h4 class="font-weight-bold dark-grey-text"> {{--{{ $nombre_article }}--}}15 </h4>
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                        </div>
                        <p class="card-text">Nombre d'articles disponible</p>
                    </div>
                </a>
            </div>
            <!-- Card -->

        </div>
        <!-- Stock Bouticles -->

        <!-- Stock depots -->
        <div class="col-xl-4 col-md-4 mb-md-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <a href="{{ url('stock-depot') }}">
                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Stocks dépôt</p>
                            <h4 class="font-weight-bold dark-grey-text">{{--{{ $nombre_article_depot }}--}}5</h4>
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar red accent-2" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Nombre d'articles en stocks</p>
                    </div>
                </a>
            </div>
            <!-- Card -->

        </div>
        <!-- Stock depots -->


        <!-- Boutiques -->
        <div class="col-xl-4 col-md-4 mt-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
                <a href="{{ route('boutique.index') }}">
                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Boutiques</p>
                            <h4 class="font-weight-bold dark-grey-text">{{--{{ $nombre_boutiques }}--}}2</h4>
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Nombre de boutiques</p>
                    </div>
                </a>
            </div>
            <!-- Card -->

        </div>
        <!-- Boutiques -->

        <!-- Dépôts -->
        <div class="col-xl-4 col-md-4 mt-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
                <a href="{{ route('depot.index') }}">
                    <!-- Card Data -->
                    <div class="admin-up">
                        <i class="fas fa-chart-bar green accent-2 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase">Dépôts</p>
                            <h4 class="font-weight-bold dark-grey-text">{{--{{ $nombre_depots }}--}}3</h4>
                        </div>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="card-text">Nombre de dépôts</p>
                    </div>
                </a>
            </div>
            <!-- Card -->

        </div>
        <!-- Dépôts -->
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
