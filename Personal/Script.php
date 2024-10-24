<?php include_once "../BD_Conexion.php";?>
<html>

<?php

$Usuario = $_SESSION['UserName'];

$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

 $query = "SELECT * FROM [Transporte_Lineas] WHERE Estatus = 1 AND Encargado = '$Usuario'";

$resultado = sqlsrv_query($conn, $query);
if ($resultado === false) {
    die(print_r(sqlsrv_errors(), true));
}

?>
</html>