<?php include_once "../BD_Conexion.php";

$Nomina = $_POST['Nomina'];
$Nombre = $_POST['Nombre'];
$Area = $_POST['Area'];
$Encargado = $_POST['Encargado'];
$NominaEncargado = $_POST['NominaEncargado'];

 
$query = "UPDATE [dbo].[ST_Empleados]
        SET [Nomina] = '$Nomina'
       ,[Nombre] = '$Nombre'
       ,[Area] = '$Area'
       ,[Estatus] = '1'
       ,[Encargado] = '$Encargado'
      ,[NominaEncargado] = '$NominaEncargado'
 WHERE Nomina = $Nomina";
                 
$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Agregado a la Lista'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/Nuevos2_0.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Agregar'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/Nuevos2_0.php';
        </script>");
}




