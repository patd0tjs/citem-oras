<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Citem ORAS</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?= base_url()?>plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url()?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url()?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url()?>plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="<?= base_url()?>dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?= base_url()?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="<?= base_url()?>plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?= base_url()?>plugins/summernote/summernote-bs4.min.css">

        <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.1/r-3.0.3/sc-2.4.3/datatables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.1/r-3.0.3/sc-2.4.3/datatables.min.js"></script>
        <!-- Buttons extension -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

        <!-- PDFMake for PDF export -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="<?=base_url()?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>

            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?= base_url()?>logout" class="nav-link">Logout</a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="" class="brand-link" disabled>
                    <img src="<?=base_url()?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><?= ucwords($intern_name)?></span>
                </a>

                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="<?= base_url()?>" class="nav-link <?= ($page =='Time Logger') ? 'active' : ''?>">
                                    <i class="fas fa-clock nav-icon"></i>
                                    <p>Time Logger</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url()?>timelogs" class="nav-link <?= ($page =='Timelogs') ? 'active' : ''?>">
                                    <i class="fas fa-hourglass nav-icon"></i>
                                    <p>Timelogs</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $page?></h1>
                        </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <?= $this->renderSection('content') ?>
                </section>

            </div>

        </div>
        <script>
            new DataTable("#datatable", {
                order: [],
                dom: 'Bfrtip', // B for buttons
                buttons: [
                    'pdfHtml5'
                ],
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        title: '<?= ucwords($intern_name)?> Intern Summary',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });
        </script>
        <script src="<?= base_url()?>plugins/jquery/jquery.min.js"></script>
        <script src="<?= base_url()?>plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="<?= base_url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url()?>plugins/chart.js/Chart.min.js"></script>
        <script src="<?= base_url()?>plugins/sparklines/sparkline.js"></script>
        <script src="<?= base_url()?>plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?= base_url()?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="<?= base_url()?>plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?= base_url()?>plugins/moment/moment.min.js"></script>
        <script src="<?= base_url()?>plugins/daterangepicker/daterangepicker.js"></script>
        <script src="<?= base_url()?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?= base_url()?>plugins/summernote/summernote-bs4.min.js"></script>
        <script src="<?= base_url()?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="<?= base_url()?>dist/js/adminlte.js"></script>
    </body>
</html>