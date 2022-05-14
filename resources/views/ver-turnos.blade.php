<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ver Turnos</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    </head>
    <body>
        @include('partials.nav')
        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Mis turnos</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Tipo de Vacuna</th>
                                    <th class="border-0">Lote</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Fecha</th>
                                    <th class="border-0">Vacunatorio</th>
                                    <th class="border-0">Estado del Turno</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #1 </td>
                                    <td>id000001 </td>
                                    <td>20</td>
                                    <td>$80.00</td>
                                    <td>27-08-2018 01:22:12</td>
                                    <td>Patricia J. King </td>
                                    <td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic-2.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #2 </td>
                                    <td>id000002 </td>
                                    <td>12</td>
                                    <td>$180.00</td>
                                    <td>25-08-2018 21:12:56</td>
                                    <td>Rachel J. Wicker </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic-3.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #3 </td>
                                    <td>id000003 </td>
                                    <td>23</td>
                                    <td>$820.00</td>
                                    <td>24-08-2018 14:12:77</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic-4.jpg" alt="user" class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #4 </td>
                                    <td>id000004 </td>
                                    <td>34</td>
                                    <td>$340.00</td>
                                    <td>23-08-2018 09:12:35</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>