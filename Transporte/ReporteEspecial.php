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
date_default_timezone_set('Etc/GMT+6');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Beyonz Mexicana" name="" />
    <title>Verificar Especial</title>
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
        background: url('../img/Beyonz.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        color: #0a0a0b;

    }
</style>

<body class="hold-transition sidebar-collapse">
    <!-- Topbar Start -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 text-center py-2" style="color: #00043D;"></div>
            <div class="col-8 py-1">
                <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                    <a href="" class="navbar-brand">
                        <h1 class="m-0 text-primary"><strong>B</strong><span class="text-dark"><strong>EYONZ</strong></span></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                        <div class="navbar ml-auto py-0">
                            <a class="btn btn-dark" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            &nbsp;
                            <a href="inicio.php" class="btn btn-primary"><i class="fa fa-home"></i> Inicio</a>
                            &nbsp;
                            <a href="../logout.php" class="btn btn-danger" title="Cerrar Sesion"><i class="fas fa-sign-out-alt"></i>Salir</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <div class="container py-2">
        <div class="row">
            <div class="col-6"></div>
            <div class="col-3 text-right">
                <h5 style="color: #101010;">Bienvenid@ al Sistema:</h5>
            </div>
            <div class="col-3 text-left py-1">
                <?php $Usuario = $_SESSION['UserName'];
                echo "<h3 class='nav-link' style='color: #005F78;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
            </div>
        </div>
    </div>
    <br>

    <!-- Container Filtro Applicado Start -->
    <form class="formulario" action="ReporteEspecial.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h1 class="text-uppercase text-center" style="color:#03567A;"><em><strong>
                                                    <img src="../img/verificar.png" alt="#" width="70" height="70" />
                                                    Verificar Solicitudes de Transporte (Especial)</strong></em>
                                                </h1>
                                        <br>
                                        <div id="filtro" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <hr style="border:0px; border-top: 1px dotted #028271;">

                                                    <table id="myTable" class="table mt-3">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th class="sorting text-center" style="background-color: #4F64DD;">Nomina </th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                                                                <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">Inicio</th>
                                                                <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">Fin</th>
                                                                <th class="sorting text-center" aria-label="">Telefono</th>
                                                                <th class="sorting text-center" aria-label="">Domicilio</th>
                                                                <th class="sorting text-center" aria-label="">Punto</th>
                                                                <th class="sorting text-center" aria-label="">Ruta</th>
                                                                <th class="sorting text-center" aria-label="">Turno</th>
                                                                <th class="sorting text-center" aria-label="">Turno</th>
                                                                <th class="sorting text-center" style="background-color: #60A08E;">Horario</th>
                                                                <th class="sorting text-center" style="background-color: red;" aria-label="">Fecha Solicitud</th>
                                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Option</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody style="text-align: center;">
                                                            <?php
                                                            $query = "SELECT SolicitudTransporte.ID,PersonalTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,SM_AltaFinanzas.AF_TelefonoC,
                                                            SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,SR_RUTAS.NOMBRE_RUTA
                                                            ,SolicitudTransporte.tipo_turno,
                                                            SolicitudTransporte.turno,SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
                                                            SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.FechaSolicitud,SolicitudTransporte.Responsable
                                                            FROM SolicitudTransporte INNER JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN
                                                            INNER JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID
                                                            INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto =PersonalTransporte.Id_punto
                                                            INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta
                                                            WHERE SolicitudTransporte.Estatus = 1 AND SolicitudTransporte.TEspecial = 2
                                                            ORDER BY SolicitudTransporte.Hora DESC ";

                                                            $result = sqlsrv_query($conn, $query);
                                                            while ($fila = sqlsrv_fetch_array($result)) {
                                                                echo "<tr>";
                                                                echo "<td style='background-color: #97A3E2; font-weight: bold;'>" . $fila['ID'] . "</td>";
                                                                echo "<td>" . $fila['Nombre'] . "</td>";
                                                                echo "<td style='background-color: #8ff08a;'>". $dias_espaniol[date_format($fila['fecha_inicio'], 'w')] . date_format($fila['fecha_inicio'], ' d/m/y') . "</td>";
                                                                echo "<td style='background-color: #A7D8D8;'>". $dias_espaniol[date_format($fila['fecha_fin'], 'w')] . date_format($fila['fecha_fin'], ' d/m/y') . "</td>";
                                                                echo "<td>" . $fila['AF_TelefonoC'] . "</td>";
                                                                echo "<td>" . $fila['AF_Domicilio'] . "</td>";
                                                                echo "<td>" . $fila['Nombre_punto'] . "</td>";
                                                                echo "<td>" . $fila['NOMBRE_RUTA'] . "</td>";
                                                                echo "<td>" . $fila['tipo_turno'] . "</td>";
                                                                echo "<td>" . $fila['turno'] . "</td>";
                                                                echo "<td style='background-color: #AEC9C1;'>" . $fila['Horario'] . "</td>";
                                                                echo "<td style='background-color: #E18888; font-weight: bold;'>" . $dias_espaniol[date_format($fila['FechaSolicitud'], 'w')] . date_format($fila['FechaSolicitud'], ' d/m/y') . "</td>";
                                                                echo "<td style='background-color: #D1D1D1;'>". $fila['Responsable'] . "</td>";
                                                                echo "<td> 
                                                                <a class='btn btn-warning' href='../Transporte/Reportes/estatus2.php?ID=" . $fila['ID'] . "' ><i class='fa fa-check'></i> Validar</a>
                                                                 </td>";
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>

                                                        <tfoot>
                                                            <tr class="text-center">
                                                            <th class="sorting text-center" style="background-color: #4F64DD;">Nomina </th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                                                                <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">Inicio</th>
                                                                <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">Fin</th>
                                                                <th class="sorting text-center" aria-label="">Telefono</th>
                                                                <th class="sorting text-center" aria-label="">Domicilio</th>
                                                                <th class="sorting text-center" aria-label="">Punto</th>
                                                                <th class="sorting text-center" aria-label="">Ruta</th>
                                                                <th class="sorting text-center" aria-label="">Turno</th>
                                                                <th class="sorting text-center" aria-label="">Turno</th>
                                                                <th class="sorting text-center" style="background-color: #60A08E;">Horario</th>
                                                                <th class="sorting text-center" style="background-color: red;" aria-label="">Fecha Solicitud</th>
                                                                <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
                                                                <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Option</th>
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



    <!-- footer section start -->
    <div class="contai mt-3">
        <div class="row">

            <div class="col-md-12 text-center">
                <!-- footer section starts  -->
                <section class="container-fluid text-white-50 py-5 px-sm-3 px-lg-5" style="background-color: rgba(213, 212, 212, 0.466)">
                    <div class="box">

                        <h1 class="text-uppercase text-center" style="color: #001571;"><em><strong>
                                    <img src="../img/IconoPrincipal.png" alt="#" width="50" height="45" />
                                    Sistema de Transporte</strong></em></h1>
                        <hr>
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
                "ordering":false,
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

        $(document).ready(function() {
            $("#myTable2").DataTable({});
        });
    </script>
</body>

</html>