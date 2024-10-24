<?php include_once "../../BD_Conexion.php";
include "../consulta.php";
if (!isset($login)) {
    session_start();
    $User = $_SESSION['User'];
    $Usuario = $_SESSION['UserName'];
    $Tipo = $_SESSION['Tipo'];

    if (!isset($User)) {
        header("location:/SistemaTansporte/logout.php");
    }
}

$id_solicitud = $_GET['id_solicitud'];
$ID = $_GET['ID'];

$query = "SELECT SolicitudTransporte.ID,empleado.usuario,empleado.area,empleado.puesto,SM_AltaFinanzas.AF_Domicilio, SM_AltaFinanzas.AF_TelefonoC,
SolicitudTransporte.id_solicitud,SolicitudTransporte.ID,PuntosAbordaje.Nombre_punto,SR_RUTAS.ID_RUTA
FROM empleado INNER JOIN SM_AltaFinanzas ON empleado.id_usuario = SM_AltaFinanzas.AF_NN 
INNER JOIN SolicitudTransporte ON empleado.id_usuario = SolicitudTransporte.ID 
INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto = PuntosAbordaje.Id_punto 
INNER JOIN PersonalTransporte ON PersonalTransporte.Id_punto = PuntosAbordaje.Id_punto
INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta
WHERE empleado.estatus = 1 AND SolicitudTransporte.Estatus = 1 
AND SolicitudTransporte.id_solicitud = $id_solicitud AND SolicitudTransporte.ID = $ID
and PersonalTransporte.ID = $ID";

$result = sqlsrv_query($conn, $query);

