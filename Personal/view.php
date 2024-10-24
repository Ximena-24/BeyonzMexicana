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

$result = sqlsrv_query($conn, $query);

while ($fila = sqlsrv_fetch_array($result)) {
    $Nomina = $fila['Nomina'];
    $Nombre = $fila['Nombre'];
    $Area = $fila['Area'];
    $Estatus = $fila['Estatus'];
    $Encargado = $fila['Encargado'];
    $NominaEncargado = $fila['NominaEncargado'];
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Eliminar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#mostrarmodal").modal("show");
        });
    </script>
</head>

<body>


    <form class="formulario" method="post" autocomplete="off" enctype="multipart/form-data">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">

                        <div class="card-body" hidden>
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
                                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $Nombre ?>" readonly>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <input type="text" class="form-control" id="pueAreasto" name="Area" value="<?php echo $Area ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label><strong>Nomina Encargado</strong></label>
                                        <input type='text' class='form-control' id='NominaEncargado' name='NominaEncargado' value="<?php echo $NominaEncargado ?> ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Encargado del Personal</label>
                                        <input type='text' class='form-control' id='Encargado' name='Encargado' value="<?php echo $Usuario; ?>" >
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" onclick="window.location.href='../Transporte/MiPersonal.php'" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3>¡Mensaje de alerta!</h3>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h4>¿Seguro de Eliminar al Personal?</h4>
                                        <img id="myImg" src="../img/borrar.png" alt="Snow" style="width:100%;max-width:300px">
                                    </div>

                                    

                                    <div class="modal-footer text-center">
                                        <a class="btn btn-danger" onclick="history.back()">Cancelar</a>
                                        <a href="Delete.php?Nomina=<?php echo base64_encode ($Nomina) ?>" class="btn btn-success">Si Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
</body>
</html>