<?php include_once "../BD_Conexion.php";

$Nomina = base64_decode ($_GET['Nomina']);


echo $query = "UPDATE [dbo].[ST_Empleados]
        SET 
        [Estatus] = '0'
           WHERE Nomina = '$Nomina'";
$ejecutar = sqlsrv_query($conn, $query);


if ($ejecutar) {
        echo ("<script>
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/MiPersonal.php';
        </script>");
} else {
        echo ("<script>(alert('No Eliminado'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/MiPersonal.php';
        </script>");
}
?>