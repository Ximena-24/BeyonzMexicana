<?php
session_start();
include_once "../BD_Conexion.php";

$Usuario = $_SESSION['UserName'];
$NNomina = $_SESSION['NNomina'];

$Nomina = $_POST['Nomina'];
$Area = $_POST['Area'];


echo $query = "UPDATE [dbo].[ST_Empleados]
        SET [Estatus] = '1',
         [Area] = '$Area'
        ,[Encargado] = '$Usuario'
        ,[NominaEncargado] = '$NNomina'
           WHERE Nomina = '$Nomina'";

$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Cambio de Linea Correcto'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/MiPersonal.php';
    </script>");
} else {
    echo ("<script>(alert('Error al agregar'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/MiPersonal.php';
        </script>");
}
