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
                        <a href="<?= base_url()?>admin/logout" class="nav-link">Logout</a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="" class="brand-link" disabled>
                    <img src="<?=base_url()?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><?= ucfirst(session()->get('name'))?></span>
                </a>

                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item <?= (in_array($page,['Intern Timelogs', 'Accumulated Hours']) ? 'menu-open' : '')?>">
                                <a href="<?= base_url()?>admin" class="nav-link <?= (in_array($page,['Intern Timelogs', 'Accumulated Hours']) ? 'active' : '')?>">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>
                                        DTR
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url()?>admin" class="nav-link <?= ($page =='Intern Timelogs') ? 'active' : ''?>">
                                            <i class="far fa-clock nav-icon"></i>
                                            <p>Intern Timelogs</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url()?>admin/accumulated" class="nav-link <?= ($page =='Accumulated Hours') ? 'active' : ''?>">
                                            <i class="fas fa-hourglass nav-icon"></i>
                                            <p>Accumulated Hours</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url()?>admin/schools" class="nav-link <?= ($page =='Schools') ? 'active' : ''?>">
                                    <i class="fas fa-graduation-cap nav-icon"></i>
                                    <p>Schools</p>
                                </a>
                            </li>
                            <li class="nav-item <?= (in_array($page,['Intern Users', 'Admin Users']) ? 'menu-open' : '')?>">
                                <a href="#" class="nav-link <?= (in_array($page,['Intern Users', 'Admin Users']) ? 'active' : '')?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Accounts
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url()?>admin/interns" class="nav-link <?= ($page =='Intern Users') ? 'active' : ''?>">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Interns</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url()?>admin/users" class="nav-link <?= ($page =='Admin Users') ? 'active' : ''?>">
                                    <i class="fas fa-user-shield nav-icon"></i>
                                    <p>Admins</p>
                                    </a>
                                </li>
                                </ul>
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
                order: []
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