while ($fila = sqlsrv_fetch_array($result)) {
    $ID = $fila['ID'];
    $usuario = $fila['usuario'];
    $area = $fila['area'];
    $puesto = $fila['puesto'];
    $AF_Domicilio = $fila['AF_Domicilio'];
    $AF_TelefonoC = $fila['AF_TelefonoC'];
    $id_solicitud = $fila['id_solicitud'];
    $Nombre_punto = $fila['Nombre_punto'];
    $ID_RUTA = $fila['ID_RUTA'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Beyonz Mexicana" name="" />
    <title>Editar Especial</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <!-- Styles CSS -->
    <link href="../../css/style.css" rel="stylesheet" />
    <!-- Imagen principal Favicon -->
    <link href="../../img/trans.png" rel="icon" />
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

<body class="hold-transition sidebar-collapse">


    <div class="estilo py-3">
        <div class="container">
            <header style="background-color: rgb(21, 21, 192);">
                <h1><a href=""><i class="ion-plane text-info"></i>Beyonz Mexicana</a></h1>
                <nav>
                    <ul>
                        <li>
                            <a class="btn btn-dark" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            <a class="btn" href="../logout.php.php" title="Log out"><i class="fa fa-share"></i> Cerrar Sesion</a></a>
                        </li>
                    </ul>
                </nav>
            </header><br><br><br><br>

            <!-- Main content -->
            <form class="formulario" action="Update2.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <!-- Default box -->
                                <div class="card">
                                    <div class="card-header container-fluid">
                                        <div class="row" style="background-color: white;">
                                            <h4 style="color: #01168E;"><img src="../../img/update.jpg" alt="" width="100" height="80">
                                                Actualizar Solicitud de Transporte Especial</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
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


                                            <div class="col-md-1">
                                                <div class="form-group text-center">
                                                    <label><strong>Nomina:</strong></label>
                                                    <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $ID ?>" readonly>
                                                    <input type="text" style="display: none;" class="form-control" id="id_solicitud" name="id_solicitud" value="<?php echo $id_solicitud ?>" hidden>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><strong>Nombre del Empleado:</strong></label>
                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $usuario ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><strong>Area:</strong></label>
                                                    <input type="text" class="form-control" id="area" name="area" value="<?php echo $area ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-2 text-center">
                                                <div class="form-group">
                                                    <p>
                                                    <h6 for="tipo_turno" style="font-family: Arial; color:#01168E;"><strong>Selecciona el Turno:</strong></h6>
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
                                                    <h6 for="turno" style="font-family: Arial; color:#01168E;"><strong>Selecciona el Turno:</strong></h6>
                                                    <select name="turno" size="2">
                                                        <option name="turno" value="Dia" id="Dia">&nbsp; Turno de Dia &nbsp;</option>
                                                        <option name="turno" value="Noche" id="Noche">&nbsp; Turno de Noche &nbsp;</option>
                                                    </select>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><strong>Puesto: </strong></label>
                                                    <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $puesto ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="FechaSolicitud" class="form-label">Fecha:</label>
                                                    <input type="date" class="form-control" id="FechaSolicitud" name="FechaSolicitud" value="<?php echo date("Y-m-d"); ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-2"></div>
                                            <div class="col-md-8 py-2">
                                                <div class="form-group text-center">
                                                    <h6 style="font-family: Arial; color:#000000;"><strong>Selecciona Horario:</strong></h6>
                                                    <input type="radio" id="hide" name="Horario" id="Horario" value="8:00am A 4:00pm">
                                                    <label for="hide">
                                                        <h6 style="color: #015D3A;">8:00am A 4:00pm</h6>
                                                    </label>

                                                    <div id="content" class="texto text-center"></div>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" id="hide" name="Horario" id="Horario" value="11:30pm A 8:06am">
                                                    <label for="hide">
                                                        <h6 style="color: #722300;">11:30pm A 8:06am</h6>
                                                    </label>
                                                    <div id="content" class="texto text-center"></div>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" id="hide" name="Horario" id="Horario" value="8:00am A 8:00pm">
                                                    <label for="hide">
                                                        <h6 style="color: #320021;">8:00am A 8:00pm</h6>
                                                    </label>
                                                    <div id="content" class="texto text-center"></div>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" id="hide" name="Horario" id="Horario" value="8:00pm A 8:00am">
                                                    <label for="hide">
                                                        <h6 style="color: #AB0909;">8:00pm A 8:00am</h6>
                                                    </label>
                                                    <div id="content" class="texto text-center"></div>
                                                </div>
                                            </div>
                                            <div class="col-2"></div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label><strong>Domicilio:</strong></label>
                                                    <input type="text" class="form-control" id="AF_Domicilio" name="AF_Domicilio" value="<?php echo $AF_Domicilio ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Responsable" class="form-label"><strong>Responsable de Solicitud:</strong></label>
                                                    <input type='text' class='form-control' id='Responsable' name='Responsable' readonly='readonly' value="<?php echo $Usuario; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="Nombre_punto" class="form-label"><strong>Punto de Abordaje:</strong></label>
                                                    <input type='text' class='form-control' id='Nombre_punto' name='Nombre_punto' readonly='readonly' value="<?php echo $Nombre_punto; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="ID_RUTA" class="form-label"><strong>Ruta:</strong></label>
                                                    <input type='text' class='form-control' id='ID_RUTA' name='ID_RUTA' readonly='readonly' value="<?php echo $ID_RUTA; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><strong>Telefono:</strong></label>
                                                    <input type="text" class="form-control" id="AF_TelefonoC" name="AF_TelefonoC" value="<?php echo $AF_TelefonoC ?>" readonly>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-center py-3">
                                            <button class="btn btn-primary" type="post">Actualizar Solicitud</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>

        <!-- footer section start -->
        <div class="contai mt-3">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- footer section starts  -->
                    <section class="container-fluid text-white-50 py-5 px-sm-3 px-lg-5" style="background-color: rgba(213, 212, 212, 0.466)">
                        <div class="box">
                            <h3 class="text-uppercase text-center" style="color: #001571;"><em><strong>
                                        <img src="../../img/IconoPrincipal.png" alt="#" width="50" height="45" />
                                        Sistema de Transporte</strong></em></h3>
                            <hr style="color: #00043D;">
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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>