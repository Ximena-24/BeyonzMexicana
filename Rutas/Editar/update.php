<?php include_once "../../BD_Conexion.php";

$Id_punto = $_POST['Id_punto'];
$Nombre_punto = $_POST['Nombre_punto'];
$Numero_ruta = $_POST['Numero_ruta'];


echo $query = "UPDATE [dbo].[PuntosAbordaje] 
SET Nombre_punto = '$Nombre_punto',
Numero_ruta = '$Numero_ruta',
Estatus = '1',
Nombre_ruta = '$Nombre_ruta'
WHERE Id_punto = '$Id_punto'";

$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Punto actualizada'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/AllRutas.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Actualizar'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/AllRutas.php';
        </script>");
}

?>




