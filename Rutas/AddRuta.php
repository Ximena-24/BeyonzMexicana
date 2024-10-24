<?php include_once "../BD_Conexion.php";


$NOMBRE_RUTA = $_POST['NOMBRE_RUTA'];
$ESTATUS = $_POST['ESTATUS'];

$query = "INSERT INTO [dbo].[SR_RUTAS] (NOMBRE_RUTA,ESTATUS)
VALUES('$NOMBRE_RUTA','1')";
                  ;

$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('RUTA AGREGADA'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/NuevaRuta.php';
        </script>");
} else {
    echo ("<script>(alert('ERROR AL GUARDAR RUTA'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/NuevaRuta.php';
        </script>");
}