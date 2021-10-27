<?php
include_once '../../configuracion.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap/bootstrapValidator.min.css" rel="stylesheet">
    <link href="../js/bootstrap/validator.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Trabajo Parctico 5</title>
</head>

<body>

    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">PDW | Grupo Mistchenco|Mora|Salvaro Trabajo Practico 5</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href='../index.html'>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href='../ejercicios/index.php'>index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html"></a>
                    </li>



                    <div id="final" class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 ">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ejercicios
                                </a>
                                <ul class="dropdown-menu me-3" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../ejercicios/listarUsuarios.php">Ver Todos los Usuarios</a></li>
                                    <li><a class="dropdown-item" href="../ejercicios/login.php">Login</a></li>
                                  
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
        </div>
    </nav>