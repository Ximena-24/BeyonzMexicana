<?php
include "../Conexion.php";

session_start();

$Usuario = $_POST['Usua_Log'];
$Password = $_POST['Pass_Log'];


$query_Contar = "SELECT COUNT(*) AS Contar FROM SR_Usuarios  WHERE NNomina = '$Usuario' AND Pass = '$Password'";
$consulta_Contar = sqlsrv_query($conn, $query_Contar);
$array_Contar = sqlsrv_fetch_array($consulta_Contar);

$query_Nombre = "SELECT Nombre FROM SR_Usuarios  WHERE NNomina = '$Usuario' AND Pass = '$Password'";
$consulta_Nombre = sqlsrv_query($conn, $query_Nombre);
$array_Nombre = sqlsrv_fetch_array($consulta_Nombre);

$query_Tipo = "SELECT Tipo FROM SR_Usuarios  WHERE NNomina = '$Usuario' AND Pass = '$Password'";
$consulta_Tipo = sqlsrv_query($conn, $query_Tipo);
$array_Tipo = sqlsrv_fetch_array($consulta_Tipo);

$query_Nomina = "SELECT NNomina FROM SR_Usuarios  WHERE Nombre = '$Usuario' AND Pass = '$Password'";

if ($array_Contar['Contar'] > 0) {
    if (is_array($array_Nombre)) {
        $_SESSION['UserName'] = $array_Nombre['Nombre'];
        $_SESSION['Tipo'] = $array_Tipo['Tipo'];
        $_SESSION['NNomina'] = $Usuario;
    }
    $_SESSION['User'] = $Usuario;
    $query_Sesion = "INSERT INTO SR_Usuarios (Nombre, NNomina, Dia, Hr_Entrada) 
    VALUES ('$array_Nombre[Nombre]', '$Usuario',SYSDATETIME(), SYSDATETIME())";
    $ejecutar = sqlsrv_query($conn, $query_Sesion);
    if ($_SESSION['Tipo'] == 'Admin') {
        header("location: ../Transporte/inicio.php");
    } else {
        header("location: ../Transporte/index.php");
    }
} else {
    echo ("<script>(alert('Intenta de Nuevo, Contraseña Incorrecta :)'))
    window.history.go(-1)
                </script>");
}
