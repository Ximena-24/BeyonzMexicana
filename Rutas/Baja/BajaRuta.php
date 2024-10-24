<?php include_once "../../BD_Conexion.php";

$ID_RUTA = $_GET['ID_RUTA'];

 $Query_borrar = "UPDATE [dbo].[SR_RUTAS] SET Estatus = 0 WHERE ID_RUTA = $ID_RUTA";
$ejecutar = sqlsrv_query($conn, $Query_borrar);

if ($ejecutar) {
    echo ("<script>(alert('Ruta Eliminada'))
   location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/NuevaRuta.php';
        </script>");
} else {
    echo ("<script>(alert('Error al eliminar'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/NuevaRuta.php';
        </script>");
}
?>