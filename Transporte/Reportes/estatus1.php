<?php include_once "../../BD_Conexion.php";

$ID = $_GET['ID'];

echo $query = "UPDATE SolicitudTransporte
SET [Estatus] = 2 WHERE ID = $ID";
                 
$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    header("location:http://mx-server08:8080/SistemaTansporte/Transporte/Verificacion.php");
} else {
    header("location:http://mx-server08:8080/SistemaTansporte/Transporte/Verificacion.php");
}

?>







