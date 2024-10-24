<?php include_once "../../BD_Conexion.php";

$id_usuario = $_POST['id_usuario'];
$AF_Domicilio = $_POST['AF_Domicilio'];

 $query = "UPDATE [dbo].[SM_AltaFinanzas]
SET [AF_Domicilio] = '$AF_Domicilio'
WHERE AF_NN = $id_usuario";
  
$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Domicilio Actualizado'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PersonalAsignado.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Acualizar'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PersonalAsignado.php';
        </script>");
}
?>
  