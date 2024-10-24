<?php include_once "../BD_Conexion.php";
if (!isset($login)) {
    session_start();
    $User = $_SESSION['User'];
    $Usuario = $_SESSION['UserName'];
    $Tipo = $_SESSION['Tipo'];
    $NNomina = $_SESSION['NNomina'];

    if (!isset($User)) {
        header("location:/SistemaTansporte/logout.php");
    }
}

$Nomina = $_GET['Nomina'];

$query = "SELECT empleado.id_usuario,empleado.usuario,empleado.area,empleado.puesto,SM_AltaFinanzas.AF_Domicilio,SM_AltaFinanzas.AF_TelefonoC
FROM empleado FULL JOIN SM_AltaFinanzas ON empleado.id_usuario = SM_AltaFinanzas.AF_NN
WHERE empleado.estatus = 1 AND empleado.id_usuario = $Nomina";

$result = sqlsrv_query($conn, $query);

while ($fila = sqlsrv_fetch_array($result)) {
    $usuario = $fila['usuario'];
    $area = $fila['area'];
    $puesto = $fila['puesto'];
    $AF_Domicilio = $fila['AF_Domicilio'];
    $AF_TelefonoC = $fila['AF_TelefonoC'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Beyonz Mexicana" name="" />
    <title>Personal Nuevo</title>
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
        background: url('/img/Beyonz.jpg') no-repeat center center fixed;
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
                            <a class="btn btn-dark" href="../Transporte/PreListado2.0.php" title=""><i class="fa fa-home"></i> Inicio</a></a>
                            <a class="btn btn-secondary" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            <a class="btn" href="../logout.php" title="Log out"><i class="fa fa-share"></i> Cerrar Sesion</a></a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div><br><br>
        <div class="container py-4">
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
                <div class="col-3 text-right py-2">
                    <h5><i id="change-animation-type-example" class="fas fa-car-side fa-1x"></i> Bienvenid@ al Sistema:</h5>
                </div>
                <div class="col-4 text-left py-2">
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

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <h1 class="form-label text-center" style="color: red;"><em><strong> Agregar Personal Nuevo </strong></em></h1>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        <!-- Main content -->
        <form class="formulario" action="insert2.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header container-fluid">
                                    <h3>¡Mensaje de alerta!</h3>
                                    <div class="row">
                                        <h5 style="color: #001571;"><i class='fa fa-edit'></i>Agregar una linea al usuario</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="modal-body text-center">
                                        <h5>¿Seguro de Agregar a tu Listado?</h5>
                                        <img id="myImg" src="../img/Agregar.png" alt="Snow" style="width:80%;max-width:100px">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>Nomina</label>
                                                                    <input type="text" class="form-control" id="Nomina" name="Nomina" value="<?php echo $Nomina ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Nombre</label>
                                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $usuario ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Area</label>
                                                                    <input type="text" class="form-control" id="" name="" value="<?php echo $area ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Puesto</label>
                                                                    <input type="text" class="form-control" id="" name="" value="<?php echo $puesto ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-2">

                                                                <?php include_once "../Personal/Script.php"; ?>
                                                                <div>Selecciona una linea: <select class='form-control styled-select' required="" name="Area" id="Area">
                                                                        <br>
                                                                        <option value="">Ninguno Seleccionado Todavia</option>
                                                                        <?php while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) { ?>
                                                                            <option value="<?php echo $row['Nombre_Linea']; ?>"><?php echo $row['Nombre_Linea']; ?></option>
                                                                        <?php }
                                                                        sqlsrv_free_stmt($resultado); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label> Nomina Encargado</label>
                                                                    <input type='text' class='form-control' id='NominaEncargado' name='NominaEncargado' value="<?php echo $NNomina; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Encargado del Personal</label>
                                                                    <input type='text' class='form-control' id='Encargado' name='Encargado' value="<?php echo $Usuario; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5"></div>
                                                        <div class="col-md-4 py-2">
                                                            <button class="btn btn-dark" onclick="history.back()"><i class='fa fa-undo'></i> Cancelar</button>
                                                            <button class="btn btn-primary" type="post"><i class='fa fa-save'></i> Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
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

                        <div class="credit" style="color: rgb(1, 1, 94);">
                            &copy; BEYONZ <span> MEXICANA 2024 &copy;</span>
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
                        <p><i class="fa fa-envelope mr-2"></i>ximena.santos@beyonz.com.mx</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>Ext. #606</p>
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