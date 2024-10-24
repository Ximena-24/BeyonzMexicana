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
    <title>Solicitados</title>
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



<body class="hold-transition sidebar-collapse">

    <div class="estilo py-3">
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
            </header><br><br>
            <!-- Navbar End -->
            <div class="container py-5">
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-3 text-right">
                        <h5>Bienvenid@ al Sistema:</h5>
                    </div>
                    <div class="col-4 text-left py-1">
                        <?php $Usuario = $_SESSION['UserName'];
                        echo "<h3 class='nav-link' style='color: #005117;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
                    </div>
                </div>
            </div>

            <!-- Barra de busqueda Start -->
            <div class="bg-light shadow text-center" style="padding: 5px">
                <form id="form" name="form" method="GET" action="Ext_RepoStaff.php" autocomplete="off">
                    <h3 class="text-uppercase text-center" style="color: 3323232;"><em><strong>
                                <img src="../img/64652.png" alt="" width="50" height="50">
                                Buscar Reporte Por Fechas </strong></em></h3>
                    <br>
                    <div class="container py-2">
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
            $consulta = "SELECT SolicitudTransporte.ID,PersonalTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,SM_AltaFinanzas.AF_TelefonoC,
            SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,SR_RUTAS.ID_RUTA
            ,SolicitudTransporte.tipo_turno,
            SolicitudTransporte.turno,SolicitudTransporte.TiempoExSi,SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
            SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.FechaSolicitud,SolicitudTransporte.Responsable
            FROM SolicitudTransporte INNER JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN
            INNER JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID
            INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto =PersonalTransporte.Id_punto
            INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta 
            WHERE SolicitudTransporte.Estatus = 2 and SolicitudTransporte.TEspecial = 1 
            and SolicitudTransporte.Responsable = '$Usuario'
            ORDER BY SolicitudTransporte.fecha_inicio ASC";
        } else {
            $consulta = "SELECT SolicitudTransporte.ID,PersonalTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,SM_AltaFinanzas.AF_TelefonoC,
           SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,SR_RUTAS.ID_RUTA
           ,SolicitudTransporte.tipo_turno,
           SolicitudTransporte.turno,SolicitudTransporte.TiempoExSi,SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
           SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.FechaSolicitud,SolicitudTransporte.Responsable
           FROM SolicitudTransporte INNER JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN
           INNER JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID
           INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto =PersonalTransporte.Id_punto
           INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta WHERE SolicitudTransporte.Estatus = 2 AND ";

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
                                                    <h3 class="text-uppercase text-center" style="color:#0132C1; Font-family: Arial"><strong>
                                                        <img src="../img/verificar.png" alt="" width="50" height="50">
                                                        Solicitudes Aceptadas por Administrador</strong>
                                                        <img src="../img/verificar.png" alt="" width="50" height="50"></h3>
                                                    <hr style="border:0px; border-top: 1px dotted #028271;">
                                                    <table id="myTable" class="table mt-3">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nomina </th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                                                                <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">Fecha Inicio</th>
                                                                <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">Fecha Fin</th>
                                                                <th class="sorting text-center" aria-label="">Telefono</th>
                                                                <th class="sorting text-center" aria-label="">Domicilio</th>
                                                                <th class="sorting text-center" aria-label="">Punto</th>
                                                                <th class="sorting text-center" aria-label="">Ruta</th>
                                                                <th class="sorting text-center" aria-label="">T. Turno</th>
                                                                <th class="sorting text-center" aria-label="">Turnos</th>
                                                                <th class="sorting text-center" aria-label="">Extras</th>
                                                                <th class="sorting text-center" aria-label="">Horario</th>
                                                                <th class="sorting text-center" aria-label="">Lunes</th>
                                                                <th class="sorting text-center" aria-label="">Martes</th>
                                                                <th class="sorting text-center" aria-label="">Miercoles</th>
                                                                <th class="sorting text-center" aria-label="">Jueves</th>
                                                                <th class="sorting text-center" aria-label="">Viernes</th>
                                                                <th class="sorting text-center" style="background-color: red;" aria-label="">FechaSolicitud</th>
                                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tabla text-center">
                                                            <?php
                                                            $resultado = sqlsrv_query($conn, $consulta);
                                                            while ($row = sqlsrv_fetch_array($resultado)) {
                                                                echo "<tr>";
                                                                echo "<td style='font-weight: bold;'>" . $row['ID'] . "</td>";
                                                                echo "<td>" . $row['Nombre'] . "</td>";
                                                                echo "<td>" . $dias_espaniol[date_format($row['fecha_inicio'], 'w')] . date_format($row['fecha_inicio'], ' d/m/y') . "</td>";
                                                                echo "<td>" . $dias_espaniol[date_format($row['fecha_fin'], 'w')] . date_format($row['fecha_fin'], ' d/m/y') . "</td>";
                                                                echo "<td>" . $row['AF_TelefonoC'] . "</td>";
                                                                echo "<td>" . $row['AF_Domicilio'] . "</td>";
                                                                echo "<td>" . $row['Nombre_punto'] . "</td>";
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
                                                                echo "<td style='background-color: red; font-weight: bold;'>" . $dias_espaniol[date_format($row['FechaSolicitud'], 'w')] . date_format($row['FechaSolicitud'], ' d/m/y') . "</td>";
                                                                echo "<td style='background-color: #D1D1D1;'>" . $row['Responsable'] . "</td>";
                                                                "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="text-center">
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nomina </th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                                                                <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">Fecha Inicio</th>
                                                                <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">Fecha Fin</th>
                                                                <th class="sorting text-center" aria-label="">Telefono</th>
                                                                <th class="sorting text-center" aria-label="">Domicilio</th>
                                                                <th class="sorting text-center" aria-label="">Punto</th>
                                                                <th class="sorting text-center" aria-label="">Ruta</th>
                                                                <th class="sorting text-center" aria-label="">T. Turno</th>
                                                                <th class="sorting text-center" aria-label="">Turnos</th>
                                                                <th class="sorting text-center" aria-label="">Extras</th>
                                                                <th class="sorting text-center" aria-label="">Horario</th>
                                                                <th class="sorting text-center" aria-label="">Lunes</th>
                                                                <th class="sorting text-center" aria-label="">Martes</th>
                                                                <th class="sorting text-center" aria-label="">Miercoles</th>
                                                                <th class="sorting text-center" aria-label="">Jueves</th>
                                                                <th class="sorting text-center" aria-label="">Viernes</th>
                                                                <th class="sorting text-center" style="background-color: red;" aria-label="">FechaSolicitud</th>
                                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
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
                        "searching": true,
                        "searching": true,
                        "responsive": false,
                        "lengthChange": false,
                        "autoWidth": false,
                        "paging": true,
                        scrollY: false,
                        scrollX: true,
                        scrollCollapse: false,
                        buttons: false,

                    });
                });
            </script>
</body>

</html>