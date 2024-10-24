<?php include_once "../../BD_Conexion.php";

$id_usuario = $_POST['id_usuario'];
$Nombre = $_POST['Nombre'];

for ($i=1; $i <=15; $i++) { 
   if (!empty($_POST['Id_punto'.$i])) {
    $Id_punto = $_POST['Id_punto'.$i];
   }
}

 $query = "UPDATE [dbo].[PersonalTransporte]
        SET [ID] = '$id_usuario'
       ,[Nombre] = '$Nombre'
       ,[estatus] = '1'
      ,[Id_punto] = '$Id_punto'
 WHERE ID = $id_usuario";

$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Punto Actualizado'))
    //location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PersonalAsignado.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Actualizar'))
    //location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PersonalAsignado.php';
        </script>");
}
?>


