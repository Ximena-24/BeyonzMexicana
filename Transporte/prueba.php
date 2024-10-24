<?php include_once "../BD_Conexion.php";?>
<html>

<?php

$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$query = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 1";
$query1 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 2";
$query2 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 3";
$query3 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 4";
$query4 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 5";
$query5 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 6";
$query6 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 7";
$query7 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 8";
$query8 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 9";
$query9 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 10";
$query10 = "SELECT *  FROM [PuntosAbordaje] WHERE Numero_ruta = 11";
$query11 = "SELECT *  FROM [PuntosAbordaje] WHERE Numero_ruta = 12";
$query12 = "SELECT *  FROM [PuntosAbordaje] WHERE Numero_ruta = 13";
$query13 = "SELECT *  FROM [PuntosAbordaje] WHERE Numero_ruta = 14";
$query14 = "SELECT * FROM [PuntosAbordaje] WHERE Numero_ruta = 15";

$resultado = sqlsrv_query($conn, $query);
if ($resultado === false) {
    die(print_r(sqlsrv_errors(), true));
}

$resultado1 = sqlsrv_query($conn, $query1);
if ($resultado1 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado2 = sqlsrv_query($conn, $query2);
if ($resultado2 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado3 = sqlsrv_query($conn, $query3);
if ($resultado3 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado4 = sqlsrv_query($conn, $query4);
if ($resultado4 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado5 = sqlsrv_query($conn, $query5);
if ($resultado5 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado6 = sqlsrv_query($conn, $query6);
if ($resultado6 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado7 = sqlsrv_query($conn, $query7);
if ($resultado7 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado8 = sqlsrv_query($conn, $query8);
if ($resultado8 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado9 = sqlsrv_query($conn, $query9);
if ($resultado9 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado10 = sqlsrv_query($conn, $query10);
if ($resultado10 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado11 = sqlsrv_query($conn, $query11);
if ($resultado11 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado12 = sqlsrv_query($conn, $query12);
if ($resultado12 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado13 = sqlsrv_query($conn, $query13);
if ($resultado13 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$resultado14 = sqlsrv_query($conn, $query14);
if ($resultado14 === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

</html>