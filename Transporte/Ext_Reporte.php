<?php include_once "../BD_Conexion.php";
$dias_espaniol = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
//echo $dias_espaniol[date("w")];

if (!isset($login)) {
    session_start();
    $User = $_SESSION['User'];
    $Usuario = $_SESSION['UserName'];
    $Tipo = $_SESSION['Tipo'];

    if (!isset($User)) {
        header("location:/SistemaTansporte/logout.php");
    }
}
date_default_timezone_set('America/Mexico_City');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Beyonz Mexicana" name="" />
    <title>Solicitud Transporte</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <!-- Styles CSS -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- Imagen principal Favicon -->
    <link href="../img/trans.png" rel="icon" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<style>
    body {
        margin: 0;
        background: url('/img/fondooo.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        color: #0a0a0b;
    }
</style>

<style>
    div#content {
        display: none;
        padding: 10px;
        background-color: rgba(197, 197, 197, 0.527), 216, 216);
        width: 200;
        cursor: pointer;
    }

    input#show:checked~div#content {
        display: block;
    }

    input#hide:checked~div#content {
        display: none;
    }

    .volume {
        height: 15px;
        width: 15px;
    }

    #select_list {
        width: 100px;
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>

<style>
    ul,
    nav {
        list-style: none;
        padding: 0;
    }

    a {
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        opacity: 0.9;
    }

    h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #fff;
        margin: 0 0 1.5rem;
    }

    header {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 10;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
        padding: 10px 100px 0;
    }

    a.btn {
        color: #fff;
        padding: 10px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        transition: all 0.2s;
    }

    a.btn:hover {
        background: hsl(241, 100%, 17%);
        border: 1px solid #12025a;
        color: #fff;

    }
</style>

