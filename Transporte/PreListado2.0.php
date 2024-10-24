<?php

include_once "../BD_Conexion.php";
$dias_espaniol = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

include "../Query.php";
if (!isset($login)) {

    $User = $_SESSION['User'];
    $Usuario = $_SESSION['UserName'];
    $Tipo = $_SESSION['Tipo'];

    if (!isset($User)) {
        header("location:/SistemaTansporte/logout.php");
    }
}
date_default_timezone_set('Etc/GMT+6');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Beyonz Mexicana" name="" />
    <title>Solicitud L-V</title>
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
        width: 100px;
        height: 100px;
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
    <div class="estilo py-4">
        <div class="container">
            <header style="background-color: rgb(21, 21, 192);">
                <h1><a href=""><i class="ion-plane text-info"></i>Beyonz Mexicana</a></h1>
                <nav>
                    <ul>
                        <li>
                            <a href="index.php" class="btn btn-primary"><i class="fa fa-home"></i> Inicio</a>
                            <a class="btn btn-dark" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            <a class="btn" href="../logout.php" title="Log out"><i class="fa fa-share"></i> Cerrar Sesion</a></a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div><br><br><br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4">
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

            <div class="col-3 text-right">
                <h5><i id="change-animation-type-example" class="fas fa-car-side fa-1x"></i> Bienvenid@ al Sistema:</h5>
            </div>
            <div class="col-4 text-left py-1">
                <?php $Usuario = $_SESSION['UserName'];
                echo "<h3 class='nav-link' style='color: #021763;'><i class='nav-icon fa fa-user'></i>" . " " . $Usuario . "</h3>"; ?>
            </div>
        </div>


        <div class="contaner">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-9 text-center"></div>
                <div class="col-2 text-center">
                    <div class="container suppoprt-me">
                        <div class="avatar">
                            <img src="../img/bus.png" alt="Skytsunami" width="50" height="50" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Extra large modal -->
        <div class="contr">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-9 text-lg-right">
                    <div class="cf-cover">
                        <!-- Large modal -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">
                            <strong style="color: white;"><img src="../img/manual2.png" alt="" width="45" height="45"> </strong></button>

                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        <!-- Extra large modal -->


        <!-- Modal large  -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-2"></div>
                        <div class="col-8 text-center">
                            <h4 class="text" style="color: #292929;">
                                <img src="../img/manual3.png" alt="" width="35" height="35">
                                Manual de Solicitud Transporte
                                <img src="../img/manual3.png" alt="" width="35" height="35">
                            </h4>
                        </div>
                        <div class="col-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                    </div>


                    <div class="modal-body">
                        <div class="col-sm-12">
                            <p class="hola text-center">Se muestra un pequeño video de los pasos a segui para hacer un buen llenado de las solicitudes de transporte</p>
                            <video width="1100" height="560" controls>
                                <source src="../img/sistema.mp4" type="video/mp4">

                                <!-- Texto alternativo -->
                            </video>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal large  -->



        <!-- Inicio de Formulario  -->
        <form class="formulario" autocomplete="off" action="PreListado.php" method="GET">
            <div class="card-body">
                <div class="abs-center">
                    <form>
                        <div class="row py-2">
                            <div class="col-2">
                            </div>
                            <div class="col-8 ">
                                <h1 class="form-label text-center" style="color: #001571;"> <img src="../img/icono.png" alt="" width="75" height="70"><em><strong> Solicitud de Transporte L-V </strong></em></h1>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        <!-- Fin de Formulario  -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header container-fluid">
                                <div class="row">
                                    <div class="col-6 py-4"> <!-- Botones de Personal nuevo y Listo de Personal  -->
                                        <div class="session-title text-left">
                                            <!-- <a href="../Prueba.php" class="btn btn-dark"><i class="fa fa-lock"></i> Admin</a> -->
                                            <a href="../Transporte/Nuevos2_0.php" class="btn btn-info"><i class="fa fa-plus-circle"></i> Personal Nuevo</a>
                                            <a href="../Transporte/MiPersonal.php" class="btn btn-danger"><i class="fa fa-users"></i> Ver Mi Personal</a>
                                        </div>
                                    </div>

                                    <div class="col-6 py-4 text-right">
                                        <div class="session-title text-right">
                                            <h4 class="text" style="color: #014683; font-family:Georgia"><em><strong>
                                                        <i class='fa fa-users'></i> Personal del Encargado:</strong></em></h4>
                                            <h4>
                                                <?php $Usuario = $_SESSION['UserName'];
                                                echo "<h3 class='nav-link' style='color: #787878;'><i class='nav-icon fa fa-user'></i>" . " " . $Usuario . "</h3>"; ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body"><!-- Inicio de Formulario Envio de los Datos  -->
                                <form id="formulario" method="POST">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Inicio div llenado de Informacion Transporte -->
                                            <div id="filtro" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <h2 class="form-label text-center" style="color: #001571;"><em><strong>COMPLETAR INFORMACION TRANSPORTE L-V</strong></em></h2>
                                                        <hr style="border:0px; border-top: 1px dotted #028271;">
                                                        <div class="row zmdi-border-color">

                                                            <div class="col-md-3 py-2">
                                                                <div class="form-group text-center">
                                                                    <h6 for="fecha1" class="form-label" style="font-family: Arial;"><strong>Fecha inicio:</strong></h6>
                                                                    <input type="date" class="form-control" id="fecha1" name="fecha1"
                                                                        min="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d", strtotime("+ 3 month")) ?>"
                                                                        onChange="sinDomingos();"
                                                                        onblur="obtenerfechafinf1();" required="">
                                                                    <input id="elSubmit" type="submit" style="display:none;" />

                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 py-2">
                                                                <div class="form-group text-center">
                                                                    <h6 for="fecha2" class="form-label" style="font-family: Arial;"><strong>Fecha Fin:</strong></h6>
                                                                    <input type="date" class="form-control" id="fecha2" name="fecha2"
                                                                        min="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d", strtotime("+ 3 month")) ?>"
                                                                        onChange="sinDomingos();"
                                                                        onblur="obtenerfechafinf1();" required="">
                                                                    <input id="elSubmit" type="submit" style="display:none;" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 py-1">
                                                                <div class="form-group text-center">
                                                                    <label for="Responsable" class="form-label">Responsable de Solicitud</label>
                                                                    <input type='text' class='form-control text-center' id='Responsable' name='Responsable' readonly='readonly' value="<?php echo $Usuario; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-2"></div>
                                                            <div class="col-3" hidden>
                                                                <div class="form-group text-center">
                                                                    <label for="FechaSolicitud" class="form-label">Fecha:</label>
                                                                    <input type="date" class="form-control text-center" id="FechaSolicitud" name="FechaSolicitud" value="<?php echo date("Y-m-d"); ?>" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-3" hidden>
                                                                <div class="form-group text-center">
                                                                    <label for="FechaSolicitud" class="form-label">Hora:</label>
                                                                    <input type="time" class="form-control text-center" id="Hora" name="Hora" value="<?php echo date("H:i"); ?>" readonly="readonly">
                                                                </div>
                                                            </div>
                                                            <div class="col-2"></div>

                                                            <div class="col-md-12 py-2">
                                                                <div class="form-group text-center">
                                                                    <h4 style="font-family: Arial; color:#050373;">----- SELECCIONA EL TURNO -----</h4>
                                                                    <input type="radio" name="tipo_turno" id="tipo_turno" value="5 x 2" />
                                                                    &nbsp;
                                                                    <label>
                                                                        <h5 style="color: #005C60;">
                                                                            Turno de <strong>5</strong> x <strong>2</strong>
                                                                        </h5>
                                                                    </label>

                                                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                                                    <input type="radio" name="tipo_turno" id="tipo_turno" value="4 x 3" />
                                                                    &nbsp;
                                                                    <label>
                                                                        <h5 style="color: #003660;">
                                                                            Turno de <strong>4</strong> x <strong>3</strong>
                                                                        </h5>
                                                                    </label>

                                                                    <div id="div1" style="display:;">
                                                                        <div class="form-group text-center">
                                                                            <h6 style="font-family: Arial; color:#CD1900;">
                                                                                <strong>---- Turno 5 x 2 ----</strong>
                                                                            </h6>
                                                                            <h5 style="font-family: Arial; color:#001286;">
                                                                                <strong>---- ¿Con Tiempo Extra? ----</strong><br>
                                                                            </h5>

                                                                            <input type="radio" id="show" name="TiempoExSI" id="TiempoExSI" value="SI">
                                                                            <label for="show">
                                                                                <h6 style="color: #000000;">SI, EXTRAS</h6>
                                                                            </label>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <input type="radio" id="hide" name="TiempoExSI" id="TiempoExSI" value="NO">

                                                                            <label for="hide">
                                                                                <h6 style="color: #000000;">NO, EXTRAS</h6>
                                                                            </label>

                                                                            <div id="content" class="texto text-center">
                                                                                <table class="default text-center">
                                                                                    <input type="number" min="1" max="5" id="boleto_2d" size="5" name="boletos[2D][cantidad]" value="3" onchange="checkItems(this)" hidden>
                                                                                    <tr>
                                                                                        <td class="col-md-1">
                                                                                            <input class="Tiempo" type="checkbox" name="lunes" onclick="limitCheck(this)" value="1" id="1" /> Lunes
                                                                                        </td>
                                                                                        <td class="col-md-1">
                                                                                            <input class="Tiempo" type="checkbox" name="martes" onclick="limitCheck(this)" value="1" id="1" /> Martes
                                                                                        </td>
                                                                                        <td class="col-md-1">
                                                                                            <input class="Tiempo" type="checkbox" name="miercoles" onclick="limitCheck(this)" value="1" id="1" /> Miercoles
                                                                                        </td>
                                                                                        <td class="col-md-1">
                                                                                            <input class="Tiempo" type="checkbox" name="jueves" onclick="limitCheck(this)" value="1" id="1" /> Jueves
                                                                                        </td>
                                                                                        <td class="col-md-1">
                                                                                            <input class="Tiempo" type="checkbox" name="viernes" onclick="limitCheck(this)" value="1" id="1" /> Viernes
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group text-center">
                                                                            <h6 for="turno" style="font-family: Arial; color:#001286;">
                                                                                <strong>---- Selecciona el Turno:----</strong>
                                                                            </h6>
                                                                            <select name="turno" size="2">
                                                                                <option name="turno" value="Dia" id="Dia">&nbsp; Turno de Dia &nbsp;</option>
                                                                                <option name="turno" value="Noche" id="Noche">&nbsp; Turno de Noche &nbsp;</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <!-- ------------Segundo Div-------------- -->

                                                                    <div id="div2" style="display:none;">

                                                                        <div class="form-group text-center">
                                                                            <h6 style="font-family: Arial; color:#CD1900;"><strong> ---- Turno 4 x 3 ----</strong></h6>
                                                                            <h5 style="font-family: Arial; color:#021977;"><strong>Selecciona el tipo de Turno</strong></h5>
                                                                            <input type="radio" id="show" name="turno" id="turno" value="Mixto">
                                                                            <label for="show">
                                                                                <h6 style="color: #006496;">Turno Mixto</h6>
                                                                            </label>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <input type="radio" id="hide" name="turno" id="turno" value="Normal">

                                                                            <label for="hide">
                                                                                <h6 style="color: #007E59;">Turno Normal</h6>
                                                                            </label>
                                                                            <div id="content" class="texto text-center">
                                                                                <div class="form-group text-center py-2">
                                                                                    <h6 style="font-family: Arial; color:#800000;">
                                                                                        <strong>--- Selecciona los dias con Tiempo Extra ---</strong>
                                                                                    </h6>
                                                                                    <input type="radio" id="show" name="TiempoExSI" id="TiempoExSI" value="SI">
                                                                                    <label for="show">
                                                                                        <h6 style="color: #000000;">Si, Tiempo Extra</h6>
                                                                                    </label>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <input type="radio" id="hide" name="TiempoExSI" id="TiempoExSI" value="NO">

                                                                                    <label for="hide">
                                                                                        <h6 style="color: #000000;">No, Tiempo Extra</h6>
                                                                                    </label>

                                                                                    <div id="content" class="texto text-center">
                                                                                        <table class="default text-center">
                                                                                            <tr>
                                                                                                <td class="col-1">
                                                                                                    <strong>Lunes</strong>
                                                                                                    <br>
                                                                                                    <input name="lunes" value="1" id="1" type="radio" />
                                                                                                    &nbsp;Dia
                                                                                                    <br>
                                                                                                    <input name="lunes" value="2" id="2" type="radio" />
                                                                                                    &nbsp;Noche
                                                                                                </td>
                                                                                                <td class="col-1">
                                                                                                    <strong>Martes</strong>
                                                                                                    <br>
                                                                                                    <input name="martes" value="1" id="1" type="radio" />
                                                                                                    &nbsp;Dia
                                                                                                    <br>
                                                                                                    <input name="martes" value="2" id="2" type="radio" />
                                                                                                    &nbsp;Noche
                                                                                                </td>
                                                                                                <td class="col-1">
                                                                                                    <strong>Miercoles</strong>
                                                                                                    <br>
                                                                                                    <input name="miercoles" value="1" id="1" type="radio" />
                                                                                                    &nbsp;Dia
                                                                                                    <br>
                                                                                                    <input name="miercoles" value="2" id="2" type="radio" />
                                                                                                    &nbsp;Noche
                                                                                                </td>
                                                                                                <td class="col-1">
                                                                                                    <strong>Jueves</strong>
                                                                                                    <br>
                                                                                                    <input name="jueves" value="1" id="1" type="radio" />
                                                                                                    &nbsp;Dia
                                                                                                    <br>
                                                                                                    <input name="jueves" value="2" id="2" type="radio" />
                                                                                                    &nbsp;Noche
                                                                                                </td>
                                                                                                <td class="col-1">
                                                                                                    <strong>Viernes</strong>
                                                                                                    <br>
                                                                                                    <input name="viernes" value="1" id="1" type="radio" />
                                                                                                    &nbsp;Dia
                                                                                                    <br>
                                                                                                    <input name="viernes" value="2" id="2" type="radio" />
                                                                                                    &nbsp;Noche
                                                                                                </td>
                                                                                                <td class="col-1">
                                                                                                    <strong>Sabado</strong>
                                                                                                    <br>
                                                                                                    <input name="sabado" value="1" id="1" type="radio" />
                                                                                                    &nbsp;Dia
                                                                                                    <br>
                                                                                                    <input name="sabado" value="2" id="2" type="radio" />
                                                                                                    &nbsp;Noche
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group text-center">
                                                                            <h6 style="font-family: Arial; color:#CD1900;">
                                                                                <strong>---- SOLO EN CASO <a style="color: #007E59;">DE TURNO NORMAL </a> ----</strong>
                                                                            </h6>
                                                                            <input type="radio" id="show" name="TiempoExSI" id="TiempoExSI" value="SI">
                                                                            <label for="show">
                                                                                <h6 style="color: #000000;">SELECION DE DIAS</h6>
                                                                            </label>
                                                                            <div id="content" class="texto text-center">

                                                                                <table class="default text-center">
                                                                                    <tr>
                                                                                        <td class="col-1">
                                                                                            <strong>Lunes</strong>
                                                                                            <br>
                                                                                            <input name="lunes" value="1" id="1" type="radio" />
                                                                                            &nbsp;Dia
                                                                                            <br>
                                                                                            <input name="lunes" value="2" id="2" type="radio" />
                                                                                            &nbsp;Noche
                                                                                        </td>
                                                                                        <td class="col-1">
                                                                                            <strong>Martes</strong>
                                                                                            <br>
                                                                                            <input name="martes" value="1" id="1" type="radio" />
                                                                                            &nbsp;Dia
                                                                                            <br>
                                                                                            <input name="martes" value="2" id="2" type="radio" />
                                                                                            &nbsp;Noche
                                                                                        </td>
                                                                                        <td class="col-1">
                                                                                            <strong>Miercoles</strong>
                                                                                            <br>
                                                                                            <input name="miercoles" value="1" id="1" type="radio" />
                                                                                            &nbsp;Dia
                                                                                            <br>
                                                                                            <input name="miercoles" value="2" id="2" type="radio" />
                                                                                            &nbsp;Noche
                                                                                        </td>
                                                                                        <td class="col-1">
                                                                                            <strong>Jueves</strong>
                                                                                            <br>
                                                                                            <input name="jueves" value="1" id="1" type="radio" />
                                                                                            &nbsp;Dia
                                                                                            <br>
                                                                                            <input name="jueves" value="2" id="2" type="radio" />
                                                                                            &nbsp;Noche
                                                                                        </td>
                                                                                        <td class="col-1">
                                                                                            <strong>Viernes</strong>
                                                                                            <br>
                                                                                            <input name="viernes" value="1" id="1" type="radio" />
                                                                                            &nbsp;Dia
                                                                                            <br>
                                                                                            <input name="viernes" value="2" id="2" type="radio" />
                                                                                            &nbsp;Noche
                                                                                        </td>
                                                                                        <td class="col-1">
                                                                                            <strong>Sabado</strong>
                                                                                            <br>
                                                                                            <input name="sabado" value="1" id="1" type="radio" />
                                                                                            &nbsp;Dia
                                                                                            <br>
                                                                                            <input name="sabado" value="2" id="2" type="radio" />
                                                                                            &nbsp;Noche
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                <p style="color: red;">
                                                                                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                                                                                    <strong>Solo puedes selecionar</strong> el mismo turno (dia o noche) <strong> para todos los dias </strong>
                                                                                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-2"></div>
                                                            <div class="col-md-8">
                                                                <div class="form-group" style="text-align: center;">
                                                                    <label for="txt_mostrar"></label>
                                                                    <textarea cols="30" rows="10" id="txt_mostrar" name="asistentes" class="form-control" placeholder="Mi Personal Seleccionado"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-2"></div>

                                                            <div class=" container">
                                                                <div class="row">
                                                                    <div class="col-5"></div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name="" value="Solicitar Transporte" class="btn btn-success" onclick="validar()" type="button">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-3"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="col-sm-5"><!-- Seccion Listado de Personal Inicio -->
                                                        <h2 class="form-label text-center" style="color: #011281;"><em><strong>SELECCION DE PERSONAL</strong></em></h2>
                                                        <hr style="border:0px; border-top: 1px dotted #028271;">
                                                        <div class="row">

                                                            <table id="myTable1" class="table table-bordered table-striped display nowrap" style="width:100%">
                                                                <thead style="text-align: center;">
                                                                    <tr>
                                                                        <th style="background-color: #83EA45;" class="hola text-center">Select</th>
                                                                        <th style="background-color: #87E3C9;" class="hola text-center">Nomina</th>
                                                                        <th style="background-color: #87AEE3;" class="hola text-center">Nombre Usuario</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody style="text-align: center;">
                                                                    <?php
                                                                    $i = 0;

                                                                    $resultado = sqlsrv_query($conn, $query_Datos);
                                                                    while ($fila = sqlsrv_fetch_array($resultado)) {
                                                                    ?>
                                                                        <tr id='a2'>
                                                                            <td style="background-color: #A5E87D;">
                                                                                <input type='checkbox' name='check_guia' class=' checkbox' value='1'>
                                                                            </td>
                                                                            <td class='cantidad' style="font-weight: bold;">
                                                                                <input type='text' name='txt_guia' id="ID" value=' <?php echo $fila['id_usuario']  ?>' hidden>
                                                                                <?php echo $fila['id_usuario'] ?>
                                                                            </td>
                                                                            <td class="hola text-center">
                                                                                <input type='text' name='' id="" value=' <?php echo $fila['Nombre']  ?>' hidden>
                                                                                <?php echo $fila['Nombre'] ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }
                                                                    ?>
                                                                </tbody>
                                                                <tfoot style="text-align: center;">
                                                                    <tr>
                                                                        <th style="background-color: #83EA45;" class="hola text-center">Select</th>
                                                                        <th style="background-color: #87E3C9;" class="hola text-center">Nomina</th>
                                                                        <th style="background-color: #87AEE3;" class="hola text-center">Nombre Usuario</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div><!-- Seccion Listado de Personal Fin -->

                                                </div>
                                            </div>
                                </form><!-- Termino de Formulario Envio de los Datos  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <!-- Section de Solicitudes Guardadas -->
        <form class="formulario" action="PreListado.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header container-fluid">
                                    <div class="row">
                                        <div class="col-6 py-4">
                                            <div class="cf-cover">
                                                <div class="session-title">
                                                    <h4><i class='fa fa-folder'></i> SOLICITUDES CREADAS POR:
                                                        <?php $Usuario = $_SESSION['UserName'];
                                                        echo "<h3 class='nav-link' style='color: #005117;'><i class='nav-icon fa fa-user'></i>" . " " . $Usuario . "</h3>"; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 py-4">
                                            <div class="cf-cover">
                                            </div>
                                        </div>
                                        <div class="col-3 py-4">
                                            <div class="cf-cover">
                                                <div class="session-title">
                                                    <a href="Ext_RepoStaff.php" class="btn btn-primary py-md-2 px-md-3 mt-1">
                                                        <i class="fa fa-check"></i> Ver Solicitudes Aceptadas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="myTable" class="table table-bordered table-striped display nowrap" style="width:100%">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th class="sorting text-center" style="background-color: #A7D8D8;">NOMINA</th>
                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">NOMBRE</th>
                                                <th class="sorting text-center" style="background-color: #C1FF3D;" aria-label="">INICIO</th>
                                                <th class="sorting text-center" style="background-color: #62FB8E;" aria-label="">FIN</th>
                                                <th class="sorting text-center" aria-label="">TEL</th>
                                                <th class="sorting text-center" aria-label="">DOMICILIO</th>
                                                <th class="sorting text-center" aria-label="">PUNTO</th>
                                                <th class="sorting text-center" aria-label="">RUTA</th>
                                                <th class="sorting text-center" aria-label="">T.TURNO</th>
                                                <th class="sorting text-center" aria-label="">TURNOS</th>
                                                <th class="sorting text-center" aria-label="">EXTRAS</th>
                                                <th class="sorting text-center" aria-label="">L</th>
                                                <th class="sorting text-center" aria-label="">M</th>
                                                <th class="sorting text-center" aria-label="">M</th>
                                                <th class="sorting text-center" aria-label="">J</th>
                                                <th class="sorting text-center" aria-label="">V</th>
                                                <th class="sorting text-center" aria-label="">S</th>
                                                <th class="sorting text-center" style="background-color: #DE564A;" aria-label="">SOLICITADO</th>
                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">RESPONSABLE</th>
                                                <th class="sorting text-center" aria-label="">EDITAR</th>
                                            </tr>
                                        </thead>

                                        <tbody style="text-align: center;">
                                            <?php
                                            $query = "SELECT SolicitudTransporte.id_solicitud,SolicitudTransporte.ID,PersonalTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,SM_AltaFinanzas.AF_TelefonoC,
                    SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,SR_RUTAS.ID_RUTA
                    ,SolicitudTransporte.tipo_turno,SolicitudTransporte.sabado,
                    SolicitudTransporte.turno,SolicitudTransporte.TiempoExSi,SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
                    SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.FechaSolicitud,SolicitudTransporte.Responsable
                    FROM SolicitudTransporte FULL JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN
                    FULL JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID
                    FULL JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto =PersonalTransporte.Id_punto
                    FULL JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta 
                    WHERE SolicitudTransporte.Estatus = 1 and SolicitudTransporte.TEspecial = 1 
                    and SolicitudTransporte.Responsable = '$Usuario'";

                                            $result = sqlsrv_query($conn, $query);

                                            while ($row = sqlsrv_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td style='background-color: #CBF8FF; font-weight: bold;'>" . $row['ID'] . "</td>";
                                                echo "<td>" . $row['Nombre'] . "</td>";
                                                echo "<td style='background-color: #E5FFCB;'>" . $dias_espaniol[date_format($row['fecha_inicio'], 'w')] . date_format($row['fecha_inicio'], ' d/m/y') . "</td>";
                                                echo "<td style='background-color: #CBFFE3;'>" . $dias_espaniol[date_format($row['fecha_fin'], 'w')] . date_format($row['fecha_fin'], ' d/m/y') . "</td>";
                                                echo "<td>" . $row['AF_TelefonoC'] . "</td>";
                                                echo "<td>" . $row['AF_Domicilio'] . "</td>";
                                                echo "<td>" . $row['Nombre_punto'] . "</td>";
                                                echo "<td>" . $row['ID_RUTA'] . "</td>";
                                                echo "<td>" . $row['tipo_turno'] . "</td>";
                                                echo "<td>" . $row['turno'] . "</td>";
                                                echo "<td>" . $row['TiempoExSi'] . "</td>";
                                                echo "<td>" . $row['lunes'] . "</td>";
                                                echo "<td>" . $row['martes'] . "</td>";
                                                echo "<td>" . $row['miercoles'] . "</td>";
                                                echo "<td>" . $row['jueves'] . "</td>";
                                                echo "<td>" . $row['viernes'] . "</td>";
                                                echo "<td>" . $row['sabado'] . "</td>";
                                                echo "<td style='background-color: #FF938A; font-weight: bold;'>" . $dias_espaniol[date_format($row['FechaSolicitud'], 'w')] . date_format($row['FechaSolicitud'], ' d/m/y') . "</td>";
                                                echo "<td style='background-color: #F0F0F0;'>" . $row['Responsable'] . "</td>";
                                                echo "<td> 
                    <a class='btn btn-warning' href='../Transporte/Editar/Editar.php?id_solicitud=" . $row['id_solicitud'] . "&ID=" . $row['ID'] . "' ><i class='fa fa-edit'></i> Editar</a>
                    </td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot style="text-align: center;">
                                            <tr>
                                                <th class="sorting text-center" style="background-color: #A7D8D8;">NOMINA</th>
                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">NOMBRE</th>
                                                <th class="sorting text-center" style="background-color: #C1FF3D;" aria-label="">INICIO</th>
                                                <th class="sorting text-center" style="background-color: #62FB8E;" aria-label="">FIN</th>
                                                <th class="sorting text-center" aria-label="">TEL</th>
                                                <th class="sorting text-center" aria-label="">DOMICILIO</th>
                                                <th class="sorting text-center" aria-label="">PUNTO</th>
                                                <th class="sorting text-center" aria-label="">RUTA</th>
                                                <th class="sorting text-center" aria-label="">T.TURNO</th>
                                                <th class="sorting text-center" aria-label="">TURNOS</th>
                                                <th class="sorting text-center" aria-label="">EXTRAS</th>
                                                <th class="sorting text-center" aria-label="">L</th>
                                                <th class="sorting text-center" aria-label="">M</th>
                                                <th class="sorting text-center" aria-label="">M</th>
                                                <th class="sorting text-center" aria-label="">J</th>
                                                <th class="sorting text-center" aria-label="">V</th>
                                                <th class="sorting text-center" aria-label="">S</th>
                                                <th class="sorting text-center" style="background-color: #DE564A;" aria-label="">SOLICITADO</th>
                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">RESPONSABLE</th>
                                                <th class="sorting text-center" aria-label="">EDITAR</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <!-- End Section de Solicitudes Guardadas -->

        <!-- footer section start -->
        <div class="contai mt-4" style="font-family: monospace;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- footer section starts  -->
                    <section class="container-fluid text-white-50 py-5 px-sm-3 px-lg-5" style="background-color: rgba(213, 212, 212, 0.466)">
                        <div class="box">
                            <h3 class="text-uppercase text-center" style="color: #001571; font-family: Arial; "><em><strong>
                                        <img src="../img/IconoPrincipal.png" alt="#" width="50" height="45" />
                                        Sistema de Transporte</strong></em></h3>
                            <hr style="color:blue;">
                            <p class="centrado">
                            <p style="color: black;">TRABAJAMOS CON CALIDAD Y DISIPLINA SIEMPRE, UNIFORME Y EQUIPO DE PROTECCION PERSONAL COMPLETO
                                <span style="color:darkblue;"> ¡POR NUESTRA SEGURIDAD!</span>
                            </p>
                            <p style="color: black;">SEGUIMOS LAS NORMAS EN NUETRA AREA DE TRABAJO<span style="color:darkblue;"> ¡POR UN DIA SIN ACCIDENTES!</span></p>
                            <p style="color: black;"> POR NUESTROS CLIENTES Y NUESTRA SEGURIDAD <span style="color:darkblue;">¡HAGAMOS LO MEJOR!</span> </p>
                            </p>
                            <hr style="color:blue;">
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
                            <p><i class="fa fa-envelope mr-2"></i>ximena.santos@beyonz.com.mx </p>
                            <p class="text-body px-3">|</p>
                            <p><i class="fa fa-phone-alt mr-2"></i>Ext. #606, #620</p>
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
        <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
        <script src="../code.js?v=1.1"></script>
        <script src="script.js"></script>

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
                $("input[type=radio]").click(function(event) {
                    var valor = $(event.target).val();
                    if (valor == "5 x 2") {
                        $("#div1").show();
                        $("#div2").hide();
                    } else if (valor == "4 x 3") {
                        $("#div1").hide();
                        $("#div2").show();
                    } else {
                        // Otra cosa
                    }
                });
            });

            $(document).ready(function() {
                $('input[type=checkbox]').click(function() {
                    if ($(this).is(":checked")) {

                        var dato = $(this).parents('tr').find('input:text[name="txt_guia"]').val();
                        var valor = $('#txt_mostrar').val();
                        if (valor == '') {
                            $('#txt_mostrar').val(dato);
                        } else {
                            $('#txt_mostrar').val(valor + ', ' + dato);
                        }

                    } else {
                        // el checkbox esta desmarcado
                        // movemos la columna a la tabla1
                        var tr = $(this).parents("tr").appendTo("#tabla1 tbody");
                        $('#txt_mostrar').val("");
                        var valor = '';
                        $('input[type=checkbox]').each(function(i, check) {
                            if ($(check).is(":checked")) {
                                var dato = $(this).parents('tr').find('input:text[name="txt_guia"]').val();
                                var valor = $('#txt_mostrar').val();
                                if (valor == '') {
                                    $('#txt_mostrar').val(dato);
                                } else {
                                    $('#txt_mostrar').val(valor + ',' + dato);
                                }
                            }
                        });
                    }

                });
            });
            $(document).ready(function() {
                $("#myTable").DataTable({

                    "searching": true,
                    "searching": true,
                    "responsive": false,
                    "lengthChange": false,
                    "autoWidth": false,
                    "paging": true,
                    scrollY: false,
                    scrollX: true,
                    scrollCollapse: false,

                });
            });
            $(document).ready(function() {
                $("#myTable1").DataTable({
                    "dom": 'lfrtip',
                    "searching": true,
                    "responsive": false,
                    "lengthChange": false,
                    "autoWidth": false,
                    "paging": true,
                    scrollY: false,
                    scrollX: true,
                    scrollCollapse: false,

                });
            });

            var elDate = document.getElementById('fecha1');
            var elForm = document.getElementById('formulario');
            var elSubmit = document.getElementById('elSubmit');

            function sinDomingos() {
                var day = new Date(elDate.value).getUTCDay();
                // Días 0-6, 0 es Domingo 6 es Sábado
                elDate.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
                if (day == 0) {
                    elDate.setCustomValidity('Domingos no disponibles, por favor seleccione otro día');
                } else {
                    elDate.setCustomValidity('');
                }
                if (!elForm.checkValidity()) {
                    elSubmit.click()
                };
            }

            function obtenerfechafinf1() {
                sinDomingos();
            }
        </script>


</body>

</html>