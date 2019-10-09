<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SECconsult</title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url('bootstrap/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <!-- <link href="<?php echo base_url('bootstrap/css/sb-admin-2.min.css'); ?>" rel="stylesheet"> -->
        <link href="<?php echo base_url('bootstrap/css/pers.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('bootstrap/vendor/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('bootstrap/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    </head>
    <!-- Modal grande -->

   
  

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('index-corpo'); ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                    </div>
                    <i class="fas fa-plus-square"></i>
                    <div class="sidebar-brand-text mx-3">SECconsult</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('index-corpo'); ?>">
                    <i class="fas fa-clinic-medical"></i>
                        <span>Resumo</span></a>
                </li>
             


                <?php if($tipo['tipo'] == 0):?>
                <hr class="sidebar-divider">

                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('agenda-cad'); ?>">
                <i class="fas fa-calendar-plus"></i>
                        <span>Agenda</span></a>
                </li>
                <?php endif;?>

                <?php if($tipo['tipo'] == 0):?>
                <hr class="sidebar-divider">

                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('agenda-cad'); ?>">
                <i class="fas fa-chart-pie"></i>
                        <span>Relatorio</span></a>
                </li>
                <?php endif;?>
                
                <?php if($tipo['tipo'] != 0):?>
                <hr class="sidebar-divider">
                
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Prontuario'); ?>">
                <i class="fas fa-file"></i>
                        <span>Prontuario</span></a>
                </li>
                <?php endif;?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                       
                    </nav>
                    <!-- End of Topbar -->