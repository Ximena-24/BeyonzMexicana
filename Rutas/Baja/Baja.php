<?php include_once "../../BD_Conexion.php";

$Id_punto = $_GET['Id_punto'];

echo $Query_borrar = "UPDATE PuntosAbordaje SET Estatus = 0 WHERE Id_punto = $Id_punto";
$ejecutar = sqlsrv_query($conn, $Query_borrar);

if ($ejecutar) {
    echo ("<script>(alert('El registro se borro exitosamente '))
   location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/AllRutas.php';
        </script>");
} else {
    echo ("<script>(alert('Error al eliminar'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/AllRutas.php';
        </script>");
}
?>