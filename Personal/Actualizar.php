<?php include_once "../BD_Conexion.php";

$Nomina = $_POST['Nomina'];
$usuario = $_POST['usuario'];
$Area = $_POST['Area'];
$Encargado = $_POST['Encargado'];
$NominaEncargado = $_POST['NominaEncargado'];


 $query = "UPDATE [dbo].[ST_Empleados]
        SET [Nomina] = '$Nomina'
       ,[Nombre] = '$usuario'
       ,[Area] = '$Area'
      ,[Estatus] = '1'
      ,[Encargado] = '$Encargado'
      ,[NominaEncargado] = '$NominaEncargado'
 WHERE Nomina = $Nomina";
                 
$ejecutar = sqlsrv_query($conn, $query);


if ($ejecutar) {
    echo ("<script>(alert('Linea Establecida'))
location.href ='http://mx-server08:8080/SistemaTansporte/Prueba.php';
        </script>");
} else {
    echo ("<script>(alert('No se Agrego la linea'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Prueba.php';
        </script>");
}
