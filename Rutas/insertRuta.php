<?php include_once "../BD_Conexion.php";


$Nombre_punto = $_POST['Nombre_punto'];
$Numero_ruta = $_POST['Numero_ruta'];



$query = "INSERT INTO PuntosAbordaje(Nombre_punto,Numero_ruta,Estatus)
VALUES('$Nombre_punto','$Numero_ruta','1')";
                  ;

$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Punto Agregado Exitosamente '))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/AllRutas.php';
        </script>");
} else {
    echo ("<script>(alert('El registro tuvo un error'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Rutas/AllRutas.php';
        </script>");
}