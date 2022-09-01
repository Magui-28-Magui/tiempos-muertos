<!doctype html>
<html lang="en" class="menu_branded theme-sky font-poppins" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/DataTables-1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/Buttons-2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <title>Captura de tiempo muerto</title>
</head>
<style>
    table.dataTable td {
  font-size: 0.8rem !important;
}
</style>
<body class="d-flex flex-column min-vh-100">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#"><img width="150" src="<?php echo base_url(); ?>assets/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <?php if(!isset($user_email)) : ?>
                    <li class="nav-item">
                        <a href="<?=base_url();?>" class="nav-link">Inicio</a>
                    </li>
                    <?php else : ?>
                        <li class="nav-item">
                        <a href="<?=base_url('management');?>" class="nav-link">Inicio</a>
                    </li>
                    <?php endif;?>
                    <?php if(!isset($user_email)) : ?>
                    <li class="nav-item">
                        <a href="<?= LOGIN_URL ?>" class="nav-link">Administrar</a>
                    </li>
                    <?php endif; ?>
                    </ul>
                    <?php if(isset($user_email)) : ?>
                    <form class="d-flex" style="margin-right: 4rem;">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="#" class="nav-link"></a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-user"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="<?= base_url() ?>logout">Cerrar sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </form>
                    <?php endif;?>
                    <span class="navbar-text text-uppercase fw-bold fs-5" style="color: #00468A;">
                        Registro de factores que afectan eficiencia
                    </span>
                </div>
            </div>
        </nav>
        <nav class="<?= isset($user_email) ? 'navbar navbar-expand-lg navbar-light bg-success shadow p-0 m-0' : 'navbar navbar-expand-lg navbar-light bg-danger shadow p-0 m-0'?>">
            <div class="container-fluid">
                    <span class="navbar-text text-uppercase fw-bold text-white" style="font-size: 0.8rem;">
                        <!--Registro de factores que afectan eficiencia-->
                    </span>
                </div>
            </div>
        </nav>