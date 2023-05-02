<?php
$url_base="http://localhost/mentorias/";
?>

<!doctype html>
<html lang="es">

<head>
  <title>Mentorias</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Jose Alonso Rodriguez Moscoso - 202220266 -->
    <!-- Willian Berrocal Alvarado - 201820030 -->
    <!-- Yoselyn Victoria Miranda Chirinos - 202120373 -->
    <!-- Haydi Landa - 202110412 -->

</head>
<body class="d-flex flex-column min-vh-100">
  <header>
  <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno">Alumno</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/curso">Curso</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/mentor">Mentor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/ubicacion">Ubicacion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/inst_educativa">Inst. Educativa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/curso_dominado_por_mentor">Curso dominado por Mentor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/info_curso_de_institucion">Inf. del Curso de Institucion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/info_mentor">Inf. de Mentor</a>
            </li>
        </ul>
    </nav>
  </header>
  <main class="container">