<?php 
session_start();
include_once "../BD_Conexion.php";


$Nomina = $_GET['Nomina'];
$Usuario = $_SESSION['UserName'];
$NNomina = $_SESSION['NNomina'];

 $query = "UPDATE [dbo].[ST_Empleados]
        SET [Estatus] = '1'
        ,[Encargado] = '$Usuario'
        ,[NominaEncargado] = '$NNomina'
           WHERE Nomina = '$Nomina'";

$ejecutar = sqlsrv_query($conn, $query);


if ($ejecutar) {
    echo ("<script> 
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/MiPersonal.php';
    </script>");
} else {
    echo ("<script>(alert('Error no Agregado'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/MiPersonal.php';
        </script>");
}
