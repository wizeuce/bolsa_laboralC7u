<?php
include("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEMA DE BOLSA LABORAL</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo RUTAGENERAL; ?>/templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?php echo RUTAGENERAL; ?>/templates/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo RUTAGENERAL; ?>/templates/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Estulos par usar jquery ui -->
    <link href="<?php echo RUTAGENERAL; ?>/js/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="<?php echo RUTAGENERAL; ?>/js/jquery-ui.theme.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Inicio - Sidebar (Menú Izquierdo) -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="d-flex justify-content-center align-items-center py-2">
                <a href="<?php echo RUTAGENERAL; ?>/index.php" title="home" class="text-decoration-none">
                    <div class="d-flex align-items-center text-white" style="gap: 1rem">
                        <i class="fas fa-briefcase" style="font-size: 1.875rem"></i>
                        <div class="d-flex flex-column">
                            <span class="fw-semibold" style="font-size: 1rem">Bienvenido a la</span>
                            <span class="italic mt-n1" style="font-size: 0.875rem">BOLSA LABORAL</span>
                        </div>
                    </div>
                </a>
            </div>

            <?php
            if (isset($_SESSION['SESSION_ROL'])) {
            ?>
                <div class="mx-3 mt-2">
                    <div class="text-white text-center rounded-pill" style="background: linear-gradient(to right, #f59e0b, #f97316); font-size: 0.875rem">
                        <?php
                        echo "Rol: ", $_SESSION['SESSION_ROL_NAME'];
                        ?>
                    </div>
                </div>
            <?php
            } else {
                
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Inico -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Nav Item - Registrarse -->
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/usuario/registro_usuarios.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Registrar Usuario</span></a>
            </li>

            <!-- Nav Item - Registrarse -->
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/oferta/registro_ofertas.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Registrar Oferta</span></a>
            </li>

            <?php

            //listar usuarios (solo admin)
            if (isset($_SESSION['SESSION_ROL']) && $_SESSION['SESSION_ROL'] == '1') {
            ?>

                <!-- Nav Item - Lista de usuarios -->
                <li class="nav-item  ">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/usuario/listar_usuarios.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Lista de Usuarios</span></a>
                </li>
            <?php
            } else {
                
            }
            ?>
            <?php


            //registrar empresas (solo admin)
            if (isset($_SESSION['SESSION_ROL']) && $_SESSION['SESSION_ROL'] == '1') {
            ?>

                <!-- Nav Item - Lista de usuarios -->
                <li class="nav-item  ">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/empresa/registrar_empresa.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Registrar empresa</span></a>
                </li>
            <?php
            } else {
                
            }
            ?>
            <?php

            //listar empresas empresas (solo admin)
            if (isset($_SESSION['SESSION_ROL']) && $_SESSION['SESSION_ROL'] == '1') {
            ?>

                <!-- Nav Item - Lista de usuarios -->
                <li class="nav-item  ">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/empresa/listar_empresas.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Listar empresa</span></a>
                </li>
            <?php
            } else {
                
            }
            ?>
            <?php


            //listar empresas empresas (solo admin)
            if (isset($_SESSION['SESSION_ROL']) && $_SESSION['SESSION_ROL'] == '1') {
            ?>

                <!-- Nav Item - Lista de usuarios -->
                <li class="nav-item  ">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/oferta/listar_ofertas.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Listar Ofertas</span></a>
                </li>
            <?php
            } else {
                
            }
            ?>
            <?php

            if (!isset($_SESSION['SESSION_NOMBRES'])) {

            ?>
                <!-- Nav Item - Iniciar Sesion -->
                <li class="nav-item  ">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/form_login.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Iniciar Sesion</span></a>
                </li>

            <?php
            } else {
            ?>
                <!-- Nav Item - Iniciar Sesion -->
                <li class="nav-item  ">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>/source/logout.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Cerrar Sesion</span></a>
                </li>
            <?php
            }

            ?>

        </ul>
        <!-- Fin - Sidebar (Menú Izquierdo) -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="bg-gray-100">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php

                    if (isset($_SESSION['SESSION_NOMBRES'])) {
                        echo "BIENVENIDO: ", $_SESSION['SESSION_NOMBRES'], " ", $_SESSION['SESSION_APELLIDOS'];

                        // Verificar si el usuario está asignado a una empresa
                        if (isset($_SESSION['SESSION_EMPRESA'])) {
                            echo " - Empresa: ", $_SESSION['SESSION_EMPRESA'];
                        } else {
                            echo " - Sin empresa afiliada";
                        }
                    } else {
                        echo "INICIAR SESION";
                    }

                    ?>
                </nav>
                <!-- End of Topbar -->