<style>
    html,
    body {
        height: 100%;
    }

    .source {
        position: fixed;
        right: 2rem;
        bottom: 2rem;
    }

    .source a {
        color: #fff;
        text-decoration: none;
    }

    .source a span {
        opacity: 0.32;
    }

    .phone-footer {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        width: 16%;
        height: 4em;
        padding-left: 2em;
        padding-right: 2em;
    }

    .nav {
        display: -webkit-box;
        display: flex;
        width: 100%;
        -webkit-box-pack: justify;
        justify-content: space-between;
    }

    .nav-item {
        position: relative;
        display: -webkit-box;
        display: flex;
        padding: 8px;
        border-radius: 16px;
    }

    .nav-item:nth-child(1) {
        background-color: #EEEEEE;
    }

    .nav-item:nth-child(1) label {
        background-color: #032C83;
    }

    .nav-item:nth-child(1) span {
        color: #032C83;
    }

    .nav-item:nth-child(1) span:before {
        background-color: #EEEEEE;
    }

    .nav-item:nth-child(2) {
        background-color: #f6e3f1;
    }

    .nav-item:nth-child(2) label {
        background-color: #f263c9bf;
    }

    .nav-item:nth-child(2) span {
        color: #f263c9bf;
    }

    .nav-item:nth-child(2) span:before {
        background-color: #f263c9bf;
    }

    .nav-item:nth-child(3) {
        background-color: #fff3d9;
    }

    .nav-item:nth-child(3) label {
        background: rgb(26, 188, 156);
        background: -moz-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
        background: -webkit-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
        background: linear-gradient(135deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
    }

    .nav-item:nth-child(3) span {
        background-color: #fff3d9;
    }

    .nav-item:nth-child(3) span:before {
        background: rgb(26, 188, 156);
        background: -moz-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
        background: -webkit-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
        background: linear-gradient(135deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
    }

    .nav-item:nth-child(4) {
        background-color: #afedf7;
    }

    .nav-item:nth-child(4) label {
        background-color: #1194aa;
    }

    .nav-item:nth-child(4) span {
        color: #1194aa;
    }

    .nav-item:nth-child(4) span:before {
        background-color: #1194aa;
    }

    .nav-item * {
        cursor: pointer;
    }

    .nav-item label {
        position: relative;
        display: inline-block;
        width: 1em;
        height: 1em;
        background-color: inherit;
        border-radius: 50%;
    }

    .nav-item label:before {
        content: "";
        position: absolute;
        top: -100%;
        left: -100%;
        width: 300%;
        height: 300%;
        background-color: transparent;
    }

    .nav-item span {
        font-size: 0.875em;
        margin-left: 0;
        max-width: 0;
        overflow: hidden;
        -webkit-transition-property: max-width, margin-left;
        transition-property: max-width, margin-left;
        -webkit-transition-duration: 0.32s;
        transition-duration: 0.32s;
        -webkit-transition-timing-function: ease;
        transition-timing-function: ease;
    }

    .nav-item span:before {
        content: "";
        opacity: 0;
        position: fixed;
        z-index: -1;
        top: 50%;
        margin-top: -100rem;
        left: 50%;
        margin-left: -100rem;
        width: 200rem;
        height: 200rem;
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transform: scale(0.1);
        transform: scale(0.1);
        border-radius: 50%;
        -webkit-transition-property: opacity, -webkit-transform;
        transition-property: opacity, -webkit-transform;
        transition-property: opacity, transform;
        transition-property: opacity, transform, -webkit-transform;
        -webkit-transition-duration: 0.32s;
        transition-duration: 0.32s;
        -webkit-transition-timing-function: ease;
        transition-timing-function: ease;
    }

    .nav-item input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
    }

    .nav-item input:checked+span {
        max-width: 100vw;
        margin-left: 4px;
    }

    .nav-item input:checked+span:before {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }


    body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Helvetica', sans-serif;
        background: rgb(26, 188, 156);
        background: -moz-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
        background: -webkit-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
        background: linear-gradient(135deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
    }


    span a {
        font-size: 18px;
        color: #cccccc;
        text-decoration: none;
        margin: 0 10px;
        transition: all 0.4s ease-in-out;

        &:hover {
            color: #ffffff;
        }
    }

    @keyframes float {
        0% {
            box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
            transform: translatey(0px);
        }

        50% {
            box-shadow: 0 25px 15px 0px rgba(0, 0, 0, 0.2);
            transform: translatey(-20px);
        }

        100% {
            box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
            transform: translatey(0px);
        }
    }

    .avatar {
        width: 120px;
        height: 120px;
        box-sizing: border-box;
        border: 5px white solid;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
        transform: translatey(0px);
        animation: float 6s ease-in-out infinite;

        img {
            width: 100%;
            height: auto;
        }
    }

    .suppoprt-me {
        display: inline-block;
        position: fixed;
        bottom: 10px;
        left: 10px;
        width: 20vw;
        max-width: 250px;
        min-width: 200px;
        z-index: 9;

        img {
            width: 100%;
            height: auto;
        }
    }
</style>


<body class="hold-transition sidebar-collapse">

    <div class="estilo py-3">
        <div class="container">
            <header style="background-color: rgb(21, 21, 192);">
                <h1><a href=""><i class="ion-plane text-info"></i>Beyonz Mexicana</a></h1>
                <nav>
                    <ul>
                        <li>
                            <a href="inicio.php" class="btn btn-primary"><i class="fa fa-home"></i> Inicio</a>
                            <a class="btn btn-dark" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            <a class="btn" href="../logout.php" title="Log out"><i class="fa fa-share"></i> Cerrar Sesion</a></a>
                        </li>
                    </ul>
                </nav>
            </header><br><br>
            <!-- Navbar End -->
            <div class="container py-5">
                <div class="row">
                    <div class="col-5">

                        <div class="container">
                            <div class="phone-footer">
                                <div class="nav-item">
                                    <label for="Home"></label>
                                    <input type="radio" name="nav" value="Home" id="Home" checked="checked" /><span>White</span>
                                </div>
                                <div class="nav-item">
                                    <label for="Likes"></label>
                                    <input type="radio" name="nav" value="Likes" id="Likes" /><span>Pink</span>
                                </div>
                                <div class="nav-item">
                                    <label for="Search"></label>
                                    <input type="radio" name="nav" value="Search" id="Search" /><span>Aqua</span>
                                </div>
                                <div class="nav-item">
                                    <label for="Profile"></label>
                                    <input type="radio" name="nav" value="Profile" id="Profile" /><span>Blue</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-3 text-right">
                        <h5><i id="change-animation-type-example" class="fas fa-car-side fa-1x"></i> Bienvenid@ al Sistema:</h5>
                    </div>
                    <div class="col-4 text-left py-1">
                        <?php $Usuario = $_SESSION['UserName'];
                        echo "<h3 class='nav-link' style='color: #005117;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
                    </div>
                </div>
            </div>
            <!-- Barra de busqueda Start -->
            <div class="bg-light shadow text-center" style="padding: 5px">
                <form id="form" name="form" method="GET" action="Ext_Reporte.php" autocomplete="off">
                    <h3 class="text-uppercase text-center" style="color: 3323232;"><em><strong>
                                <img src="../img/64652.png" alt="" width="50" height="50">
                                Buscar Reporte Por Fechas </strong></em></h3>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <label for="fecha_inicio"><strong>Fecha Inicio:</strong></label>
                                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control mt-2">
                                        <span class="validity"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <label for="fecha_fin"><strong>Fecha Fin:</strong></label>
                                        <input type="date" id="fecfecha_finhafin" name="fecha_fin" class="form-control mt-2">
                                        <span class="validity"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 style="color: white;">...........</h5>
                                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px"> Buscar</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
            </div><br>

            <!-- Barra de busqueda End -->
            <div class="">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 text-center">
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>

        <!-- Filtro de Registro Start -->
        <?php

        if (!isset($_GET['fecha_inicio'])) {
            $_GET['fecha_inicio'] = '';
        }
        if (!isset($_GET['fecha_fin'])) {
            $_GET['fecha_fin'] = '';
        }

        if ($_GET['fecha_inicio'] == '' and $_GET['fecha_fin'] == '') {
            $consulta = "SELECT SolicitudTransporte.ID,PersonalTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,
            SM_AltaFinanzas.AF_TelefonoC, SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,
            SR_RUTAS.ID_RUTA ,SolicitudTransporte.tipo_turno, SolicitudTransporte.turno,SolicitudTransporte.TiempoExSi,
            SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
            SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.sabado,SolicitudTransporte.FechaSolicitud,
            SolicitudTransporte.Responsable,SolicitudTransporte.Hora, ST_Empleados.Area
            FROM SolicitudTransporte 
            INNER JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN 
            INNER JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID 
            INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto = PersonalTransporte.Id_punto 
            INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta 
            INNER JOIN ST_Empleados ON ST_Empleados.Nomina = SolicitudTransporte.ID
            WHERE SolicitudTransporte.Estatus = 2 AND SolicitudTransporte.FechaSolicitud > DATEADD(month,-1,GETDATE()) 
            ORDER BY SolicitudTransporte.fecha_inicio DESC";
        } else {
            $consulta = "SELECT SolicitudTransporte.ID,PersonalTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,
            SM_AltaFinanzas.AF_TelefonoC, SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,
            SR_RUTAS.ID_RUTA ,SolicitudTransporte.tipo_turno, SolicitudTransporte.turno,SolicitudTransporte.TiempoExSi,
            SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
            SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.sabado,SolicitudTransporte.FechaSolicitud,
            SolicitudTransporte.Responsable,SolicitudTransporte.Hora, ST_Empleados.Area
            FROM SolicitudTransporte 
            INNER JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN 
            INNER JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID 
            INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto = PersonalTransporte.Id_punto 
            INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta 
            INNER JOIN ST_Empleados ON ST_Empleados.Nomina = SolicitudTransporte.ID
            WHERE SolicitudTransporte.Estatus = 2 AND ";

            if ($_GET["fecha_inicio"] != '' && $_GET["fecha_fin"] != '') {
                $consulta .= " SolicitudTransporte.fecha_inicio BETWEEN '" . $_GET["fecha_inicio"] . "' AND '" . $_GET["fecha_fin"] . "' ";
            }
            $consulta .= "ORDER BY SolicitudTransporte.fecha_inicio ASC";
        }
        ?>
        <!-- Filtro de Registro End -->

        <!-- Container Filtro Applicado Start -->
        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <div id="filtro" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h2 class="text-uppercase text-center" style=" color:#12025a; Font-family: Arial">
                                                        <img src="../img/report.webp" alt="" width="70" height="70">
                                                        <strong>EXPORTAR Reporte De Transporte Solicitado</strong>
                                                        <img src="../img/report.webp" alt="" width="70" height="70">
                                                    </h2>
                                                    <hr style="border:0px; border-top: 1px dotted #028271;">
                                                    <table id="myTable" class="table mt-3">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th class="sorting text-center" style="background-color: #278581;">NOMINA</th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">USUARIO</th>
                                                                <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">INICIO</th>
                                                                <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">FIN</th>
                                                                <th class="sorting text-center" aria-label="">TEL</th>
                                                                <th class="sorting text-center" aria-label="">DOMICILIO</th>
                                                                <th class="sorting text-center" aria-label="">PUNTO</th>
                                                                <th class="sorting text-center" aria-label="">LINEA</th>
                                                                <th class="sorting text-center" aria-label="">RUTA</th>
                                                                <th class="sorting text-center" aria-label="">T.TURNO</th>
                                                                <th class="sorting text-center" aria-label="">TURNOS</th>
                                                                <th class="sorting text-center" aria-label="">EXTRAS</th>
                                                                <th class="sorting text-center" aria-label="">HORARIO</th>
                                                                <th class="sorting text-center" aria-label="">L</th>
                                                                <th class="sorting text-center" aria-label="">M</th>
                                                                <th class="sorting text-center" aria-label="">M</th>
                                                                <th class="sorting text-center" aria-label="">J</th>
                                                                <th class="sorting text-center" aria-label="">V</th>
                                                                <th class="sorting text-center" aria-label="">S</th>
                                                                <th class="sorting text-center" style="background-color: red;" aria-label="">SOLICITUD</th>
                                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">RESPONSABLE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tabla text-center">
                                                            <?php
                                                            $resultado = sqlsrv_query($conn, $consulta);
                                                            while ($row = sqlsrv_fetch_array($resultado)) {
                                                                echo "<tr>";
                                                                echo "<td style='background-color: #90BDBB; font-weight: bold;'>" . $row['ID'] . "</td>";
                                                                echo "<td>" . $row['Nombre'] . "</td>";
                                                                echo "<td style='background-color: #B6FAAB;'>" . $dias_espaniol[date_format($row['fecha_inicio'], 'w')] . date_format($row['fecha_inicio'], ' d/m/y') . "</td>";
                                                                echo "<td style='background-color: #9FD2ED;'>" . $dias_espaniol[date_format($row['fecha_fin'], 'w')] . date_format($row['fecha_fin'], ' d/m/y') . "</td>";
                                                                echo "<td>" . $row['AF_TelefonoC'] . "</td>";
                                                                echo "<td>" . $row['AF_Domicilio'] . "</td>";
                                                                echo "<td>" . $row['Nombre_punto'] . "</td>";
                                                                echo "<td>" . $row['Area'] . "</td>";
                                                                echo "<td>" . $row['ID_RUTA'] . "</td>";
                                                                echo "<td>" . $row['tipo_turno'] . "</td>";
                                                                echo "<td>" . $row['turno'] . "</td>";
                                                                echo "<td>" . $row['TiempoExSi'] . "</td>";
                                                                echo "<td>" . $row['Horario'] . "</td>";
                                                                echo "<td>" . $row['lunes'] . "</td>";
                                                                echo "<td>" . $row['martes'] . "</td>";
                                                                echo "<td>" . $row['miercoles'] . "</td>";
                                                                echo "<td>" . $row['jueves'] . "</td>";
                                                                echo "<td>" . $row['viernes'] . "</td>";
                                                                echo "<td>" . $row['sabado'] . "</td>";
                                                                echo "<td style='background-color: #ED9F9F; font-weight: bold;'>" . $dias_espaniol[date_format($row['FechaSolicitud'], 'w')] . date_format($row['FechaSolicitud'], ' d/m/y') . "</td>";

                                                                echo "<td style='background-color: #DCDCDC; font-weight: bold;'>" . $row['Responsable'] . "</td>";
                                                                "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="text-center">
                                                                <th class="sorting text-center" style="background-color: #278581;">NOMINA</th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">USUARIO</th>
                                                                <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">INICIO</th>
                                                                <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">FIN</th>
                                                                <th class="sorting text-center" aria-label="">TEL</th>
                                                                <th class="sorting text-center" aria-label="">DOMICILIO</th>
                                                                <th class="sorting text-center" aria-label="">PUNTO</th>
                                                                <th class="sorting text-center" aria-label="">LINEA</th>
                                                                <th class="sorting text-center" aria-label="">RUTA</th>
                                                                <th class="sorting text-center" aria-label="">T.TURNO</th>
                                                                <th class="sorting text-center" aria-label="">TURNOS</th>
                                                                <th class="sorting text-center" aria-label="">EXTRAS</th>
                                                                <th class="sorting text-center" aria-label="">HORARIO</th>
                                                                <th class="sorting text-center" aria-label="">L</th>
                                                                <th class="sorting text-center" aria-label="">M</th>
                                                                <th class="sorting text-center" aria-label="">M</th>
                                                                <th class="sorting text-center" aria-label="">J</th>
                                                                <th class="sorting text-center" aria-label="">V</th>
                                                                <th class="sorting text-center" aria-label="">S</th>
                                                                <th class="sorting text-center" style="background-color: red;" aria-label="">SOLICITUD</th>
                                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">RESPONSABLE</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            </form> <br>
            <!-- Container Filtro Applicado End -->

            <!-- Botton Volver start -->
            <div class="container">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-8 text-center">
                        <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás" class="btn btn-primary">
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div> <br>
            <!-- Botton Volver End -->

            <!-- footer section start -->
            <div class="contai mt-3">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- footer section starts  -->
                        <section class="container-fluid text-white-50 py-5 px-sm-3 px-lg-5" style="background-color: rgba(213, 212, 212, 0.466)">
                            <div class="box">
                                <h3 class="text-uppercase text-center" style="color: #001571;"><em><strong>
                                            <img src="../img/IconoPrincipal.png" alt="#" width="50" height="45" />
                                            Sistema de Transporte</strong></em></h3>
                                <hr style="color: #001571;">
                                <div class="credit" style="color: rgb(1, 1, 94);">
                                    &copy; BEYONZ <span> MEXICANA. 2023 </span>
                                </div>
                            </div>
                        </section>
                        <!-- footer section End  -->
                    </div>
                </div>
            </div>
            <!-- footer section End -->

            <!-- Topbar Start -->
            <div class="container-fluid bg-light pt-3 d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                            <div class="d-inline-flex align-items-center">
                                <p><i class="fa fa-envelope mr-2"></i>Sistemas@beyonz.com.mx</p>
                                <p class="text-body px-3">|</p>
                                <p><i class="fa fa-phone-alt mr-2"></i>Ext. #606,#620</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center text-lg-right">
                            <div class="d-inline-flex align-items-center">
                                <a class="text-primary px-3" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-primary px-3" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-primary px-3" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-primary px-3" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <!-- Template Javascript -->

            <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#myTable").DataTable({
                        dom: 'Bfrtip',
                        "ordering": false,
                        "searching": true,
                        "responsive": false,
                        "lengthChange": false,
                        "autoWidth": false,
                        "paging": true,
                        scrollY: false,
                        scrollX: true,
                        scrollCollapse: false,
                        buttons: [{
                                //Botón para Excel
                                extend: 'excel',
                                footer: true,
                                title: 'REPORTE DE TRANSPORTE',
                                filename: 'REPORTE DE TRANSPORTE',
                                //Aquí es donde generas el botón personalizado
                                text: '<button class="btn btn-success">Exportar a Excel <i class="fas fa-file-excel"></i></button>'
                            },
                            //Botón para PDF
                            {
                                extend: 'pdf',
                                footer: true,
                                title: 'REPORTE DE TRANSPORTE',
                                filename: 'REPORTE DE TRANSPORTE',
                                text: '<button class="btn btn-info">Exportar a PDF <i class="far fa-file-pdf"></i></button>'
                            },
                            //Botón para Print
                            {
                                extend: 'print',
                                footer: true,
                                title: 'REPORTE DE TRANSPORTE',
                                filename: 'REPORTE DE TRANSPORTE',
                                text: '<button class="btn btn-dark">Imprimir <i class="fa fa-print"></i></button>'
                            }
                        ]
                    });
                });

                $(document).ready(function() {
                    $("#myTable2").DataTable({});
                });
            </script>
</body>

</html>