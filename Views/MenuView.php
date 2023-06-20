<?php
class MenuView
{
    function showMenu()
    {
?>
        <!DOCTYPE html>
        <html lang="ed">

        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>SERVIHOGAR</title>
            <meta content="" name="description">
            <meta content="" name="keywords">
            <!-- Favicons -->
            <link href="assets/img/logo.png" rel="icon">
            <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

            <!-- Google Fonts -->
            <link href="https://fonts.gstatic.com" rel="preconnect">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

            <!-- Vendor CSS Files -->
            <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
            <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
            <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
            <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
            <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
            <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
            <link rel="stylesheet" href="assets/vendor/toastr/toastr.css">

            <!-- Template Main CSS File -->
            <link href="assets/css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="assets/css/asd.css">

            <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
        </head>

        <body>

            <!-- ======= Header ======= -->
            <header id="header" class="header fixed-top d-flex align-items-center">

                <div class="d-flex align-items-center justify-content-between">
                    <a href="index.php" class="logo d-flex align-items-center">
                        <img src="assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">SERVIHOGAR</span>
                    </a>
                    <i class="bi bi-list toggle-sidebar-btn"></i>
                </div><!-- End Logo -->

                <nav class="header-nav ms-auto">
                    <ul class="d-flex align-items-center">

                        <li class="nav-item d-block d-lg-none">
                            <a class="nav-link nav-icon search-bar-toggle " href="#">
                                <i class="bi bi-search"></i>
                            </a>
                        </li><!-- End Search Icon-->

                        <li class="nav-item dropdown pe-3">

                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                                <span class="d-none d-md-block dropdown-toggle ps-2"> <?= $_SESSION['acce_usuario']; ?> </span>
                            </a><!-- End Profile Iamge Icon -->
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6><?= $_SESSION['acce_usuario']; ?></h6>
                                    <span> C.C. <?= $_SESSION['acce_documento']; ?></span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <!-- <a class="dropdown-item d-flex align-items-center" data-widget="control-sidebar" href="#" role="button" onclick="Menu.closeSession()"> -->
                                    <a class="dropdown-item d-flex align-items-center" href="#" role="button" onclick="Menu.closeSession()">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>CERRAR</span>
                                    </a>
                                </li>

                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->

                    </ul>
                </nav><!-- End Icons Navigation -->

            </header><!-- End Header -->

            <!-- ======= Sidebar ======= -->
            <aside id="sidebar" class="sidebar">

                <ul class="sidebar-nav" id="sidebar-nav" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a class="nav-link " href="index.php">
                            <i class="bi bi-grid"></i>
                            <span>Principal</span>
                        </a>

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>USUARIOS DEL SISTEMA</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                            <!--<li>
                                <a href="#" onclick="Menu.menu('EmpleadoController/paginateEmpleado')" class="nav-link">
                                    <i class="bi bi-circle-fill"></i><span class="text-black">EMPLEADOS</span>
                                </a>
                            </li>-->
                            <li>
                                <a href="#" onclick="Menu.menu('UserAccessController/paginateUserAccess')" class="nav-link">
                                    <i class="bi bi-circle-fill"></i><span class="text-black">ACCESO</span>
                                </a>
                            </li>

                        </ul>
                    </li><!-- End Components Nav -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#clientes" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>CLIENTES</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="clientes" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                            <li>
                                <a href="#" onclick="Menu.menu('ClientController/paginateClient')" class="nav-link">
                                    <i class="bi bi-circle-fill"></i><span class="text-black">CLIENTES</span>
                                </a>
                            </li>

                        </ul>
                    </li><!-- End clientes -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#proveedor" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>PROVEEDOR</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="proveedor" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                            <li>
                                <a href="#" onclick="Menu.menu('ProviderController/paginateProvider')" class="nav-link">
                                    <i class="bi bi-circle-fill"></i><span class="text-black">Proveedores</span>
                                </a>
                            </li>

                        </ul>
                    </li><!-- End proveedor -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#producto" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>PRODUCTOS</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="producto" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                            <li>
                                <a href="#" onclick="Menu.menu('ProductController/paginateProduct')" class="nav-link">
                                    <i class="bi bi-circle-fill"></i><span class="text-black">Producto</span>
                                </a>
                            </li>

                        </ul>
                    </li><!-- End producto -->


                </ul>

            </aside><!-- End Sidebar-->

            <main id="main" class="main">

                <div class="content">
                    <div class="container-fluid">

                        <div id="content">

                            <h1>SERVIHOGAR</h1>

                        </div>

                    </div><!-- /.container-fluid -->
                </div>

            </main><!-- End #main -->

            <!-- MODAL DE PAIS -->
            <div class="modal fade" id="my_modal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_title"></h5>
                            </button>
                        </div>
                        <div id="modal_content" class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL PAIS -->

            <!-- ======= Footer ======= -->
            <footer id="footer" class="footer">
                <div class="copyright">
                    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </footer><!-- End Footer -->

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            <!-- Vendor JS Files -->
            <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/chart.js/chart.min.js"></script>
            <script src="assets/vendor/echarts/echarts.min.js"></script>
            <script src="assets/vendor/quill/quill.min.js"></script>
            <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="assets/vendor/tinymce/tinymce.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>

            <script src="assets/vendor/toastr/toastr.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>
            <script src="assets/js/Menu.js"></script>
            <script src="assets/js/Empleado.js"></script>
            <script src="assets/js/UserAccess.js"></script>
            <script src="assets/js/Client.js"></script>
            <script src="assets/js/Provider.js"></script>
            <script src="assets/js/Product.js"></script>



        </body>

        </html>

<?php

    }
}

?>