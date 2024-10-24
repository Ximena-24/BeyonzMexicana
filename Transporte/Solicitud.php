<?php include_once "../BD_Conexion.php";
$dias_espaniol = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
//echo $dias_espaniol[date("w")];

include "consulta.php";
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
    </div><br>
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
          echo "<h3 class='nav-link' style='color: #021763;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
        </div>
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

    <form class="formulario" autocomplete="off" action="Solicitud.php" method="GET">
      <div class="card-body">
        <div class="container">
          <div class="abs-center">
            <form>
              <div class="container">
                <div class="row">
                  <div class="col-1">
                    <img src="../img/pasajeros.png" alt="" width="90" height="75">
                  </div>
                  <div class="col-9">
                    <div class="cf-cover">
                      <div class="session-title">
                        <h1 class="form-label" style="color: #001571;"><em><strong>&nbsp;Solicitud de Transporte L-V </strong></em></h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-6"></div>
                  <div class="col-4">
                    <h5><strong>Nomina del Empleado a Solicitar Transporte de Lunes a Viernes:</strong></h5>
                    <input type="text" class="form-control " id="ID" name="ID">
                  </div>
                  <div class="col-2 py-2"><br><br>
                    <label class="form-label" hidden>
                      <h2 style="color: white;">:</h2>
                    </label>
                    <label class="form-label" hidden>
                      <h2 style="color: white;">:</h2>
                    </label>
                    <button class="btn btn-success btn-block" type="submit" style="height: 40px; margin-top: -2px">
                      Buscar
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </form>
    </section><br>

    <div class="container-fluid">
      <div class="card container bg-white rounded shadow">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">

              <form id="formulario" method="POST" action="../registrar.php">
                <div class="card-body">
                  <div class="row">
                    <?php
                    $resultado = sqlsrv_query($conn, $query_Datos);
                    while ($fila = sqlsrv_fetch_array($resultado)) {
                    ?>

                      <!-- ------------------------------------------- -->
                      <div class="col-md-4"></div>
                      <h3 class="w-100 text-center mb-4" style="font-family: Tahoma ; color:#BF0000;">COMPLETAR INFORMACION TRANSPORTE L-V</h3>
                      <hr style="color: #800000;">
                      <div class="col-md-2 text-center">
                        <div class="form-group">
                          <h6 for="fecha1" class="form-label" style="font-family: Arial; color:#01168E;"><strong>Fecha inicio</strong></h6>
                          <input type="date" class="form-control" id="fecha1" name="fecha1" required="">
                        </div>
                      </div>

                      <div class="col-md-2 text-center">
                        <div class="form-group">
                          <h6 for="fecha2" class="form-label" style="font-family: Arial; color:#01168E;"><strong>Fecha Fin</strong></h6>
                          <input type="date" class="form-control" id="fecha2" name="fecha2" required="">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group text-center">
                          <label for="ID" class="form-label">Nomina:</label>
                          <input type="text" name="ID" class="form-control text-center" id="ID" readonly="readonly" placeholder="N. Nomina" value="<?php echo $fila['id_usuario'] ?>">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group text-center">
                          <label for="Nombre" class="form-label">Nombre Empleado:</label>
                          <input type="text" class="form-control text-center" id="Nombre" name="Nombre" placeholder="Nombre" readonly="readonly" value="<?php echo $fila['usuario'] ?>">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group text-center">
                          <label for="area" class="form-label">Area:</label>
                          <input type="text" class="form-control text-center" id="area" name="area" placeholder="area" readonly="readonly" value="<?php echo $fila['area'] ?>">
                        </div>
                      </div>

                      <div class="col-md-2 text-center">
                        <div class="form-group">
                          <p>
                          <h6 for="tipo_turno" style="font-family: Arial;"><strong>Selecciona el Turno:</strong></h6>
                          <select name="tipo_turno" size="2">
                            <option name="tipo_turno" value="5 x 2" id="5 x 2">&nbsp;&nbsp; 5 x 2 &nbsp;&nbsp;</option>
                            <option name="tipo_turno" value="4 x 3" id="4 x 3">&nbsp;&nbsp; 4 x 3 &nbsp;&nbsp;</option>
                          </select>
                          </p>
                        </div>
                      </div>&nbsp;&nbsp;

                      <div class="col-md-2">
                        <div class="form-group">
                          <p>
                          <h6 for="turno" style="font-family: Arial;"><strong>Selecciona el Turno:</strong></h6>
                          <select name="turno" size="2">
                            <option name="turno" value="Dia" id="Dia">&nbsp; Turno de Dia &nbsp;</option>
                            <option name="turno" value="Noche" id="Noche">&nbsp; Turno de Noche &nbsp;</option>
                          </select>
                          </p>
                        </div>
                      </div>

                      <div class="col-md-5 text-center">
                        <div class="form-group">
                          <?php
                          $resultado = sqlsrv_query($conn, $query_Datos);
                          while ($fila = sqlsrv_fetch_array($resultado)) {
                          ?>
                            <label for="domicilio" class="form-label">Domicilio:</label>
                            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="domicilio" readonly="readonly" value="<?php echo $fila['AF_Domicilio'] ?>">
                          <?php }
                          ?>
                        </div>
                      </div>
                      <div class="col-md-2 text-center">
                        <div class="form-group">
                          <label for="FechaSolicitud" class="form-label" >Hora:</label>
                          <input type="time" class="form-control" id="Hora" name="Hora" value="<?php echo date("H:i"); ?>" readonly="readonly">
                        </div>
                      </div>
                      <div class="col-md-6 py-4">
                        <div class="form-group text-center">
                          <h6 style="font-family: Arial; color:#800000;"><strong>¿Con Tiempo Extra?</strong></h6>
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
                              <tr>
                                <td class="col-1">
                                  <input name="lunes" value="1" id="1" type="checkbox" />Lunes
                                </td>
                                <td class="col-1">
                                  <input name="martes" value="1" id="1" type="checkbox" />Martes
                                </td>
                                <td class="col-1">
                                  <input name="miercoles" value="1" id="1" type="checkbox" />Miercoles
                                </td>
                                <td class="col-1">
                                  <input name="jueves" value="1" id="1" type="checkbox" />Jueves
                                </td>
                                <td class="col-1">
                                  <input name="vernes" value="1" id="1" type="checkbox" />Viernes
                                </td>
                              </tr>
                            </table>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="Responsable" class="form-label">Responsable de Solicitud</label>
                          <input type='text' class='form-control' id='Responsable' name='Responsable' readonly='readonly' value="<?php echo $Usuario; ?>">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="FechaSolicitud" class="form-label">Fecha:</label>
                          <input type="date" class="form-control" id="FechaSolicitud" name="FechaSolicitud" value="<?php echo date("Y-m-d"); ?>" readonly="readonly">
                        </div>
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <?php
                          $resultado = sqlsrv_query($conn, $query_Datos);
                          while ($fila = sqlsrv_fetch_array($resultado)) {
                          ?>
                            <label for="Nombre_punto" class="form-label">Punto de Abordaje:</label>
                            <input type="text" class="form-control" id="Nombre_punto" name="Nombre_punto" placeholder="Nombre_punto" readonly="readonly" value="<?php echo $fila['Nombre_punto'] ?>">
                          <?php }
                          ?>
                        </div>
                      </div>

                      <div class="col-md-1 text-center">
                        <div class="form-group">
                          <?php
                          $resultado = sqlsrv_query($conn, $query_Datos);
                          while ($fila = sqlsrv_fetch_array($resultado)) {
                          ?>
                            <label for="Numero_ruta" class="form-label">Ruta:</label>
                            <input type="text" class="form-control text-center" id="Numero_ruta" name="Numero_ruta" placeholder="Numero_ruta" readonly="readonly" value="<?php echo $fila['Numero_ruta'] ?>">
                          <?php }
                          ?>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group text-center">
                          <?php
                          $resultado = sqlsrv_query($conn, $query_Datos);
                          while ($fila = sqlsrv_fetch_array($resultado)) {
                          ?>
                            <label for="puesto" class="form-label">Puesto:</label>
                            <input type="text" class="form-control text-center" id="puesto" name="puesto" placeholder="puesto" readonly="readonly" value="<?php echo $fila['puesto'] ?>">
                          <?php }
                          ?>
                        </div>
                      </div>

                      <div class="col-md-5">
                        <div class="form-group">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="submit" name="" value="Solicitar Transporte" class="btn btn-success">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                        </div>
                      </div>
              </form>
            <?php }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br>


  <form class="formulario" action="Solicitud.php" method="post" autocomplete="off" enctype="multipart/form-data">
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
                        <h4><i class='fa fa-bus'></i> Solicitudes de Transporte Realizadas por:
                          <?php $Usuario = $_SESSION['UserName'];
                          echo "<h3 class='nav-link' style='color: #005117;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
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
                          <img src="../img/trans.png" alt="" width="30" height="30"> Ver Solicitudes Aceptadas</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped display nowrap" style="width:100%">
                  <thead style="text-align: center;">
                    <tr>
                      <th class="sorting text-center" style="background-color: #A7D8D8;">Nomina </th>
                      <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                      <th class="sorting text-center" style="background-color: #C1FF3D;" aria-label="">Fecha Inicio</th>
                      <th class="sorting text-center" style="background-color: #62FB8E;" aria-label="">Fecha Fin</th>
                      <th class="sorting text-center" aria-label="">Telefono</th>
                      <th class="sorting text-center" aria-label="">Domicilio</th>
                      <th class="sorting text-center" aria-label="">Punto</th>
                      <th class="sorting text-center" aria-label="">Ruta</th>
                      <th class="sorting text-center" aria-label="">T. Turno</th>
                      <th class="sorting text-center" aria-label="">Turnos</th>
                      <th class="sorting text-center" aria-label="">T. Extra</th>
                      <th class="sorting text-center" aria-label="">Lunes</th>
                      <th class="sorting text-center" aria-label="">Martes</th>
                      <th class="sorting text-center" aria-label="">Miercoles</th>
                      <th class="sorting text-center" aria-label="">Jueves</th>
                      <th class="sorting text-center" aria-label="">Viernes</th>
                      <th class="sorting text-center" style="background-color: #DE564A;" aria-label="">FechaSolicitud</th>
                      <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
                      <th class="sorting text-center" aria-label="">Editar</th>
                    </tr>
                  </thead>

                  <tbody style="text-align: center;">
                    <?php
                    $query = "SELECT SolicitudTransporte.id_solicitud,SolicitudTransporte.ID,PersonalTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,SM_AltaFinanzas.AF_TelefonoC,
                    SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,SR_RUTAS.ID_RUTA
                    ,SolicitudTransporte.tipo_turno,
                    SolicitudTransporte.turno,SolicitudTransporte.TiempoExSi,SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
                    SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.FechaSolicitud,SolicitudTransporte.Responsable
                    FROM SolicitudTransporte INNER JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN
                    INNER JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID
                    INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto =PersonalTransporte.Id_punto
                    INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta 
                    WHERE SolicitudTransporte.Estatus = 1 and SolicitudTransporte.TEspecial = 1 
                    and SolicitudTransporte.Responsable = '$Usuario'";

                    $result = sqlsrv_query($conn, $query);

                    while ($row = sqlsrv_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td style='background-color: #CBF8FF; font-weight: bold;'>" . $row['ID'] . "</td>";
                      echo "<td>" . $row['Nombre'] . "</td>";
                      echo "<td style='background-color: #E5FFCB;'>". $dias_espaniol[date_format($row['fecha_inicio'], 'w')] . date_format($row['fecha_inicio'], ' d/m/y') . "</td>";
                      echo "<td style='background-color: #CBFFE3;'>". $dias_espaniol[date_format($row['fecha_fin'], 'w')] . date_format($row['fecha_fin'], ' d/m/y') . "</td>";
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
                      echo "<td style='background-color: #FF938A; font-weight: bold;'>" . $dias_espaniol[date_format($row['FechaSolicitud'], 'w')] . date_format($row['FechaSolicitud'], ' d/m/y') . "</td>";
                      echo "<td style='background-color: #F0F0F0;'>". $row['Responsable'] . "</td>";
                      echo "<td> 
                    <a class='btn btn-warning' href='../Transporte/Editar/Editar.php?id_solicitud=" . $row['id_solicitud'] . "&ID=" . $row['ID'] . "' ><i class='fa fa-edit'></i> Editar</a>
                    </td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                  <tfoot style="text-align: center;">
                    <tr>
                    <th class="sorting text-center" style="background-color: #A7D8D8;">Nomina </th>
                      <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                      <th class="sorting text-center" style="background-color: #C1FF3D;" aria-label="">Fecha Inicio</th>
                      <th class="sorting text-center" style="background-color: #62FB8E;" aria-label="">Fecha Fin</th>
                      <th class="sorting text-center" aria-label="">Telefono</th>
                      <th class="sorting text-center" aria-label="">Domicilio</th>
                      <th class="sorting text-center" aria-label="">Punto</th>
                      <th class="sorting text-center" aria-label="">Ruta</th>
                      <th class="sorting text-center" aria-label="">T. Turno</th>
                      <th class="sorting text-center" aria-label="">Turnos</th>
                      <th class="sorting text-center" aria-label="">T. Extra</th>
                      <th class="sorting text-center" aria-label="">Lunes</th>
                      <th class="sorting text-center" aria-label="">Martes</th>
                      <th class="sorting text-center" aria-label="">Miercoles</th>
                      <th class="sorting text-center" aria-label="">Jueves</th>
                      <th class="sorting text-center" aria-label="">Viernes</th>
                      <th class="sorting text-center" style="background-color: #DE564A;" aria-label="">FechaSolicitud</th>
                      <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
                      <th class="sorting text-center" aria-label="">Editar</th>
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
  </script>
</body>

</html>