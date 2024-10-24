<?php 
session_start();

$Usuario = $_SESSION['UserName'];

$query_Datos = "SELECT empleado.id_usuario,ST_Empleados.Nomina,ST_Empleados.Nombre,ST_Empleados.NominaEncargado,ST_Empleados.Encargado
FROM empleado 
INNER JOIN ST_Empleados ON ST_Empleados.Nomina = empleado.id_usuario
WHERE empleado.estatus = 1 AND  ST_Empleados.Estatus = 1 AND ST_Empleados.Encargado = '$Usuario' OR ST_Empleados.Encargado_2 = '$Usuario'
ORDER BY ST_Empleados.Nomina ASC";
?>