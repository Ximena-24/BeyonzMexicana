<?php include_once "../BD_Conexion.php";

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
    <title>Todas las Rutas</title>
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
    details {
        list-style: none;
    }

    details {
        background-color: #f6f8fa;
        /* color de fondo cuando no está desplegado */
    }

    details[open] {
        background: #ffffff;
        /* color de fondo cuando está desplegado */
    }

    details summary {
        font-weight: 400;
        /* peso de la tipografía cuando  no está desplegado */
        list-style: none;
        /* ocultamos la flecha */
        cursor: pointer;
        /* cambia el cursor del puntero */
    }

    details[open] summary {
        font-weight: 600;
        /* peso de la tipografía cuando está desplegado */
    }

    details p {
        background: #f6f8fa;
        /* color de fondo del contenido oculto */
    }

    details {
        position: relative;
    }

    details summary::before {
        position: absolute;
        content: "👇";
        font-size: 1.75rem;
        top: 10px;
        right: 16px;
    }

    details[open] summary::before {
        -webkit-animation: rotate-emoji 0.6s ease-in-out both;
        animation: rotate-emoji 0.6s ease-in-out both;
    }

    @-webkit-keyframes rotate-emoji {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }

        100% {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
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
        color: dark;
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


    <div class="estilo py-5">
        <div class="container">
            <header style="background-color: rgb(21, 21, 192);">
                <h1><a href=""><i class="ion-plane text-info"></i>Beyonz Mexicana</a></h1>
                <nav>
                    <ul>
                        <li>
                        <a class="btn btn-dark" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            <a href="../Transporte/botones.php" class="btn btn-primary"><i class="fa fa-home"></i> Inicio</a>
                            <a class="btn" href="../logout.php" title="Log out"><i class="fa fa-share"></i> Cerrar Sesion</a></a>
                        </li>
                    </ul>
                </nav>
            </header><br><br>

            <div class="container py-2">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-3 text-right">
                        <h5 style="color: #101010;">Bienvenid@ al Sistema:</h5>
                    </div>
                    <div class="col-3 text-left py-1">
                        <?php $Usuario = $_SESSION['UserName'];
                        echo "<h3 class='nav-link' style='color: #005117;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
                    </div>
                </div>
            </div>
            <br><br>

            <!-- Container Filtro Applicado Start -->
            <form class="formulario" action="AllRutas.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="wrapper">
                    <div class="content-wrapper">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body">
                                                <h1 style="color: dark;" class="text-uppercase text-center"><img src="../img/rutas.webp" alt="" width="180" height="80"><em><strong> 
                                                 Rutas de Transporte</strong></em></h1>
                                                <div class="contaner">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <h1 class="m-0">
                                                                <a class="btn btn-success" href="NuevaRuta.php"><img class="imagen" src="../img/trans.png" width="30" height="30"> Agregar Nueva Ruta de Transporte</a>
                                                            </h1>
                                                        </div>
                                                        <div class="col-2 text-center"></div>
                                                        <div class="col-2 text-center"></div>
                                                    </div>
                                                </div>
                                                <div id="filtro" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="myTable" class="table table-bordered table-striped display nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                        <th class="sorting text-center" style="background-color: #7B7B7B;" tabindex="0" rowspan="1" colspan="1" aria-label="">Numero Ruta</th>
                                                                        <th class="sorting text-center" style="background-color: #A2A2A2;" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre de la Ruta</th>
                                                                        <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="" style="background-color: #1962FF;">Agregar Punto</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="text-align: center;">
                                                                    <?php
                                                                    $query = "SELECT * FROM [dbo].[SR_RUTAS] WHERE ESTATUS = 1";
                                                                    $result = sqlsrv_query($conn, $query);

                                                                    while ($fila = sqlsrv_fetch_array($result)) {
                                                                        echo "<tr>";
                                                                        echo "<td>" . $fila['ID_RUTA'] . "</td>";
                                                                        echo "<td>" . $fila['NOMBRE_RUTA'] . "</td>";
                                                                        echo "<td> 
                              <a class='btn btn-info' href='../Rutas/NuevoPunto.php?ID_RUTA=" . $fila['ID_RUTA'] . "' ><i class='fa fa-edit'></i> Agregar Punto</a>
                                                                      </td>";
                                                                        echo "</tr>";
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr class="text-center">
                                                                        <th class="sorting text-center" style="background-color: #7B7B7B;" tabindex="0" rowspan="1" colspan="1" aria-label="">Numero Ruta</th>
                                                                        <th class="sorting text-center" style="background-color: #A2A2A2;" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre de la Ruta</th>
                                                                        <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="" style="background-color: #1962FF;">Agregar Punto</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </form>
            <!-- Container Filtro Applicado End -->

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

                $(document).ready(function() {
                    $("#myTable2").DataTable({});
                });
            </script>
</body>
</html>