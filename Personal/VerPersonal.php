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

$Nomina = $_GET['Nomina'];


$query = "SELECT ST_Empleados.Nomina,ST_Empleados.Nombre,ST_Empleados.Area,ST_Empleados.Encargado,
ST_Empleados.Estatus,empleado.usuario,empleado.puesto,empleado.area,ST_Empleados.NominaEncargado
FROM ST_Empleados INNER JOIN empleado ON empleado.id_usuario = ST_Empleados.Nomina
WHERE empleado.estatus = 1 AND ST_Empleados.Nomina = $Nomina";


$query_img = "SELECT * FROM [BEYONZ].[dbo].[Fotos] WHERE Fotos_NN = $Nomina";
$result = sqlsrv_query($conn, $query);

while ($fila = sqlsrv_fetch_array($result)) {
    $Nomina = $fila['Nomina'];
    $Nombre = $fila['Nombre'];
    $Area = $fila['Area'];
    $Estatus = $fila['Estatus'];
    $Encargado = $fila['Encargado'];
    $NominaEncargado = $fila['NominaEncargado'];
}

$result_img = sqlsrv_query($conn, $query_img);
while ($fila = sqlsrv_fetch_array($result_img)) {
    $img = $fila['Fotos_Nombre'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Beyonz Mexicana" name="" />
    <title>Nuevos Ingresos</title>
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
    <!-- Topbar Start -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 text-center py-2" style="color: #00043D;"></div>
        </div>
    </div>
    <!-- Topbar End -->

    <div class="estilo py-5">
        <div class="container">
            <header style="background-color: rgb(21, 21, 192);">
                <h1><a href=""><i class="ion-plane text-info"></i>Beyonz Mexicana</a></h1>
                <nav>
                    <ul>
                        <li>
                            <a class="btn btn-dark" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            <a class="btn" href="../logout.php" title="Log out"><i class="fa fa-share"></i> Cerrar Sesion</a></a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br>

            <!-- Container Filtro Applicado Start -->
            <form class="formulario" autocomplete="off" enctype="multipart/form-data">
                <div class="wrapper py-5">
                    <div class="content-wrapper">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body">
                                                <h2 class="text-uppercase text-center" style="color: 3323232;"><em><strong>Informacion del Personal</strong></em></h2>
                                                <hr style="color: #001571;"><br>
                                                <div id="filtro" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-body">
                                                                <table>
                                                                    <td><img src="http://mx-server08:8080/Personal/<?php echo $img ?>.jpg" alt="" class="img-thumbnail" width="200" height="200"></td>
                                                                    <td style="padding: 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                    <label>Nomina</label>
                                                                                    <input type="text" class="form-control" id="Nomina" name="Nomina" value="<?php echo $Nomina ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <div class="form-group">
                                                                                    <label>Nombre de Usuario</label>
                                                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $Nombre ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Linea Establecida</label>
                                                                                    <input type="text" class="form-control" id="Area" name="Area" value="<?php echo $Area ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-1">
                                                                                <div class="form-group">
                                                                                    <label>Estatus</label>
                                                                                    <input type="text" class="form-control" id="Estatus" name="Estatus" value="<?php echo $Estatus ?>" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-5">
                                                                                <div class="form-group">
                                                                                    <label>Encardo del personal</label>
                                                                                    <input type="text" class="form-control" id="Encargado" name="Encargado" value="<?php echo $Encargado ?>" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Nomina Encargado</label>
                                                                                    <input type="text" class="form-control" id="NominaEncargado" name="NominaEncargado" value="<?php echo $NominaEncargado ?>" readonly>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </table>
                                                            </div>
                                                        </div>
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
                                <p><i class="fa fa-envelope mr-2"></i>ximena.santos@beyonz.com.mx </p>
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

</body>

</html>