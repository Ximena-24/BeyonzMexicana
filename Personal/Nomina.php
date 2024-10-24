<?php 
session_start();
include_once "../BD_Conexion.php";


$id_usuario = $_GET['id_usuario'];
$Usuario = $_SESSION['UserName'];
$NNomina = $_SESSION['NNomina'];


$query = "INSERT INTO ST_Empleados (Nomina,Encargado,NominaEncargado)
VALUES ('$id_usuario','$Usuario','$NNomina')";
                 
$ejecutar = sqlsrv_query($conn, $query);


if ($ejecutar) {
    echo ("<script> location.href ='http://mx-server08:8080/SistemaTansporte/Prueba.php';</script>");
} else {
    echo ("<script>(alert('Error no Agregado'))
location.href ='http://mx-server08:8080/SistemaTansporte/Prueba.php';
        </script>");
}
