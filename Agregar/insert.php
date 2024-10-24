<?php include_once "../BD_Conexion.php";

$ID = $_POST['ID'];
$Nombre = $_POST['Nombre'];

 
for ($i=1; $i <=15; $i++) { 
   if (!empty($_POST['Id_punto'.$i])) {
    $Id_punto = $_POST['Id_punto'.$i];
   }
}

$query = "UPDATE [dbo].[PersonalTransporte]
        SET [ID] = '$ID'
       ,[Nombre] = '$Nombre'
       ,[estatus] = '1'
      ,[Id_punto] = '$Id_punto'
 WHERE ID = $ID";
                 
$ejecutar = sqlsrv_query($conn, $query);
                 
$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Punto Guardado'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PersonalNoAsig.php';
        </script>");
} else {
    echo ("<script>(alert('Punto No Guardado'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PersonalNoAsig.php';
        </script>");
}

